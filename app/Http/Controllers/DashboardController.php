<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index');
    }

    public function getBooksByMonthData(Request $request)
    {
        // Get all borrowings for the year 2024 and process them in PHP
        $borrowings = Borrowing::whereYear('borrow_date', 2024)->get()->groupBy(function($date) {
            return Carbon::parse($date->borrow_date)->format('m'); // Group by months
        });

        $borrowingsCount = [];
        $borrowMonths = [];
        foreach ($borrowings as $key => $value) {
            $borrowingsCount[(int)$key] = count($value); // Count the number of borrowings for each month
            $borrowMonths[(int)$key] = Carbon::create()->month($key)->locale('id')->isoFormat('MMM'); // Get the month name in Indonesian
        }

        ksort($borrowingsCount);
        ksort($borrowMonths);

        return response()->json([
            'borrowings' => array_values($borrowingsCount),
            'months' => array_values($borrowMonths),
        ]);
    }
}