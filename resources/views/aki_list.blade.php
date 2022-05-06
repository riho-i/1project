@extends('layout')

@section('pagecontent')

<form method="POST">
@csrf

    @if (count($disp_item) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">物件</th>
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
                        <td>{{ $item['bukken_name'] }}</td>
                        <td>{{ $item['goushitu'] }}</td>
                        <td> {{ $item['madori'] }} </td>
                        <td> {{ $item['yatin'] }} </td>
                        <td> {{ $item['kyouekihi'] }} </td>
                        <td> {{ $item['car'] }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>空室情報がありません</p>
    @endif
</form>

@endsection
