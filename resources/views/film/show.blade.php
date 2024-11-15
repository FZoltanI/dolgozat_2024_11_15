<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>
</head>
<body>
    <h1>{{$filmData->title}}</h1>
    <p>Műfaj: {{$filmData->genre->name}}</p>
    <p>Megjelenés éve: {{$filmData->year}}</p>
    <p>Rendező: {{$filmData->director}}</p>

    <br>
    <form method="POST">
        @csrf    
        <input type="hidden" name = "film_id" value = "{{$filmData->id}}">
        <h3>Kölcsönzés</h3>
        Kölcsönző neve: <input type="text" name = "kolcsonzo">
        <br>
        Kölcsönzés dátuma: <input type="date" name = "kolcsonzes">
        <br>
        <input type="submit" value="Kölcsönzés">
    </form>
</body>
</html>