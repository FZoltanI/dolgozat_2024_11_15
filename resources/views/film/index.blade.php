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
    <h1>Kölcsönözhető filmek</h1>

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

                        <form action="">
                            @csrf
                            <input type="submit" value="Törlés">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>