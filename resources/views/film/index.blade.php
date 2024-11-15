<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmek</title>
    <style>
        th, td {
            border: 1px solid black;
        }
    </style>
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

    <h1>Kölcsönözhető filmek</h1>

    <form method="GET">
        @csrf
        <h2>Szűrés:</h2>
        <input type="text" name = "title" placeholder="Film címe">
        <input type="submit" value="Szűrés">
    </form>

    <br>
    <br>

    <table>
        <thead>
            <th>Film címe</th>
            <th>Rendező</th>
            <th>Megjelenés éve</th>
            <th>Műfaj</th>
            <th>Műveletek</th>
        </thead>

        <tbody>
            @foreach ($films as $film)
                <tr>
                    <td>{{$film->title}}</td>
                    <td>{{$film->director}}</td>
                    <td>{{$film->year}}</td>
                    <td>{{$film->genre->name}}</td>
                    <td>
                        <form action="">
                            @csrf
                            <input type="submit" value="Kölcsönzés">
                        </form>

                        <form method="POST" action="{{route("delete_film", $film->id)}}">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Törlés">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>