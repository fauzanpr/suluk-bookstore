<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quickview</title>
</head>

<body>
    <p>Judul : {{ $book->title }}</p>
    <p>Pengarang : {{ $book->author }}</p>
    <p>ISBN : {{ $book->isbn }}</p>
    <p>Harga : {{ $book->price }}</p>
    <p>Penerbit : {{ $book->publisher }}</p>
    <p>Stock : {{ $book->stock }}</p>
    <p>Kategori : {{ $book->category->category_name }}</p>
    <br>
    <a href="/">Kembali</a>

</body>

</html>
