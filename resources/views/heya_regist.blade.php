@extends('layout')

@section('pagecontent')


    <div class="position">
        <h3>部屋情報登録</h3>

        {{Form::open(['method' => 'post', 'url' => route("heya_entry", ['bukken' => $bukkenid]) ]) }}
        {{ Form::token() }}
        <p>号室{{ Form::text('goushitu', '', ['id' => 'goushitu', 'class' => 'form-control', 'placeholder' => '例 : 101']) }}</p>
        <p>間取り{{ Form::text('madori', '', ['id' => 'madori', 'class' => 'form-control', 'placeholder' => '例 : 1LDK']) }}</p>
        <p>家賃{{ Form::text('yatin', '', ['id' => 'yatin', 'class' => 'form-control', 'placeholder' => '入力してください']) }}
        共益費{{ Form::text('kyouekihi', '', ['id' => 'kyouekihi', 'class' => 'form-control', 'placeholder' => '入力してください']) }}</p>
        駐車場{{ Form::text('car', '', ['id' => 'car', 'class' => 'form-control', 'placeholder' => '税込みで入力してください']) }}</p>
        <p>{{ Form::button('入力', ['type' => 'submit',  'class' => 'btn btn-primary']) }}</p>
        {{ Form::close() }}

     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>

@endsection
