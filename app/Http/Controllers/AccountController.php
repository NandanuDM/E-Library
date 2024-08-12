<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.accounts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.accounts.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('pages.accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.accounts.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.accounts.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validated();
        // Handle file upload
        if ($request->hasFile('profile_photo')) {
            // Delete the old cover image if it exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Store the new file and get the path
            $path = $request->file('profile_photo')->store('accounts', 'public');

            // Save the path to the validated data
            $validatedData['profile_photo'] = $path;
        } else {
            // If no new file is uploaded, keep the old cover image
            unset($validatedData['profile_photo']);
        }

        $user->update($validatedData);

        return redirect()->route('accounts.index')->with('success', 'Akun berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('pages.accounts.index');
    }

    public function passwordChange(Request $request)
    {
        $userId = Auth::User()->id;
        $user = User::find($userId);
        $hasher = app('hash');
        if ($hasher->check($request->currentpassword, $user->password)) {
            $user->password = Hash::make($request->newpassword);
            $user->save();
            return redirect()->route('accounts.index')->with('success', 'Password berhasil diperbarui.');
        } else {
            return redirect()->route('accounts.index')->with('failed', 'Password gagal diperbarui.');
        }
    }
}
