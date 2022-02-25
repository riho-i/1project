<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bukken;
use Illuminate\Support\Facades\DB;

class Homecontroller extends Controller
{
    /** 
     * ホーム画面表示する
     * @return view
     */
    public function index(Request $request) {
    
        // →検索条件を使った検索
        $bukken = new Bukken;
        $bukkens = [];
        
        // 検索条件の設定
        //物件名が一致したら表示する
        if( $request->input('textbox')){
            $bukken = $bukken->where('name', 'like binary',  '%' . $request->input('textbox') .'%');
        }
        if( $request->input('src2')){
            $bukken = $bukken->where('zyuusyo', 'like binary',  '%' . $request->input('src2') . '%');
        }

        $bukkens = $bukken->paginate(5);

        // ページングの設定
        //データ件数取得
        //$count = Bukken::count();
        //データを５件分取得
        //$users = Bukken::paginate(5);
   
        //データ表示用の配列作成
        $bukkens_disp = [];
        foreach ($bukkens as $key => $value) {
            $temp = [];
            $temp['id'] = $value -> id;
            $temp['name'] = $value -> name;
            $temp['zyuusyo'] = $value -> zyuusyo;
            $temp['owner'] = $value -> owner;
            $bukkens_disp[] = $temp;
        }

        //viewへの返却値
        $result = [   
             'disp_item' => $bukkens_disp,   
             'count' => count($bukkens),
             'user' => $bukkens,

             ];

        // viewの表示
        return view('home', $result);
    }

        /** 
     * 物件登録画面表示する
     * @return view
     */
    public function regist(Request $request) {
        if ($request->input('mode','') === 'entry') {
            $bukken_data = new Bukken;
            $bukken_data -> name = $request->input('name','');
            $bukken_data -> zyuusyo = $request->input('zyuusyo','');
            $bukken_data -> owner = $request->input('owner','');
            $bukken_data -> save();
        }

        return view('home_regist');

    }


}