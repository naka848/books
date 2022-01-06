<?php

namespace App\Http\Controllers;

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
        //
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
    public function show($request)
    // public function show($title)
    {
        // ③タイトル全部入力したら検索ができるようにする！
        // where(フィールド名,値)→曖昧検索p212
        // showアクションでid以外を検索する方法がわからない…
        $title = $request->title;
        $books = BookInformation::where('title',$title)->get();
        return $books;

        // $books = BookInformation::where('title',$title)->get();
        // return $books;
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
