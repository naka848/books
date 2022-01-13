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
        // $book_informations = BookInformation::all();
        // $books_all=[];
        // foreach ($book_informations as $book_information) {
        //     // hasMany()のリレーションを分解
        //     foreach ($book_information->books as $book) {
        //         // ループ毎に初期化
        //         $books_relation=[];
        //         // その本の情報をいれる
        //         array_push($books_relation, $book_information);
        //         // (複数ある本の)それぞれの情報を追加
        //         array_push($books_relation, $book);
        //         // APIで渡す配列に追加
        //         array_push($books_all, $books_relation);
        //     }
        // }
        // return $books_all;

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
            foreach ($book_information->books as $book) {
            // dd($book);  →中身：bookモデル
                foreach ($book->rentals as $rental){
                // dd($rental);  →中身：rentalモデル
                $books_relation=[];
                array_push($books_relation, $book_information);
                // array_push($books_relation, $book);
                // array_push($books_relation, $rental);
                // dd($books_relation[2]);  →中身：各モデル（要素数3）
                array_push($books_all, $books_relation);
                }
            }
        }
        return $books_all;
        // dd($books_all);  →中身：希望した内容になってる！
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
