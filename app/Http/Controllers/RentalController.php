<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\BookInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // ユーザーごとの貸出状況データ
    public function index()
    {
        // 現在ログインしているユーザーのIDを取得する
        $id = Auth::id();
        // 特定のユーザーの、返していない本のデータを集める
        $rentals = Rental::where([
            ['user_id', $id],
            ['return_date',null],
        ])->get();
        // 送るデータをまとめるための配列の定義／初期化
        $rental_lists=[];
        foreach ($rentals as $rental) {
            $rental_list=[];
            // rental_idを配列に追加
            array_push($rental_list, $rental->rental_id);
            // book_idを配列に追加
            array_push($rental_list, $rental->book_id);
            // 現在借りている本の情報を取りに行く
            $book_info = BookInformation::where('book_information_id', $rental->books->book_information_id)->first();
            // 本の情報を配列に追加
            array_push($rental_list, $book_info);
            // 最終！！送るデータ用配列にpush
            array_push($rental_lists, $rental_list);
        }
        return $rental_lists;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        // dd($id);
        $rental = Rental::create([
            'user_id' => $id,
            'book_id' => $request->book_id,
            'checkout_date' => $request->checkout_date,
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
        Rental::where('rental_id',$id )
            ->update(['return_date' => $request->return_date]);
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
