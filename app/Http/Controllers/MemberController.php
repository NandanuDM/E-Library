<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the members.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Member::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make();
        }
        return view('pages.members.index');
    }

    public function export()
    {
        $fileName = "Anggota Perpustakaan.xls";
        $excelData[] = array(
            'No',
            'Nama Lengkap',
            'Alamat',
            'Telepon',
            'Email',
            'Tipe Anggota'
        );

        $data = Member::all()->sortBy('full_name');
        $i = 1;
        if (!$data == "") {
            foreach ($data as $row) {
                $excelData[] = array(
                    $i,
                    $row->full_name,
                    $row->address,
                    $row->phone,
                    $row->email,
                    $row->type
                );
                $i++;
            }
        } else {
            $excelData[] = 'Data tidak tersedia';
        }

        $xlsx = PhpXlsxGenerator::fromArray($excelData);
        $xlsx->downloadAs($fileName);
    }

    /**
     * Show the form for creating a new member.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.members.create');
    }

    /**
     * Store a newly created member in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $validatedData = $request->validated();

        // Handle file upload
        if ($request->hasFile('photo')) {
            // Store the file and get the path
            $path = $request->file('photo')->store('members', 'public');

            // Save the path to the validated data
            $validatedData['photo'] = $path;
        } else {
            $validatedData['photo'] = "";
        }


        Member::create($validatedData);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Display the specified member.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('pages.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified member.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('pages.members.edit', compact('member'));
    }

    /**
     * Update the specified member in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, $id)
    {
        $member = Member::findOrFail($id);
        $validatedData = $request->validated();
        // Handle file upload
        if ($request->hasFile('photo')) {
            // Delete the old cover image if it exists
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }

            // Store the new file and get the path
            $path = $request->file('photo')->store('members', 'public');

            // Save the path to the validated data
            $validatedData['photo'] = $path;
        } else {
            // If no new file is uploaded, keep the old cover image
            unset($validatedData['photo']);
        }

        $member->update($validatedData);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified member from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        if ($member->photo) {
            // Delete the cover image from storage
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
