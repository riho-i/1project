<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>物件登録</title>
</head>

<body>

    <h1>物件登録</h1>  
        <form method="POST">
            @csrf
            <div>
                <label for="name">物件名</label>
                <input type="text" name="name" id="name" required>
                <label for="name">住所</label>
                <input type="text" name="zyuusyo" id="zyuusyo" required>
                <label for="name">オーナー</label>
                <input type="text" name="owner" id="owner" required>
            </div>
        
            <button>登録</button>
            <input type="hidden" name="mode" value="entry">
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
