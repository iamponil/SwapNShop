<!DOCTYPE html>
<html>
<head>
  <title>Event Participation Email</title>
</head>
<body>
<p>Hello <strong>{{$user->name}}</strong> , You have successfully joined <strong>{{$event->title}}</strong> which wil be held on {{$event->date_time->format('d M, Y H:i')}}.</p>
<p>You will find below your Ticket</p>
<em>Sincerely SwapNShop.</em>
</body>
</html>
