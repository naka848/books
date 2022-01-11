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
        // ③タイトル全部入力したら検索成功
        // where(フィールド名,値)→曖昧検索p212
        // showアクションでid以外を検索する方法がわからない…
        // dd($request);
        // $title = $request;
        // $books = BookInformation::where('title',$title)->get();
        // return $books;

        // ④曖昧検索ができるようにする！
        $keyword = $request;
        $books = BookInformation::where('title','like','%' . $keyword . '%')->get();
        return $books;
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
