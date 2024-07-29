<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Member;
use App\Models\Book;

use Carbon\Carbon;

use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the borrowings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowings = Borrowing::with('member', 'book')
            ->orderBy('borrow_date', 'desc')
            ->get();

        foreach ($borrowings as $borrowing) {
            $borrowDate = Carbon::parse($borrowing->borrow_date);
            $dueDate = $borrowDate->copy()->addDays(7);
            $returnDate = $borrowing->return_date ? Carbon::parse($borrowing->return_date) : Carbon::now();
            $lateDays = 0;
            $isLate = false;

            if ($returnDate->gt($dueDate)) {
                $lateDays = $returnDate->diffInDays($dueDate, false);
                $isLate = true;
            } elseif ($borrowing->return_date == null && Carbon::now()->gt($dueDate)) {
                $lateDays = Carbon::now()->diffInDays($dueDate, false);
                $isLate = true;
            }

            // Ensure lateDays is not negative
            $lateDays = abs($lateDays);

            // Calculate late fee
            $lateFee = $lateDays * 1000;

            $borrowing->late_days = $lateDays;
            $borrowing->late_fee = $lateFee;
            $borrowing->is_late = $isLate;

            // Format late fee using helper function
            $borrowing->formatted_late_fee = formatRp($lateFee);
            // Format borrow date using helper function
            $borrowing->formatted_borrow_date = formatDate($borrowing->borrow_date);
            // Format return date using helper function
            $borrowing->formatted_return_date = $borrowing->return_date ? formatDate($borrowing->return_date) : '-';
        }

        return view('pages.borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new borrowing.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $books = Book::all();
        return view('pages.borrowings.create', compact('members', 'books'));
    }

    /**
     * Store a newly created borrowing in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'rental_price' => 'required|integer',
            'librarian_id' => 'required|exists:users,id',
        ], [
            'member_id.required' => 'Anggota wajib dipilih',
            'member_id.exists' => 'Anggota tidak valid',
            'book_id.required' => 'Buku wajib dipilih',
            'book_id.exists' => 'Buku tidak valid',
            'borrow_date.required' => 'Tanggal peminjaman wajib diisi',
            'borrow_date.date' => 'Tanggal peminjaman tidak valid',
            'rental_price.required' => 'Biaya sewa wajib diisi',
            'rental_price.integer' => 'Biaya sewa harus berupa angka',
            'librarian_id.required' => 'Pustakawan wajib dipilih',
            'librarian_id.exists' => 'Pustakawan tidak valid',
        ]);
        
        // Decreasing book stock
        $book = Book::find($request->book_id);

        if ($book->stock > 0) {
            $book->stock -= 1;
            $book->save();

            Borrowing::create([
                'member_id' => $request->member_id,
                'book_id' => $request->book_id,
                'librarian_id' => $request->librarian_id,
                'borrow_date' => $request->borrow_date,
                'rental_price' => $request->rental_price,
                'status' => 'dipinjam',
            ]);

            return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dicatat.');
        } else {
            return redirect()->back()->withErrors('Stok buku tidak mencukupi untuk peminjaman.');
        }
    }

    /**
     * Display the specified borrowing.
     *
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function show(Borrowing $borrowing)
    {
        $borrowDate = Carbon::parse($borrowing->borrow_date);
        $dueDate = $borrowDate->copy()->addDays(7); // Copy the borrowDate to avoid modifying the original
        $returnDate = $borrowing->return_date ? Carbon::parse($borrowing->return_date) : Carbon::now();
        $lateDays = 0;
        $isLate = false;

        // Calculate late days if the current date is past the due date or if the return date is past the due date
        if ($returnDate->gt($dueDate)) {
            $lateDays = $returnDate->diffInDays($dueDate, false);
            $isLate = true;
        } elseif ($borrowing->return_date == null && Carbon::now()->gt($dueDate)) {
            $lateDays = Carbon::now()->diffInDays($dueDate, false);
            $isLate = true;
        }

        // Ensure lateDays is not negative
        $lateDays = abs($lateDays);

        // Calculate late fee
        $lateFee = $lateDays * 1000;
        $lateFee = formatRp($lateFee);

        return view('pages.borrowings.show', compact('borrowing', 'lateDays', 'lateFee', 'isLate'));
    }

    /**
     * Show the form for editing the specified borrowing.
     *
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrowing $borrowing)
    {
        $members = Member::all();
        $books = Book::all();
        return view('pages.borrowings.edit', compact('borrowing', 'members', 'books'));
    }

    /**
     * Update the specified borrowing in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        // Validate the status input
        $request->validate([
            'status' => 'required|in:dipinjam,dikembalikan',
        ], [
            'status.required' => 'Status wajib diisi',
            'status.in' => 'Status tidak valid',
        ]);

        $returnDate = null;
        $lateFee = 0;

        if ($request->status === 'dikembalikan') {
            // Validate the return date if status is 'dikembalikan'
            $request->validate([
                'return_date' => 'required|date',
            ], [
                'return_date.required' => 'Tanggal pengembalian wajib diisi',
                'return_date.date' => 'Tanggal pengembalian tidak valid',
            ]);

            // Restore book stock
            $book = Book::find($borrowing->book_id);
            $book->stock += 1;
            $book->save();

            // Calculate late fee
            $borrowDate = Carbon::parse($borrowing->borrow_date);
            $dueDate = $borrowDate->addDays(7);
            $returnDate = Carbon::parse($request->return_date);
            $lateDays = $returnDate->diffInDays($dueDate, false);
            if ($lateDays > 0) {
                $lateFee = $lateDays * 1000; // 1000 per day of late return
            }
        }

        // Update borrowing record
        $borrowing->update([
            'return_date' => $request->status === 'dikembalikan' ? $request->return_date : null,
            'status' => $request->status,
            'late_fee' => $lateFee,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified borrowing from storage.
     *
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
