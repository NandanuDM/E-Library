<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\application;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    public function index(){
        // $this->dataPage["application"] = 
        $application = application::first();
        // dd($application->logo);
        // dd(asset('storage/'.$application->logo));
        // dd(Storage::disk('public')->exists($application->logo));
        // return view('pages.applications.index', $this->dataPage);
        return view('pages.applications.index')->with('application', $application);
    }

    public function update(UpdateApplicationRequest $request, $id){
        $app = Application::findOrFail($id);
        $validatedData = $request->validated();
        // Handle file upload
        if ($request->hasFile('logo')) {
            // Delete the old cover image if it exists
            if ($app->logo) {
                Storage::disk('public')->delete($app->logo);
            }

            // Store the new file and get the path
            $path = $request->file('logo')->store('application', 'public');

            // Save the path to the validated data
            $validatedData['logo'] = $path;
        } else {
            // If no new file is uploaded, keep the old cover image
            unset($validatedData['logo']);
        }

        $app->update($validatedData);
        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }
}
