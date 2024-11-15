<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kölcsönzött filmek</title>
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

    <h1>Kölcsönönzött filmek</h1>

    <table>
        <thead>
            <th>Film címe</th>
            <th>Rendező</th>
            <th>Kölcsönző</th>
            <th>Kölcsönzés dátuma</th>
            <th>Műveletek</th>
        </thead>

        <tbody>
            @foreach ($rented as $rent)
                <tr>
                    <td>{{$rent->film->title}}</td>
                    <td>{{$rent->film->director}}</td>
                    <td>{{$rent->name}}</td>
                    <td>{{$rent->rent_start}}</td>
                    <td>
                        <form method="POST">
                            @csrf 
                            @method("PUT")
                            <input type="hidden" name = "rent_id" value = "{{$rent->id}}">
                            <input type="date" name="rent_end">
                            <input type="submit" value="Visszahozva">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>