<!DOCTYPE html>
<html lang="en">
<head>
    <title>Votre Page avec le Formulaire</title>
    <!-- Mise à jour du lien vers les styles Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.21.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin-bottom: 10px;
        }

        button {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .comment-list {
            list-style: none;
            padding: 0;
        }

        .comment-item {
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        /* Style pour mettre en surbrillance le champ si la validation échoue */
        .error {
            border: 2px solid red;
        }

        /* Style pour les icônes */
        .icon {
            color: blue;
            margin-right: 5px;
        }

        /* Style pour la phrase "Poster un commentaire" */
        .comment-header {
            color: blue;
            font-size: 18px;
        }

        /* Style pour l'alerte */
        .alert {
            display: none;
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            padding: 15px;
            margin-top: 20px;
            border: 1px solid #f44336;
            border-radius: 5px;
            color: #f44336;
            background-color: #f8d7da;
            z-index: 9999;
        }

        /* Style pour le bouton "Fermer" de l'alerte */
        .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <form id="commentForm" action="{{ route('commentBlogF.store',$blogCommentairee->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="bor19 m-b-20">
                <p class="comment-header"><i class="bi bi-person-check icon"></i> Poster un commentaire</p>
                <textarea id="comment" class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="comment" placeholder="Comment..."></textarea>
            </div>
            <button type="button" onclick="validateComment()" class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
                Post Comment
            </button>
        </form>
        <ul class="list-group comment-list">
            @foreach ($comments as $comment)
                <p><i class="bi bi-person-check icon"></i> Nom de l'utilisateur : {{ $comment->blog->name }}</p>
                <li class="list-group-item comment-item">{{ $comment->comment }}</li>
            @endforeach
        </ul>
    </div>

    <div id="alert" class="alert">
        <span id="alertMessage"></span>
        <button class="close-btn" onclick="closeAlert()">Fermer</button>
    </div>

    <script>
        // Validation du formulaire avec JavaScript
        function validateComment() {
            var commentField = document.getElementById('comment');
            var alertDiv = document.getElementById('alert');
            var alertMessageSpan = document.getElementById('alertMessage');

            // Vérifier si le champ de commentaire est vide ou ne contient que des espaces
            if (commentField.value.trim() === '') {
                // Mettre en surbrillance le champ avec une classe d'erreur
                commentField.classList.add('error');

                // Afficher l'alerte avec le message approprié
                alertMessageSpan.innerText = 'Le champ de commentaire ne peut pas être vide.';
                showAlert(alertDiv);
            } else {
                // Si le champ est rempli, soumettre le formulaire
                document.getElementById('commentForm').submit();
            }
        }

        // Afficher l'alerte
        function showAlert(alertDiv) {
            alertDiv.style.display = 'block';

            // Fermer automatiquement l'alerte après 5 secondes (5000 millisecondes)
            setTimeout(function() {
                closeAlert();
            }, 5000);
        }

        // Fermer l'alerte
        function closeAlert() {
            var alertDiv = document.getElementById('alert');
            alertDiv.style.display = 'none';
        }
    </script>
</body>
</html>
