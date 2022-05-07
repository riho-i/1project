@extends('layout')

@section('pagecontent')


    <div class="position">
     

    <p>下記の内容で登録しますか？</p><br>

    <table class="table">
        <tbody>
          <tr>
            <th scope="row">号室</th>
            <td> {{ $goushitu }} </td>
          </tr>
          <tr>
            <th scope="row">間取り</th>
            <td> {{ $madori }} </td>
          </tr>
          <tr>
            <th scope="row">家賃</th>
            <td> {{ $yatin }} </td>
          </tr>
          <tr>
            <th scope="row">共益費</th>
            <td> {{ $kyouekihi }} </td>
          </tr>
          <tr>
            <th scope="row">駐車場</th>
            <td> {{ $car }} </td>
          </tr>
        </tbody>
    </table>

    <div class="form-disp">
        <a href="{{ route("heya_regist", ['bukken' => $bukkenid]) }}">
            <button class="btn btn-primary">戻る</button>
        </a>
        {{ Form::open(['method' => 'post', 'id' => 'entry_form']) }}
        {{ Form::token() }}
        {{ Form::hidden('goushitu', $goushitu, ['id' => 'goushitu', 'class' => 'form-control', 'readonly' => 'readonly' ]) }}
        {{ Form::hidden('madori', $madori, ['id' => 'madori', 'class' => 'form-control']) }}
        {{ Form::hidden('yatin', $yatin , ['id' => 'yatin', 'class' => 'form-control' ]) }}
        {{ Form::hidden('kyouekihi', $kyouekihi , ['id' => 'kyouekihi', 'class' => 'form-control' ]) }}
        {{ Form::hidden('car', $car , ['id' => 'car', 'class' => 'form-control' ]) }}
        {{ Form::button('登録', ['type' => 'button', 'name' => 'mode', 'id' => 'button', 'class' => 'btn btn-primary']) }}
        {{ Form::hidden('mode', 'heya_entry')}}
        {{ Form::hidden('bukkenid', $bukkenid)}}
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


        $('#button').on('click', function (){

            $.ajax({
                type: 'post',
                url: '{{ route('heyaentry_ajax') }}',
                data: $('#entry_form').serializeArray(),
                dataType: 'json',
            })

            .done(function(result) {
                $('#exampleModal').modal('show');
                $('#modal_msg').text(result['msg']);
            })

            .fail(function(){

            });
        })

    </script>
    
</body>

</html>

@endsection
