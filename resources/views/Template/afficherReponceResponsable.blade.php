<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Vos Commentaires</title>
    <style>
        .comment-item {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="comment-title">{{ $reclamation->nomRec }}</h1>

    <div class="alert alert-secondary comment-body" role="alert">
        {{ $reclamation->body }}
    </div>

    <ul class="list-group comment-list">
        @foreach ($comments as $comment)
            <li class="list-group-item comment-item">{{ $comment->contenue }}</li>
        @endforeach
    </ul>
   <a href="{{ route('historyFR', $reclamation->id) }}" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
           Retour à la réclamation
  </a>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
