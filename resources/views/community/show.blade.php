<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<h1>Communities</h1>
@foreach($communities as $c)
  <p>ID : {{$c['id']}}</p>
  <p>Name : {{$c['name']}}</p>
  <p>Description : {{$c['description']}}</p>
  <a href="{{route('community.getById',['community'=>$c['id']])}}"><h4>Show {{ $c['name'] }} Details</h4></a>
  <hr>
  <br>
@endforeach
</body>
</html>
