<?php

namespace App\Http\Controllers;

use App\Models\BookInformation;
use Illuminate\Http\Request;

class BookInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = BookInformation::all();
        return $books;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // BookInformationモデルのインスタンスを新規作成
        $book_information = new BookInformation;
        // 属性の代入を fill メソッドで保護
        $book_information->fill($request->all());
        // $book_informationの内容をテーブル(DB)に保存
        $book_information->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        $keyword = $request;
        $book_informations = BookInformation::where('title', 'like', '%' . $keyword . '%')->get()->all();

        
        // dd($book_informations);  →中身：コレクション
        $books_all=[];
        foreach ($book_informations as $book_information) {
        // dd($book_information);  →中身：book_informationモデル
            $books_relation=[];
            foreach ($book_information->books as $book) {

                // foreach ($book->rentals as $rental){

                // if(!is_null($rental['return_date'])){
                    // array_push($books_relation, $book_information);
                // } 
               
                // }
            }
            array_push($books_relation, $book_information);
            array_push($books_all, $books_relation);
        }
        return $books_all;
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
        // dd($id);
        BookInformation::destroy($id);
    }
}
