<!DOCTYPE html>
<html>
<head>
    <title>Evaluación del Inquilino</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h2, h3 {
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h1>Evaluación del Inquilino</h1>

    <h2>Resultados de la Evaluación</h2>
    <p><strong>Puntaje Total: </strong> {{ $puntajeTotal }}</p>
    <p><strong>Clasificación: </strong> {{ $estadoInquilino }}</p>

    <h3>Comentarios de Referencias Personales</h3>
    <table>
        <thead>
            <tr>
                <th>Usuario Registrante</th>
                <th>Referencia Personal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arrendatarios as $arrendatario)
                <tr>
                    <td>{{ $arrendatario->usuario->nombre }}</td>
                    <td>{{ $arrendatario->referencias_personales }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
