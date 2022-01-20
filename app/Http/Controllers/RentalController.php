<?php

namespace App\Http\Controllers;

use App\Models\Rental;
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

        dd($request);

        // ➀create メソッド
        // $recipe = Rental::create([
        //     'user_id' => 6,
        //     'book_id' => 1,
        //     'checkout_date' => '2022-01-19',
        // ]);

        // ➁fill メソッド → save メソッド
        // Rentalモデルのインスタンスを新規作成
        $rental = new Rental();
        // 属性の代入を fill メソッドで保護
        $rental->fill([
            'user_id' => 6,
            'book_id' => 1,
            'checkout_date' => '2022-01-19',
        ]);
        // $rentalの内容をテーブル(DB)に保存
        $rental->save();
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
