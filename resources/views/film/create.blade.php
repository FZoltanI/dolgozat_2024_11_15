<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film hozzáadása</title>
</head>
<body>
    @if (session('success'))
        <p>Siker: {{ session('success') }}</p>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>Hiba: {{ $error }}</p>
        @endforeach
    @endif

    <h1>Új film hozzáadása</h1>

    <form action="" method="POST">
        @csrf
        Film címe:
        <input type="text" name = "title">
        <br>
        Rendező:
        <input type="text" name = "director">
        <br>
        Megjelenés éve:
        <input type="number" name = "year">
        <br>
        Műfaj:
        <select name="genre">
            @foreach ($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" value="Rögzítés">
    </form>
</body>
</html>