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
  
        // クエリの抽出条件がない場合、全件表示する
        $books = Book::all();
        $books_relation=[];
        foreach ($books as $book) {
            array_push($books_relation,$book->book_information);
        }
        return $books_relation;

        // クエリの抽出条件がある場合、絞ったデータをだす!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        // $books_searched = Book::where('book_id','2')->get();
        // return $books_searched;

        // うまくいってない！！！！
        // $books_searched = $book->book_information->where('book_id','2')->get();
        // return $books_searched;
        // こういうことでは？（一気にかきすぎたので、小さく検証する）
        // $books_searched = $book->book_information->where('title','like',"%search_word%")->get();
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
