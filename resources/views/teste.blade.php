<!-- resources/views/api/data.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Teste</title>
</head>

<body>
    <h1>Testando</h1>
    <ul>
        @foreach($data as $item)
            <li>{{ $item['nomeEmpresa'] }} - {{ $item['usuario'] }}</li>
        @endforeach
    </ul>
</body>

</html>