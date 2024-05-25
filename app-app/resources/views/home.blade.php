<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <style>
        body {
            font-family: serif;
        }

        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
            background-image: url('https://thumbs.dreamstime.com/z/asset-management-business-technology-internet-network-concept-197187136.jpg?ct=jpeg');
            background-size: cover;
            background-position: center;
            color: white;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="https://www.ocpgroup.ma/fr">
                <img src="https://img.freepik.com/psd-gratuit/logo-abstrait-degrade_23-2150689657.jpg?w=740&t=st=1716546904~exp=1716547504~hmac=3dce7c897fc921cf03ddbaf00abf723776768535d90f2033d9d061bcdd5f92af" alt="Logo" width="40" height="40"
                    class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
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
                        <a class="nav-link" href="{{ route('asset-type') }}">Services</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->email }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href={{ route('logout') }}>logout</a>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="center-content">
        <div class="container text-center">
            <h1 class="mb-4">Asset management</h1>
            <p class="lead mb-4">L'asset management dans le contexte des équipements informatiques vise àgérer
                efficacement les ressources matérielles et logicielles d'OCP.
                gérer ces actifs numériques, garantir leura
                explorer les meilleuresdisponibilité, optimiser leur utilisation et minimiser les coûts associés.</p>
            <a href="{{ route('asset-type') }}" class="btn btn-primary">lets started</a>
        </div>
    </section>
    <footer class="bg-light text-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4 my-4">
                    <p>&copy; 2024 ocp</p>
                </div>
                <div class="col-md-4 text-center my-3">
                    <img src="https://img.freepik.com/psd-gratuit/logo-abstrait-degrade_23-2150689657.jpg?w=740&t=st=1716546904~exp=1716547504~hmac=3dce7c897fc921cf03ddbaf00abf723776768535d90f2033d9d061bcdd5f92af" alt="Logo" width="40" height="40"
                        class="d-inline-block align-top">
                </div>
                <div class="col-md-4 my-4">
                    <p>Email: ocpsafi@gmail.com</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
