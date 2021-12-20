<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        // booksテーブルの中身を取り出す
        // $books = Book::all();
        // // eloquantをそのままreturnすると、jsonに変換してくれる。
        // return $books;

        // booksテーブルと、book_informationテーブルの中身を関連付けて取り出す
        // $books = Book::all();
        // $book_obj = $books[0]->book_information;
        // return $book_obj;
        // →出てこない…？

        $books = Book::all();
        $books_relation=[];
        foreach ($books as $book) {
            array_push($books_relation,$book->book_information);
        }
        return $books_relation;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
