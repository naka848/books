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
        $books = Book::all();
        $books_relation=[];
        foreach ($books as $book) {
            array_push($books_relation,$book->book_information);
        }
        // eloquantをそのままreturnすると、jsonに変換してくれる。
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
        // ①リレーション前の状態で検索成功(テキストp299)
        // $books = Book::where('book_id',$id)->get();
        // return $books;

        // ②リレーション後の状態で検索成功
        // $books = Book::where('book_id',$id)->get();
        // $books_relation=[];
        // foreach ($books as $book) {
        //     array_push($books_relation,$book->book_information);
        // }
        // return $books_relation;

        // レンタルできるできない情報をまとめたJSONデータをつくりたい
        $book = Book::where('book_information_id',1);
        $rentable = [];
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
