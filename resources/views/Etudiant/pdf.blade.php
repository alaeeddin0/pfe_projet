<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relevé de Notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #0066cc;
        }

        h3 {
            color: #009933;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .moyenne-container {
            text-align: center;
            margin-top: 20px;
        }

        .moyenne {
            font-size: 18px;
            font-weight: bold;
            color: #990000;
        }
    </style>
</head>
<body>
<h1>EBKSCHOOL</h1>
   
    <h3>Nom : {{$nom}}</h3>
    <h3>Prénom : {{$prenom}}</h3>

    <!-- Tableau des notes -->
    <h2 style="text-align: center;">Relevé de Notes</h2>

    <table>
        <thead>
            <tr>
              
                <th>Matière</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
            
                <td>{{ $note->matiere }}</td>
                <td>{{ $note->note }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Moyenne générale -->
    <div class="moyenne-container">
        <div class="moyenne">
            Moyenne Générale: {{ $moyenne }}
        </div>
    </div>
</body>
</html>
