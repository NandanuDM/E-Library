<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Book;
use App\Models\Member;
use Carbon\Carbon;

class DashboardController extends Controller
{
    function lateReturn(bool $withNotLate, $month)
    {
        $borrowings = Borrowing::with([
            'member' => function ($query) {
                $query->withTrashed();
            },
            'book' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->where('return_date', null);
        if ($month) {
            $borrowings = $borrowings->whereMonth('updated_at', $month);
        }
        $borrowings = $borrowings->orderBy('borrow_date', 'desc')
            ->get();
        $late = 0;
        $notLate = 0;
        foreach ($borrowings as $borrowing) {
            $borrowDate = Carbon::parse($borrowing->borrow_date);
            $dueDate = $borrowDate->copy()->addDays(7);
            $returnDate = $borrowing->return_date ? Carbon::parse($borrowing->return_date) : Carbon::now();

            if ($returnDate->gt($dueDate)) {
                $late += 1;
            } else if ($borrowing->return_date == null && Carbon::now()->gt($dueDate)) {
                $late += 1;
            } else if ($withNotLate) {
                $notLate += 1;
            }
        }

        if ($withNotLate) {
            $bookstatus = [$late, $notLate];
            return $bookstatus;
        } else {
            return $late;
        }
    }

    function MonthFilter($query, $month)
    {
        $query = $query->whereMonth('created_at', $month);
        return $query;
    }

    public function index(Request $request)
    {
        setlocale(LC_ALL, 'IND');
        $currentmonth = Carbon::now()->formatLocalized('%B');
        $this->dataPage['month'] = null;
        $this->dataPage['jsmonth'] = null;
        $this->dataPage['currentmonth'] = $currentmonth;
        $currentmonth = Carbon::now();
        $lastmonth = Carbon::parse(Carbon::now()->subMonth()->format('Y-m'));

        //Total Buku
        // dd($lastmonth);
        $query = Book::select('*');
        $query2 = Book::select('*');
        if ($request->month) {
            $month = Carbon::parse(Carbon::parse($request->month)->format('Y-m'));
            $lastmonth = Carbon::parse(Carbon::parse($request->month)->subMonth()->format('Y-m'));
            // dd($lastmonth);
            $this->dataPage['currentmonth'] = Carbon::parse($request->month)->formatLocalized('%B');
            $this->dataPage['month'] = date('F Y', strtotime($request->month));
            $this->dataPage['jsmonth'] = $request->month;
            $query = $query->whereMonth('created_at', $month);
            $lastcount = $query2->whereMonth('created_at', $lastmonth)->count();
        } else {
            $lastcount = $query2->whereMonth('created_at', $lastmonth)->count();
        }
        $count = $query->count();
        $percentage = round(abs(($count - $lastcount) / ($lastcount == 0 ? 1 : $lastcount)) * 100);
        $difference = abs($count - $lastcount);
        if ($count > $lastcount) {
            $changes = "positive";
        } else if ($count < $lastcount) {
            $changes = "negative";
        } else {
            $changes = "neutral";
        }
        $this->dataPage["BookPercentage"] = $percentage;
        $this->dataPage["BookDifference"] = $difference;
        $this->dataPage["BookChanges"] = $changes;
        $this->dataPage['bookCount'] = $count;

        //Buku Disewa
        $query = Borrowing::select('*')->where('status', 'dipinjam');
        $query2 = Borrowing::select('*')->where('status', 'dipinjam');
        if ($request->month) {
            $query = $query->whereMonth('borrow_date', $month);
            $lastcount = $query2->whereMonth('borrow_date', $lastmonth)->count();
        } else {
            $lastcount = $query2->whereMonth('borrow_date', $lastmonth)->count();
        }
        $count = $query->count();
        $percentage = round(abs(($count - $lastcount) / ($lastcount == 0 ? 1 : $lastcount)) * 100);
        $difference = abs($count - $lastcount);
        if ($count > $lastcount) {
            $changes = "positive";
        } else if ($count < $lastcount) {
            $changes = "negative";
        } else {
            $changes = "neutral";
        }
        $this->dataPage["RentedPercentage"] = $percentage;
        $this->dataPage["RentedDifference"] = $difference;
        $this->dataPage["RentedChanges"] = $changes;
        $this->dataPage['RentedCount'] = $count;
        $this->dataPage['rentedBook'] = $count;

        //Buku telat kembali
        if ($request->month) {
            $count = $this->lateReturn(false, $month);
            $lastcount = $this->lateReturn(false, $lastmonth);
            $percentage = round(abs(($count - $lastcount) / ($lastcount == 0 ? 1 : $lastcount)) * 100);
            $difference = abs($count - $lastcount);
            if ($count > $lastcount) {
                $changes = "positive";
            } else if ($count < $lastcount) {
                $changes = "negative";
            } else {
                $changes = "neutral";
            }
            $this->dataPage["LatePercentage"] = $percentage;
            $this->dataPage["LateDifference"] = $difference;
            $this->dataPage["LateChanges"] = $changes;
            $this->dataPage['LateCount'] = $count;
            $this->dataPage["late"] = $count;
        } else {
            $count = $this->lateReturn(false, null);
            $lastcount = $this->lateReturn(false, $lastmonth);
            $percentage = round(abs(($count - $lastcount) / ($lastcount == 0 ? 1 : $lastcount)) * 100);
            $difference = abs($count - $lastcount);
            if ($count > $lastcount) {
                $changes = "positive";
            } else if ($count < $lastcount) {
                $changes = "negative";
            } else {
                $changes = "neutral";
            }
            $this->dataPage["LatePercentage"] = $percentage;
            $this->dataPage["LateDifference"] = $difference;
            $this->dataPage["LateChanges"] = $changes;
            $this->dataPage['LateCount'] = $count;
            $this->dataPage["late"] = $count;
        }

        //Total Anggota
        $query = Member::select('*');
        $query2 = Member::select('*');
        if ($request->month) {
            $query = $this->MonthFilter($query, $month);
            $lastcount = $this->MonthFilter($query2, $lastmonth)->count();
        } else {
            $lastcount = $query2->whereMonth('created_at', $lastmonth)->count();
        }
        $count = $query->count();
        $percentage = round(abs(($count - $lastcount) / ($lastcount == 0 ? 1 : $lastcount)) * 100);
        $difference = abs($count - $lastcount);
        if ($count > $lastcount) {
            $changes = "positive";
        } else if ($count < $lastcount) {
            $changes = "negative";
        } else {
            $changes = "neutral";
        }
        $this->dataPage["MemberPercentage"] = $percentage;
        $this->dataPage["MemberDifference"] = $difference;
        $this->dataPage["MemberChanges"] = $changes;
        $this->dataPage["memberCount"] = $count;

        // Total Income Month Differences
        $query = Borrowing::select('rental_price', 'late_fee');
        $query2 = Borrowing::select('rental_price', 'late_fee');

        if ($request->month){
            $query = $query->whereMonth('updated_at', $month)->get();
            $query2 = $query2->whereMonth('updated_at', $lastmonth)->get();
        } else {
            $query = $query->whereMonth('updated_at', $currentmonth)->get();
            $query2 = $query2->whereMonth('updated_at', $lastmonth)->get();
        }

        $currentIncome = 0;
        $pastIncome = 0;
        foreach($query as $key => $values){
            $currentIncome += $values->rental_price + $values->late_fee;
        }

        foreach($query2 as $key => $values){
            $pastIncome += $values->rental_price + $values->late_fee;
        }

        $percentage = round(abs(($currentIncome - $pastIncome) / ($pastIncome == 0 ? 1 : $pastIncome)) * 100);
        $difference = abs($currentIncome - $pastIncome);
        if ($currentIncome > $pastIncome) {
            $changes = "positive";
        } else if ($currentIncome < $pastIncome) {
            $changes = "negative";
        } else {
            $changes = "neutral";
        }
        $this->dataPage["IncomePercentage"] = $percentage;
        $this->dataPage["IncomeDifference"] = $difference;
        $this->dataPage["IncomeChanges"] = $changes;
        $this->dataPage["IncomeCount"] = $currentIncome;
       
        //Popular category Table
        $categories = Category::select('name')->distinct()->get();

        foreach ($categories as $key => $value) {
            $query = Borrowing::select('id')->whereHas('book', function ($query) use ($value) {
                $query->select('id', 'category_id')->whereHas('category', function ($query) use ($value) {
                    $query->select('id')->where('name', $value->name)->withTrashed();
                });
            });
            if ($request->month) {
                $query = $this->MonthFilter($query, $month);
            }
            $category[$value->name] = $query->count();
        }
        arsort($category);
        $category = array_slice($category, 0, 3);
        $total = 0;
        $percentage = array();
        $i = 1;
        foreach ($category as $key => $value) {
            $this->dataPage["counter_" . $i] = $value;
            $this->dataPage["name_" . $i] = $key;
            $total += $value;
            $i++;
        }
        $i = 1;
        foreach ($category as $key => $value) {
            $percentage[$i] = 0;
            if ($total != 0) {
                $percentage[$i] = round(($value / $total) * 100);
            }
            $this->dataPage["percentage_" . $i] = $percentage[$i];
            $i++;
        }

        // Late Return Table
        $borrowings = Borrowing::with([
            'member' => function ($query) {
                $query->withTrashed();
            },
            'book' => function ($query) {
                $query->withTrashed();
            }
        ])->where('return_date', null);
        if ($request->month) {
            $borrowings = $this->MonthFilter($borrowings, $month);
        }
        $borrowings = $borrowings->orderBy('borrow_date', 'asc')
            ->paginate(4);


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

        $this->dataPage['LateReturn'] = $borrowings;

        //recent borrows table
        $borrowings = Borrowing::with([
            'member' => function ($query) {
                $query->withTrashed();
            },
            'book' => function ($query) {
                $query->withTrashed();
            }
        ]);
        if ($request->month) {
            $borrowings = $this->MonthFilter($borrowings, $month);
        }
        $borrowings = $borrowings->orderBy('borrow_date', 'desc')
            ->paginate(4);

        $this->dataPage['RecentBorrows'] = $borrowings;

        return view('pages.dashboard.index', $this->dataPage);
    }

    public function getBooksStatus(Request $request)
    {
        //Book Status
        $books = Book::select('stock')->get();
        if ($request->month) {
            $month = Carbon::parse($request->month);
            $status = $this->lateReturn(true, $month);
        } else {
            $status = $this->lateReturn(true, null);
        }
        $late = $status[0];
        $notLate = $status[1];
        $stock = 0;
        foreach ($books as $key => $values) {
            $stock += $values->stock;
        }
        $available = $stock - ($notLate + $late);
        $data = [
            'Tersedia' => $available,
            'Disewa' => $notLate,
            'Belum Kembali' => $late,
        ];
        return response()->json($data);
    }

    public function getBooksByCategory(Request $request)
    {
        $categories = Category::select('name')->get();
        foreach ($categories as $key => $value) {
            // $bookCount[(int)$key] = Book::select('id', 'title')->with([              //Not Working
            //     'category' => function ($query) use ($value) {
            //         $query->select('id', 'name')->where('name', $value->name);
            //     }
            // )->count();
            $query = Book::select('id', 'title')->whereHas(
                'category',
                function ($query) use ($value) {
                    $query->select('id', 'name')->where('name', $value->name);
                }
            );
            if ($request->month) {
                $month = Carbon::parse($request->month);
                $query = $query->whereMonth('created_at', $month);
            }
            $books[$value->name] = $query->count();
        }

        return response()->json($books);
    }

    public function getBestSellerBooks(Request $request)
    {
        // Get all category for the year 2024 and process them in PHP
        $books = Book::select('title')->get();

        foreach ($books as $key => $value) {
            $query = Borrowing::select('id')->whereHas('book', function ($query) use ($value) {
                $query->select('id', 'title')->where('title', $value->title);
            });
            if ($request->month) {
                $month = Carbon::parse($request->month);
                $query = $query->whereMonth('created_at', $month);
            }
            $rented[$value->title] = $query->count();
        }

        arsort($rented);
        $rented = array_slice($rented, 0, 5);

        return response()->json($rented);
    }

    public function getTotalIncome(Request $request)
    {
        $currentdate = null;
        if ($request->month) {
            $maxdate = Carbon::parse($request->month);
            $maxdate = $maxdate->daysInMonth;
            $currentdate = $request->month . '-' . (string)$maxdate;
            $currentdate = date("Y-m-d", strtotime($currentdate));
        }
        // $date = Carbon::now()->subDays(30);
        // $date = $date->format('Y-m-d');
        // dd($date);
        $xaxisDates = [];
        $date = [];
        for ($i = 0; $i < 30; $i++) {
            // if (($i % 5 == 0) || ($i == 0)) {
            if ($currentdate) {
                $xaxisDates[] = date("d-M", strtotime('-' . 30 - $i . ' days', strtotime($currentdate)));
                $date[] = date("Y-m-d", strtotime('-' . 30 - $i . ' days', strtotime($currentdate)));
            } else {
                $xaxisDates[] = date("d-M", strtotime('-' . 30 - $i . ' days'));
                $date[] = date("Y-m-d", strtotime('-' . 30 - $i . ' days'));
            }
        }
        // dd($xaxisDates);
        $incomes = [];
        $rents = [];
        $latefees = [];
        for ($i = 0; $i < count($date); $i++) {
            $query = Borrowing::select('rental_price', 'late_fee')
                ->whereDate('updated_at', '=', $date[$i]);
            if ($request->month) {
                $month = Carbon::parse($request->month);
                $query = $query->whereMonth('created_at', $month);
            }
            $borrowsperday = $query->get();
            $incomeperday = 0;
            $rentperday = 0;
            $latefeeperday = 0;
            if ($borrowsperday->first()) {
                foreach ($borrowsperday as $index => $values) {
                    $incomeperday += $values->rental_price + $values->late_fee;
                    $rentperday += $values->rental_price;
                    $latefeeperday += $values->late_fee;
                }
            } else {
                $incomeperday = 0;
                $rentperday = 0;
                $latefeeperday = 0;
            }
            $incomes[$i] = $incomeperday;
            $rents[$i] = $rentperday;
            $latefees[$i] = $latefeeperday;
        }
        // dd($incomes, $rents, $latefees);


        return response()->json([
            'dates' => array_values($xaxisDates),
            'incomes' => array_values($incomes),
            'rents' => array_values($rents),
            'latefees' => array_values($latefees),
        ]);
    }

    public function getTotalBorrower(Request $request)
    {
        $currentdate = null;
        if ($request->month) {
            $maxdate = Carbon::parse($request->month);
            $maxdate = $maxdate->daysInMonth;
            $currentdate = $request->month . '-' . (string)$maxdate;
            $currentdate = date("Y-m-d", strtotime($currentdate));
        }
        $xaxisDates = [];
        $olddate = [];
        $newdate = [];
        for ($i = 0; $i < 30; $i++) {
            if ($currentdate) {
                if (($i % 5 == 0) || ($i == 0)) {
                    $xaxisDates[] = date("d-M", strtotime('-' . 30 - $i . ' days', strtotime($currentdate)));
                    $olddate[] = date("Y-m-d", strtotime('-' . 30 - ($i - 3) . ' days', strtotime($currentdate)));
                    $newdate[] = date("Y-m-d", strtotime('-' . 30 - $i . ' days', strtotime($currentdate)));
                }
            } else {
                if (($i % 5 == 0) || ($i == 0)) {
                    $xaxisDates[] = date("d-M", strtotime('-' . 30 - $i . ' days'));
                    $olddate[] = date("Y-m-d", strtotime('-' . 30 - ($i - 3) . ' days'));
                    $newdate[] = date("Y-m-d", strtotime('-' . 30 - $i . ' days'));
                }
            }
        }
        $oldmembers = [];
        $newmembers = [];
        for ($i = 0; $i < count($olddate); $i++) {
            $query = Member::select('full_name')
                ->whereDate('created_at', '<', $olddate[$i]);
            if ($request->month) {
                $month = Carbon::parse($request->month);
                $query = $query->whereMonth('created_at', $month);
            }
            $oldmembers[$i] = $query->count();
            $query = Member::select('full_name')
                ->whereDate('created_at', '>=', $olddate[$i])
                ->whereDate('created_at', '<=', $newdate[$i]);
            if ($request->month) {
                $month = Carbon::parse($request->month);
                $query = $query->whereMonth('created_at', $month);
            }
            $newmembers[$i] = $query->count();
        }
        // dd($oldmembers, $newmembers, $xaxisDates, $olddate, $newdate);


        return response()->json([
            'dates' => array_values($xaxisDates),
            'oldmembers' => array_values($oldmembers),
            'newmembers' => array_values($newmembers),
        ]);
    }
}
