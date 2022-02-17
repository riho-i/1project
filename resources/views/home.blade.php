<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/home.css') }}" >

</head>

<body>



    <!--ナビゲーションバー -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">物件管理システム</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">物件情報</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">入居者情報</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">オーナー情報</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <article>
        <div class="side">
            <div class="flex-shrink-0 p-3 bg-white" style="width: 12rem; height: 11em">
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#home-collapse" aria-expanded="true">
                            物件情報
                        </button>
                        <div class="collapse show" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark rounded">物件管理</a></li>
                                <li><a href="#" class="link-dark rounded">物件情報</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#dashboard-collapse" aria-expanded="false">
                            契約情報
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark rounded">入居者</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#orders-collapse" aria-expanded="false">
                            オーナー情報
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark rounded">オーナー</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    <div class="right-top">

       <div class id="content">
         <!-- 検索画面 -->
        <div class="form">
                <div class="mb-3">
                    <label for="Input" class="form-label">物件名</label>
                    <input type="text" class="form-control" id="Input">
                </div>
                <div class="mb-3">
                  <label for="exampleFormSelect1" class="form-label">住所</label>
                  <select class="form-select" id="exampleFormSelect1">
                    <option selected>選択</option>
                    <option value="1">群馬県前橋市</option>
                    <option value="2">群馬県伊勢崎市</option>
                    <option value="3">群馬県太田市</option>
                  </select>
                </div>
        </div>
    
        <!-- テーブル　-->

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">物件No</th>
                    <th scope="col">物件名</th>
                    <th scope="col">住所</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="th-size" scope="row">1</th>
                    <td>{!! $b_name1 !!}</td>
                    <td>{!! $b_zyuusyo1 !!}</td>
                </tr>
                <tr>
                    <th class="th-size" scope="row">2</th>
                    <td>{!! $b_name2 !!}</td>
                    <td>{!! $b_zyuusyo2 !!}</td>
                </tr>
                <tr>
                    <th class="th-size" scope="row">3</th>
                    <td>{!! $b_name3 !!}</td>
                    <td>{!! $b_zyuusyo3 !!}</td>
                </tr>
                <tr>
                    <th class="th-size" scope="row">4</th>
                    <td>{!! $b_name3 !!}</td>
                    <td>{!! $b_zyuusyo3 !!}</td>
                </tr>
                <tr>
                    <th class="th-size" scope="row">5</th>
                    <td>{!! $b_name3 !!}</td>
                    <td>{!! $b_zyuusyo3 !!}</td>
                </tr>
                <tr>
                    <th class="th-size" scope="row">6</th>
                    <td>{!! $b_name3 !!}</td>
                    <td>{!! $b_zyuusyo3 !!}</td>
                </tr>
                <tr>
                    <th class="th-size" scope="row">7</th>
                    <td>{!! $b_name3 !!}</td>
                    <td>{!! $b_zyuusyo3 !!}</td>
                </tr>
                <tr>
                    <th class="th-size" scope="row">8</th>
                    <td>{!! $b_name3 !!}</td>
                    <td>{!! $b_zyuusyo3 !!}</td>
                </tr>
            </tbody>
        </table>

        {{ $user[0]-> name }} 

        {{-- ページ切り替え --}}
            <nav aria-label="ページ切り替え">
                <ul class="pagination justify-content-end">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>

          </div>
        <article>
    </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>

</body>

</html>
