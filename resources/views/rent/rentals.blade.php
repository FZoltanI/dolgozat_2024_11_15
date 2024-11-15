<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kölcsönzések</title>
    <style>
        table{
            border-spacing: 0;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
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

    <h1>Kölcsönzések</h1>

    <form action="GET" style="border: 1px solid black; display: inline-block; padding: 5px;">
        <h3>Szűrés</h3>
        Filcím: <input type="text" name="title"><br>
        Kölcsönző neve: <input type="text" name="name"><br>
        Műfaj: <input type="text" name="genre"><br>
        Kölcsönzés kezdete: <input type="date" name="rent_start"><br>
        Kölcsönzés vége: <input type="date" name="rent_end"><br>
        <input type="submit" value="Szűrés">
    </form>

    <br>
    <br>
    <table>
        <thead>
            <th>Film címe</th>
            <th>Rendező</th>
            <th>Műfaj</th>
            <th>Megjelenés éve</th>
            <th>Kölcsönző neve</th>
            <th>Kölcsönzés kezdete</th>
            <th>Kölcsönzés vége</th>
        </thead>

        <tbody>
            @foreach ($rentals as $rent)
                <tr>
                    <td>{{$rent->film->title}}</td>
                    <td>{{$rent->film->director}}</td>
                    <td>{{$rent->film->genre->name}}</td>
                    <td>{{$rent->film->year}}</td>
                    <td>{{$rent->name}}</td>
                    <td>{{$rent->rent_start}}</td>
                    <td>{{$rent->rent_end}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>