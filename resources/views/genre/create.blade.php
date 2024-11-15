<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Műfaj hozzáadása</title>
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

    <h1>Új műfaj hozzáadása</h1>

    <form action="" method="POST">
        @csrf
        Műfaj:
        <input type="text" name = "genre">
        <input type="submit" value="Rögzítés">
    </form>
</body>
</html>