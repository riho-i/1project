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

     //物件名
    public function index() {
        //物件名
        $name1 = 'ねこちゃんハウス';
        $name2 = 'わんちゃんハウス';
        $name3 = 'うさちゃんハウス';

    //物件住所
        $b_zyuusyo1 = '群馬県伊勢崎市うんちゃら';
        $b_zyuusyo2 = '群馬県前橋市うんちゃら';
        $b_zyuusyo3 = '群馬県伊勢崎市１１１';

        $users = DB::table('bukkens')->get();
        $users = Bukken::get();

        $result = [   
            'b_name1' => $name1,
            'b_name2' => $name2,
            'b_name3' => $name3,    
            'b_zyuusyo1' => $b_zyuusyo1,
            'b_zyuusyo2' => $b_zyuusyo2,
            'b_zyuusyo3' => $b_zyuusyo3,    
             'user' => $users       
             ];

             

        return view('home', $result);
    }

}