<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\application;

class HomeController extends Controller
{
    public function index()
    {
        $this->dataPage["application"] = Application::first();

        //Buku Terbaru
        $recentbooks = Book::select('title', 'cover_image')->orderBy('created_at', 'desc')->paginate(10);
        $this->dataPage["recentbooks"] = $recentbooks;

        //Buku Terlaris
        $booknames = Book::select('title')->distinct()->get();
        $borrowedbooks = [];
        foreach ($booknames as $key => $values){
            $title = $values->title;
            $borrowedbooks[$title] = Borrowing::select('id')->whereHas(
                'book', function ($query) use ($title) {
                    $query->select('id', 'title')
                    ->where('title', $title)
                    ->withTrashed();
                }
            )->count();
        }
        arsort($borrowedbooks);
        $borrowedbooks = array_slice($borrowedbooks, 0, 4);
        $titles = array_keys($borrowedbooks);
        $i = 0;
        $mostborrowed = Book::select('id', 'title', 'cover_image')->whereIn('title', $titles)->get();
        // dd($mostborrowed);
        $this->dataPage["mostborrowed"] = $mostborrowed;
        return view('pages.homepage.index', $this->dataPage);
    }
}