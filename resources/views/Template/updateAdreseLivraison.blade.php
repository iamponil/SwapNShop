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
            padding: 20px;
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
                <i class="fas fa-paint-brush"></i> Update Address
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
             <form action="{{ route('updateL', $adresseLivraison->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')

                <div class="form-group">
                    <label for="nom" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$adresseLivraison->nom}}">
                </div>
                <div class="form-group">
                    <label for="prenom" class="form-label">FirstName</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{$adresseLivraison->prenom}}">
                </div>
                <div class="form-group">
                    <label for="tel" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="tel" name="tel" value="{{$adresseLivraison->tel}}">
                </div>
                <div class="form-group">
                    <label for="pays" class="form-label">Country</label>
                    <input type="text" class="form-control" id="pays" name="pays" value="Tunisie" readonly>
                </div>
                <div class="form-group">
                    <label for="ville" class="form-label">Government</label>
                    <select class="form-control" id="ville" name="ville">
                         <option>Select government</option>
                    <option value="Ariana">Ariana</option>
                    <option value="Beja">Beja</option>
                    <option value="Ben Arous">Ben Arous</option>
                    <option value="Bizerte">Bizerte</option>
                    <option value="Gabes">Gabes</option>
                    <option value="Gafsa">Gafsa</option>
                    <option value="Jendouba">Jendouba</option>
                    <option value="Kairouan">Kairouan</option>
                    <option value="Kebili">Kebili</option>
                    <option value="Kef">Kef</option>
                    <option value="Mahdia">Mahdia</option>
                    <option value="Manouba">Manouba</option>
                    <option value="Medenine">Medenine</option>
                    <option value="Monastir">Monastir</option>
                    <option value="Nabeul">Nabeul</option>
                    <option value="Sfax">Sfax</option>
                    <option value="Sidi Bouzid">Sidi Bouzid</option>
                    <option value="Siliana">Siliana</option>
                    <option value="Sousse">Sousse</option>
                    <option value="Tataouine">Tataouine</option>
                    <option value="Tozeur">Tozeur</option>
                    <option value="Tunis">Tunis</option>
                    <option value="Zaghouan">Zaghouan</option>
                  </select>
                    </select>
                </div>
                <div class="form-group">
                    <label for="codepostal" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="codepostal" name="codepostal" value="{{$adresseLivraison->codepostal}}">
                </div>
                <div class="form-group">
                    <label for="Adressecomp" class="form-label">Full Address</label>
                    <input type="text" class="form-control" id="Adressecomp" name="Adressecomp" value="{{$adresseLivraison->Adressecomp}}">
                </div>
                <button type="submit" class="submit-button">Send</button>
            </form>
        </div>
    </div>
</body>
</html>
