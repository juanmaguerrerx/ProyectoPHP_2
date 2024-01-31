<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
       .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .card {
            width: 200px;
            height: 200px;
            border: 2px solid #ccc;
            background-color: white;
            box-shadow: 2px 2px 5px #888888;
            margin: 20px;
            transition: transform 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card:hover {
            transform: scale(1.1);
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin: 10px;
            text-align: center; /* Centrar horizontalmente */
        }

        .card-link {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }
    </style>
    <title>Dashboard</title>
</head>

<body>
    <header>
        @include('navbar')
    </header>

    <div class="main">
        <div class="card-container">
            <div class="card">
                <div class="card-title">Enlace 1</div>
                <a href="https://www.ejemplo1.com" class="card-link"></a>
            </div>
    
            <div class="card">
                <div class="card-title">Enlace 2</div>
                <a href="https://www.ejemplo2.com" class="card-link"></a>
            </div>
        </div>
    
        <div class="card-container">
            <div class="card">
                <div class="card-title">Enlace 3</div>
                <a href="https://www.ejemplo3.com" class="card-link"></a>
            </div>
    
            <div class="card">
                <div class="card-title">Enlace 4</div>
                <a href="https://www.ejemplo4.com" class="card-link"></a>
            </div>
        </div>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
