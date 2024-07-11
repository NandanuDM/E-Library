<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Dummy data
        $data = [
            'title' => 'Welcome to e-library!',
            'description' => 'This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.',
            'button_text' => 'Learn more',
            'items' => [
                'Item 1',
                'Item 2',
                'Item 3',
                'Item 4',
            ],
        ];

        // Return view with data
        return view('pages.home', compact('data'));
    }
}