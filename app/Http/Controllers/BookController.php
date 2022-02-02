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
            array_push($books_relation, $book->book_information);
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
        $book = Book::create([
        'book_information_id' => $request->book_information_id,
        'purchase_date' => $request->purchase_date,
        'availability' => 1,
        ]);
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
        // 本の貸出処理の場合
        // availabilityをfalse「0」に変更する
        if ($request->process == 'B') {
            Book::where('book_id', $id)->update(['availability' => 0]);
        // 本の返却処理の場合
        // availabilityをtrue「1」に変更する
        } else {
            Book::where('book_id', $id)->update(['availability' => 1]);
        }
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
