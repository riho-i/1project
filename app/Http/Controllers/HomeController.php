<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bukken;
use Illuminate\Support\Facades\DB;

class Homecontroller extends Controller
{
    /** 
     * テスト画面表示する
     * @return view
     */
    public function index() {
        
        //データ配列取得
        $bukkens = Bukken::all();
   
        //データ表示用の配列作成
        $bukkens_disp = [];
        foreach ($bukkens as $key => $value) {
            $temp = [];
            $temp['id'] = $value -> id;
            $temp['name'] = $value -> name;
            $temp['zyuusyo'] = $value -> zyuusyo;
            $bukkens_disp[] = $temp;
        }

        //viewへの返却値
        $result = [   
             'disp_item' => $bukkens_disp,   
             ];

        return view('home', $result);
    }

}