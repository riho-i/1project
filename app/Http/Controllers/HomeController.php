<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bukken;
use App\Heya;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class Homecontroller extends Controller
{
    /** 
     * ホーム画面表示する
     * @return view
     */
    public function index(Request $request) {
        $bukken = new Bukken;
        $bukkens = [];

        // 検索条件を使った検索
        // 検索条件の設定
        if( $request->input('textbox')){
            $bukken = $bukken->where('name', 'like binary',  '%' . $request->input('textbox') .'%');
        }
        if( $request->input('src2')){
            $bukken = $bukken->where('zyuusyo', 'like binary',  '%' . $request->input('src2') . '%');
        }

        //１ページの表示件数設定
        $bukkens = $bukken->paginate(5);

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
             'bukkens' => $bukkens,
             ];

        // viewの表示
        return view('home_list',$result);
    }

    /** 
     * 物件登録画面表示する
     * @return view
     */
    public function regist(Request $request) {
        $regist = $request->input('regist');
        return view( 'home_regist', compact('regist') );
    }

    /** 
     * 確認画面表示する
     * @return view
     */
    public function entry(Request $request){
        //確認画面にサブミットされたデータを表示
        $name = $request->input('name');
        $zyuusyo = $request->input('zyuusyo');
        $owner = $request->input('owner');

        $result = [
            'name' => $name,
            'zyuusyo' => $zyuusyo,
            'owner' => $owner,
        ];

        return view( 'home_entry', $result);
    }


    /** 
     * 物件登録
     * @return json
     */
    public function entryAjax(Request $request){

        $result = [
            'status' => '',
            'msg' => '',
        ];

        // 重複レコードの取得
        $bukken = new Bukken;
        $bukkensname = $bukken->select('name')
        ->where('name', '=' , $request->input('name'))
        ->where('zyuusyo', '=' , $request->input('zyuusyo'))
        ->get();

        if (count($bukkensname) === 0) {
            // 重複がなければ登録
                $bukken_data = new Bukken;
                $bukken_data -> name = $request->input('name','');
                $bukken_data -> zyuusyo = $request->input('zyuusyo','');
                $bukken_data -> owner = $request->input('owner','');
                $bukken_data -> save();
                $result['status'] = '1';
                $result['msg'] = '登録完了しました';
            } else {
                // 重複していれば登録なし
                $result['status'] = '-1';
                $result['msg'] = '同一住所の物件が存在します';
            }
 
        return response()->json($result);
    }


    /** 
     * 部屋リストを表示する
     * @return view
     */
    public function heyaList(Request $request, $bukken) {

        //インスタンスの作成
        $heya = new Heya();
        $bukkens = new Bukken();

         //物件削除
        if (isset($_POST['delete'])) {  
            $heya_delete = $heya->find($request->input('id'));
            $heya_delete->delete();
            return redirect()->route('heya_list',['bukken' => $bukken]);//リダイレクト
        }

        //物件IDから部屋情報を取得
        $heyas = $heya->where('bukken_id',$bukken)
        ->orderBy('goushitu','asc')
        ->get();

        //物件名の取得
        $bukkenname = $bukkens->find($bukken);

        $heyas_disp = [];
        
        //部屋表示用
        foreach ($heyas as $key => $value) {
            $temp = [];
            $temp['aki'] = $value -> aki;
            $temp['goushitu'] = $value -> goushitu;
            $temp['madori'] = $value -> madori;
            $temp['yatin'] = $value -> yatin;
            $temp['kyouekihi'] = $value -> kyouekihi;
            $temp['car'] = $value -> car;
            $temp['id'] = $value -> id;
            // 空き状況のラジオ設定用
            $temp['aki_chk_0'] = '';
            $temp['aki_chk_1'] = '';
            if($temp['aki'] == '1'){
                $temp['aki_chk_1'] = 'checked';
            }else{
                $temp['aki_chk_0'] = 'checked';
            }
            $heyas_disp[] = $temp;
        }

      //入空確認
        if($request->input('mode', '') === 'update'){           
            foreach ($heyas as $key => $value) {
                if( $value -> aki != $request->input('aki_'.$value->id)) {
                    // $value -> aki = $request->input('aki_' . $value->id, '');
                    $value -> aki = $request->input("aki_{$value->id}", '');
                    $value->save();
                }
            }
            return redirect()->route('heya_list',['bukken' => $bukken])->with('flash_message', '登録が完了しました');
        }
    
        if (isset($_POST['delete'])) {  
            $heya_delete = $heya->find($request->input('id'));
            $heya_delete->delete();
            return redirect()->route('heya_list',['bukken' => $bukken]);//リダイレクト
        }

        $result = [
            'disp_item' => $heyas_disp,
            'bukkenid' => $bukken,
            'bukkenname' => $bukkenname,
        ];

        return view( 'heya_list' , $result);
   }


