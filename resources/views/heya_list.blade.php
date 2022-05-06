@extends('layout')

@section('pagecontent')

<form method="POST">
    @csrf
    <h2>{{ $bukkenname['name'] }}</h2>

    @if (count($disp_item) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">入空</th>
                    <th scope="col">号室</th>
                    <th scope="col">間取り</th>
                    <th scope="col">家賃</th>
                    <th scope="col">共益費</th>
                    <th scope="col">駐車場</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disp_item as $item)
                    <tr class="line">
                        <td>
                            <div class="btn-group" id="{{ $item['id'] }}" role="group"
                                aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" id="aki_{{ $item['id'] }}_0"
                                    name="aki_{{ $item['id'] }}" value="0" autocomplete="off" {{ $item['aki_chk_0'] }}>
                                <label class="btn btn-outline-primary" for="aki_{{ $item['id'] }}_0">入室</label>
                                <input type="radio" class="btn-check" id="aki_{{ $item['id'] }}_1"
                                    name="aki_{{ $item['id'] }}" value="1" autocomplete="off" {{ $item['aki_chk_1'] }}>
                                <label class="btn btn-outline-primary" for="aki_{{ $item['id'] }}_1">空室</label>
                            </div>

                            {{-- <input type="radio" class="btn-check" id="aki_{{ $item['id'] }}_0"
                            name="aki_{{ $item['id'] }}" value="0" autocomplete="off" 
                            @if ($item['aki'] === '0')
                                checked
                            @endif>
                            <input type="radio" class="btn-check" id="aki_{{ $item['id'] }}_1"
                            name="aki_{{ $item['id'] }}" value="1" autocomplete="off"
                            @if ($item['aki'] === '1')
                                checked
                            @endif> --}}

                        </td>
                        <td>{{ $item['goushitu'] }}</td>
                        <td> {{ $item['madori'] }} </td>
                        <td> {{ $item['yatin'] }} </td>
                        <td> {{ $item['kyouekihi'] }} </td>
                        <td> {{ $item['car'] }} </td>
                        <td> {{ Form::open(['method' => 'post']) }}
                            {{ Form::hidden('id', $item['id']) }}
                            {{ Form::token() }}
                            {{ Form::button('削除', ['type' => 'submit','name' => 'delete','id' => 'button','class' => 'btn btn-primary']) }}
                            {{ Form::close() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="btn-flex_box">
            <a href="{{ route('heya_regist', ['bukken' => $bukkenid]) }}">
                <button type="button" class="btn btn-primary">部屋追加</button>
            </a>
            <button class="btn btn-primary" name="mode" value="update">更新</button>
        </div>
    @else
        <p>部屋情報がありません</p>
        <a href="{{ route('heya_regist', ['bukken' => $bukkenid]) }}"><button type="button" class="btn btn-primary">部屋登録</button></a>
    @endif
</form>

@endsection
