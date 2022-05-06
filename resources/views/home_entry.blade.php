@extends('layout')

@section('pagecontent')


    <div class="position">
     

    <p>下記の内容で登録しますか？</p><br>

    <table class="table">
        <tbody>
          <tr>
            <th scope="row">物件名</th>
            <td> {{ $name }} </td>
          </tr>
          <tr>
            <th scope="row">住所</th>
            <td> {{ $zyuusyo }} </td>
          </tr>
          <tr>
            <th scope="row">オーナー名</th>
            <td> {{ $owner }} </td>
          </tr>

        </tbody>
    </table>


     <div class="form-disp">
        <a href="{{ route("regist") }}">
            <button class="btn btn-primary">戻る</button>
        </a>
        {{Form::open(['method' => 'post', 'id' => 'entry_form'])}}
        {{ Form::token() }}
        {{ Form::hidden('name', $name, ['id' => 'name', 'class' => 'form-control', 'readonly' => 'readonly' ]) }}
        {{ Form::hidden('zyuusyo', $zyuusyo, ['id' => 'zyuusyo', 'class' => 'form-control']) }}
        {{ Form::hidden('owner', $owner , ['id' => 'owner', 'class' => 'form-control' ]) }}
        {{ Form::hidden('goushitu', $goushitu , ['id' => 'goushitu', 'class' => 'form-control' ]) }}
        {{ Form::hidden('madori', $madori , ['id' => 'madori', 'class' => 'form-control' ]) }}
        {{ Form::button('登録', ['type' => 'button', 'name' => 'mode', 'id' => 'button', 'class' => 'btn btn-primary']) }}
        {{ Form::hidden('mode', 'entry')}}
        {{ Form::close() }}
    </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                    <p id="modal_msg"></p>
                    </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
            </div>
        </div>

     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>

        $('#button').on('click', function () {
            
            $.ajax({
                type: 'post',
                url: '{{ route("entry_ajax") }}',
                data: $('#entry_form').serializeArray(), // 送信するデータ
                dataType: 'json' // 受け取る形式
            })
            // 検索成功時にはページに結果を反映
            .done(function(result) {
                $('#exampleModal').modal('show');
                $('#modal_msg').text(result['msg']);
                
            })
            // 検索失敗時には、その旨をダイアログ表示
            .fail(function() {

            });
        })

    </script>
    
</body>

</html>

@endsection
