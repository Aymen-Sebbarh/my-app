<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <style>
        body {
            font-family: serif;
        }

        .card {
            border: none;
            box-shadow: none;
        }

        .card-title text text-center {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-text text-center {
            font-size: 1rem;
        }

        .card:hover {
            transform: translateY(-5px);
        }


    </style>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="https://www.ocpgroup.ma/fr">
                    <img src="https://img.freepik.com/psd-gratuit/logo-abstrait-degrade_23-2150689657.jpg?w=740&t=st=1716546904~exp=1716547504~hmac=3dce7c897fc921cf03ddbaf00abf723776768535d90f2033d9d061bcdd5f92af" alt="Logo" width="40" height="40"
                        class="d-inline-block align-top">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('homepage') }}">Home</a>
                        </li>
                        @if (auth()->check() && auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}"> Users list</a>
                    </li>
                    @endif
                    @if (auth()->check() && auth()->user()->role == 'user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('yourProduct')}}"> your asset</a>
                    </li>
                    @endif

                        <li class="nav-item">
                            <a class="nav-link active" href="#">Services</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->email }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}">logout</a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-warning">
                    <div class="card-body">
                        <img src="{{ asset('storage/logo/server.png') }}" class="card-img">
                        <h1 class="card-title text text-center">Servers</h1>
                        <h3 class="card-text text-center">
                            @if (auth()->check() && auth()->user()->role == 'admin')
                            {{$nbr}}
                            @else
                            {{$nbrServerAvailable}}
                            @endif
                        </h3>
                        <a href="{{ route('servers') }}" class="btn btn-light">show More info</a>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-success">
                    <div class="card-body">
                        <img src="{{ asset('storage/logo/laptop.png') }}" class="card-img">
                        <h1 class="card-title text text-center">Laptops</h1>
                        <h3 class="card-text  text-center">
                            @if (auth()->check() && auth()->user()->role == 'admin')
                            {{$nbrLaptop}}
                            @else
                            {{$nbrLaptopAvailable}}
                            @endif
                        </h3>
                        <a href="{{ route('laptops') }}" class="btn btn-light">show More info</a>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-primary">
                    <div class="card-body">
                        <img src="{{ asset('storage/logo/network.png') }}" class="card-img">

                        <h2 class="card-title text text-center">Network equipment</h2>
                        <h3 class="card-text  text-center">
                            @if (auth()->check() && auth()->user()->role == 'admin')
                            {{$nbrNetwork}}
                            @else
                            {{$nbrNetworkAvailable}}
                            @endif
                            </h3>
                        <a href="{{ route('network-equipment') }}" class="btn btn-light">show More info</a>

                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
