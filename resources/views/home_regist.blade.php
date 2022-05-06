@extends('layout')

@section('pagecontent')


    <div class="position">
        <h3>物件登録</h3>

        {{Form::open(['method' => 'post', 'url' => 'entry'])}}
        {{ Form::token() }}
        <p>物件名{{ Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => '入力してください']) }}</p>
        <p>住所{{ Form::text('zyuusyo', '', ['id' => 'zyuusyo', 'class' => 'form-control', 'placeholder' => '入力してください']) }}</p>
        <p>オーナー名{{ Form::text('owner', '', ['id' => 'owner', 'class' => 'form-control', 'placeholder' => '入力してください']) }}</p>
        <p>部屋情報{{ Form::text('goushitu', '', ['id' => 'goushitu', 'class' => 'form-control', 'placeholder' => '号室']) }}
            {{ Form::text('madori', '', ['id' => 'madori', 'class' => 'form-control', 'placeholder' => '間取り']) }}</p>
        <p>{{ Form::button('入力', ['type' => 'submit',  'class' => 'btn btn-primary']) }}</p>
        {{ Form::close() }}

     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>

@endsection
