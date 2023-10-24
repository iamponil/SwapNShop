<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Download</title>
</head>
<body>
    <style>
        li{
            font-size: 25px;
            line-height: 52px;
            text-align: center;
            list-style-type: none;
        }

        b{
            color: rgb(250, 14, 14);
        }
    </style>

<table class="table" id="maTable">
        <thead>
        <tr>
          <th>id</th>
          <th>echange</th>
          <th>adresse de livraison</th>
          <th>utilisateur</th>
          <th>date d'envoie</th>

        </tr>
        </thead>
        <tbody class="table-border-bottom-0">

        @foreach($livraison as $index => $val)
          <tr>
            <td>{{ $val['id'] }}</td>
            <td>{{ $val['Id_echange'] }}</td>
            <td>{{$val['adresseComp'] }}</td>
            <td>{{ $val['userName'] }}</td>
            <td>{{ $val['Date_envoi'] }}</td>

          </tr>
        @endforeach

        </tbody>
      </table>
</body>
</html>

