<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Картинки</title>
</head>
<body>
<div class="container">
    <br>
    <br>
    <h1>Загрузка файлов на сервер</h1>
    <br>
    <br>
    @foreach($images as $image)
        <img src="{{ route('index'). '/storage/' . $image->path }}" alt="Картнка">
    @endforeach

    <form class="mt-3" method="post" enctype="multipart/form-data" action="{{ route('store') }}">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text">Имя картинки</span>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="input-group">
            <input type="file" name="path" class="form-control mb-3">
        </div>
        <button class="btn btn-outline-secondary" type="submit">Загрузить</button>
    </form>
</div>
</body>
</html>
