
@extends('layout')

@section('pagecontent')

        <div class="form">
            <div class="mb-3">
                <form action="" method="post">
                    @csrf
                    <label for="Input" class="form-label">物件名</label>
                    <input type="text" class="form-control js_test" name="textbox">
                    <label for="Input" class="form-label">住所</label>
                    <input type="text" class="form-control js_test" name="src2">
                    <button id="test" class="btn btn-primary">検索</button>
                </form>
            </div>
        </div>

        <!-- テーブル　-->
            <table class="table table-hover">
                <thead>        
                    <tr>
                        <th scope="col">物件No</th>
                        <th scope="col">物件名</th>
                        <th scope="col">住所</th>
                        <th scope="col">オーナー</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disp_item as $item)
                        <tr class="line">
                            <th class="th-size" scope="row">
                            {{ $item['id'] }}</th>
                            <td><a href="{{ route("heya_list", ['bukken' => $item['id']]) }}" class="widelink">  {{ $item['name'] }} </a></td> 
                            <td> {{ $item['zyuusyo'] }} </td>
                            <td> {{ $item['owner'] }} </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
   
            {{ $bukkens->links('vendor.pagination.bootstrap-4');  }}

            @if (count($bukkens) >0)
             <p>全{{ $bukkens->total() }}件中 
                  {{  ($bukkens->currentPage() -1) * $bukkens->perPage() + 1}} - 
                  {{ (($bukkens->currentPage() -1) * $bukkens->perPage() + 1) + (count($bukkens) -1)  }}件のデータが表示されています。</p>
            @else
                    <p>データがありません。</p>
            @endif 

@endsection
