<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-size: 16px;
      font-family: 'Helvetica', Arial, sans-serif;
      margin: 0;
    }

    .container {
      width: 602px;
      height: 200px;
      margin: 0 auto;
      border-radius: 4px;
      background-color: #4537de;
      box-shadow: 0 8px 16px rgba(35, 51, 64, 0.25);
    }

    .column-1 {
      float: left;
      width: 400px;
      height: 200px;
      border-right: 2px dashed #fff;
    }

    .column-2 {
      float: right;
      width: 200px;
      height: 200px;
    }

    .text-frame {
      padding: 40px;
      height: 120px;
    }

    .qr-holder {
      position: relative;
      width: 160px;
      height: 160px;
      margin: 20px;
      background-color: #fff;
      text-align: center;
      line-height: 30px;
      z-index: 1;
    }

    .qr-holder > img {
      margin-top: 20px;
    }

    .event {
      font-size: 24px;
      color: #fff;
      letter-spacing: 1px;
    }

    .date {
      font-size: 18px;
      line-height: 30px;
      color: #a8bbf8;
    }

    .name,
    .ticket-id {
      font-size: 16px;
      line-height: 22px;
      color: #fff;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="column-1">
    <div class="text-frame">
      <div class="event">{{$event->title}}</div>
      <div class="date">{{$event->date_time->format('d M, Y H:i')}}</div>
      <br/>
      <div class="name">{{$user->name}}</div>
      <div class="ticket-id">#{{$event->id}}-{{$user->id}}</div>
    </div>
  </div>

  <div class="column-2">
    <div class="qr-holder">
      {{-- <img src="{{ $message->embed("img/qr-code.png") }}" width="120px" height="120px" alt="QRCode">--}}
      {{-- <img src="{{asset("qrcodes/qrcode265.svg")}}" width="120px" height="120px" alt="QRCode">--}}
      <img src="{{public_path("qrcodes/qrcode{$event->id}{$user->id}.svg")}}" width="120px" height="120px" alt="QRCode">
      {{-- {{$qrcode}} --}}
    </div>
  </div>
</div>
</body>
</html>
