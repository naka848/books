<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Book;
use App\Models\BookInformation;
use Illuminate\Http\Request;

class RentalController extends Controller
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
        // ➀create メソッド
        $recipe = Rental::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'checkout_date' => $request->checkout_date,
        ]);

        // ➁fill メソッド → save メソッド
        // Rentalモデルのインスタンスを新規作成
        // $rental = new Rental();
        // 属性の代入を fill メソッドで保護
        // $rental->fill([
        //     'user_id' => 6,
        //     'book_id' => 1,
        //     'checkout_date' => '2022-01-19',
        // ]);
        // $rentalの内容をテーブル(DB)に保存
        // $rental->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rentals = Rental::where('user_id', $id)->get();
        // 送るデータをまとめるための配列の定義／初期化
        $rental_info=[];
        // コレクション
        // dd($rentals);
        foreach ($rentals as $rental) {
            // モデル
            // dd($rental);
            // book_information_id
            // dd($rental->books->book_information_id);
            // 現在借りている本の情報を取りに行く
            $book_info = BookInformation::where('book_information_id', $rental->books->book_information_id)->get();
            // dd($book_info);
            // 本の情報を配列に追加
            array_push($rental_info, $book_info);
        }
        // dd($rental_info);
        return $rental_info;
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
