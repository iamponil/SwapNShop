<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 70px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .form-title {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
            font-size: 16px;
            color: #333;
        }

        .submit-button {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .bg-img1 {
            background-color: #FAF0E6; /* Couleur d'arrière-plan */
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bg-img1 h2 {
            color: #fff;
            font-size: 24px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
<body class="animsition">
    <!-- Form container -->
    <div class="center-form">
        <div class="form-container">
            <h4 class="form-title py-3 mb-4">
                <i class="fas fa-paint-brush"></i> Update Reclamation
            </h4>
                @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <form action="{{ route('updateFR', $reclamtion->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="mb-3">
                    <label for="nomRec" class="form-label">Name Claim <span class="text-danger">*</span></label>
                    <input value="{{$reclamtion->nomRec}}" id="nomRec" name="nomRec" type="text" class="form-control"
                        placeholder="Name Claim">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Claim Content <span class="text-danger">*</span></label>
                    <textarea class="form-control" placeholder="Claim Content" name="body" id="body" cols="12"
                        rows="3">{{$reclamtion->body}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">attached File <span class="text-danger">*</span></label>
                    <input id="image" name="image" type="file" class="form-control">

                    <img class="mt-2" src="/img/{{ $reclamtion->image }}" width="300px">
                </div>
<br>
                <div>
                <br>
                    <button type="submit" class="submit-button btn btn-success btn-icon-text mb-2 mb-md-0">
                        Update Reclamation Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