/** 
     * 空室一覧を表示する
     * @return view
     */
    public function akiList() {

        //インスタンスの作成
        $heya = new Heya();
        $bukkens = new Bukken();
        
        $heyas = $heya
        ->where('aki', '=' , '1')
        ->get();

        $heyas = $heya->select(DB::raw('heyas.*, bukkens.name'))
        ->join('bukkens','.bukken_id', '=', 'bukkens.id')
        ->where('aki', '=' , '1')
        ->orderBy('bukken_id')
        ->orderBy('goushitu')
        ->get();

        $heyas_disp = [];
        $bukken_ids = [];

        foreach ($heyas as $key => $value) {
            $temp = [];
            $temp['aki'] = $value -> aki;
            $temp['goushitu'] = $value -> goushitu;
            $temp['madori'] = $value -> madori;
            $temp['yatin'] = $value -> yatin;
            $temp['kyouekihi'] = $value -> kyouekihi;
            $temp['car'] = $value -> car;
            $temp['id'] = $value -> id;
            $temp['bukken_id'] = $value -> bukken_id;
            $temp['bukken_name'] = $value -> name;
            $bukken_ids[] = $value-> bukken_id;
            $heyas_disp[] = $temp;
        }

        $bukken_name = $bukkens->where('id',$bukken_ids) -> get();

        $result = [
            'disp_item' =>  $heyas_disp,
            'name' => $bukken_name,
        ];

        return view( 'aki_list' , $result);
    }




    /** 
     * 登録画面を表示する
     * @return view
     */
    public function heyaRegist($bukken) {

        $result = [
            'bukkenid' => $bukken,
        ];

        return view ( 'heya_regist', $result);
    }


    /** 
     * 部屋情報の登録内容確認画面
     * @return view
     */
     public function heyaEntry(Request $request,$bukken) {

        $goushitu = $request->input('goushitu');
        $madori = $request->input('madori');
        $yatin = $request->input('yatin');
        $kyouekihi = $request->input('kyouekihi');
        $car = $request->input('car');


     $result = [
         'goushitu' => $goushitu,
         'madori' => $madori,
         'yatin' => $yatin,
         'kyouekihi' => $kyouekihi,
         'car' => $car,
         'bukkenid' => $bukken,
     ];

     return view( 'heya_entry', $result );

     }

    /** 
     * 部屋情報の登録
     * @return json
     */
    public function heyaEntryAjax(Request $request) {        

        $heya = new Heya();

        $result = [
            'status' => '',
            'msg' => '',
        ];
        

        $heyagoushitu = $heya->select('goushitu')
        ->where('bukken_id', '=', $request->input('bukkenid'))
        ->where('goushitu', '=', $request->input('goushitu'))
        ->get();

        if (count($heyagoushitu) === 0) {
            $heya_data = new Heya();
            $heya_data -> aki = '1';
            $heya_data -> goushitu = $request->input('goushitu','');
            $heya_data -> madori = $request->input('madori','');
            $heya_data -> yatin = $request->input('yatin','');
            $heya_data -> kyouekihi = $request->input('kyouekihi','');
            $heya_data -> car = $request->input('car','');
            $heya_data -> bukken_id = $request->input('bukkenid','');
            $heya_data -> save();

            $result['status'] = '1';
            $result['msg'] = '登録が完了しました';
        } else {
            $result['status'] = '-1';
            $result['msg'] = '既に登録済みです';
        }

        return response()->json($result);
    }



}