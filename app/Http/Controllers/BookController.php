<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $Books=books::all();
        return response()->json ($books);
    }

    public function store(Request $request)
    {
        $book=new Books;
        $book->name=$request->name;
        $book->author=$request->author;
        $book->publish_date=$request->publish_date;
        $book->save();
        return response()->json(["message"=>"Book Added"],201);
    }

}
