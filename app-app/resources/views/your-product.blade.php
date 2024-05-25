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

                    @if (auth()->check() && auth()->user()->role == 'user')
                    <li class="nav-item">
                        <a class="nav-link active" > your asset</a>
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


    <div class="container my-3">
        <form action="{{ route('filterData') }}" method="GET">
            <div class="form-group col-md-4 d-flex">
                <select id="assetType" name="assetType" class="form-control">
                    <option selected>Choose...</option>
                    <option value="server">Server</option>
                    <option value="laptop">Laptop</option>
                    <option value="network equipment">Network Equipment</option>
                </select>
                <button type="submit" class="btn btn-primary mx-2">Filter</button>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h4>your asset:</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-border table-striped">
                            <thead>
                                <th> id</th>
                                <th> name</th>
                                <th>guarantee</th>
                                <th>action</th>
                            </thead>
                            <tbody>

                                @foreach ($serverData as $server)
                                <tr>
                                        <td>{{ $server->id }}</td>
                                        <td>{{ $server->server_name }}</td>
                                        <td>{{ $server->guarantee }}</td>
                                        <td class="d-flex">
                                            <a href="{{route("server.show",$server->id)}}" class="btn btn-warning">show more info</a>
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        @foreach ($laptopData as $laptop)
                                        <td>{{ $laptop->id }}</td>
                                        <td>{{ $laptop->laptop_name }}</td>
                                        <td>{{ $laptop->guarantee }}</td>
                                        <td class="d-flex">
                                            <a href="{{route("laptop.show",$laptop->id)}}" class="btn btn-success">show more info</a>
                                        </td>
                                    </tr>
                                        @endforeach
                                    <tr>
                                        @foreach ($networkData as $network)
                                        <td>{{ $network->id }}</td>
                                        <td>{{ $network->device_Name }}</td>
                                        <td>{{ $network->guarantee }}</td>
                                        <td class="d-flex">
                                            <a href="{{route("network.show",$network->id)}}" class="btn btn-info">show more info</a>
                                        </td>
                                    </tr>
                                        @endforeach
                            </tbody>
                        </table>
    {{-- <h1>Your product</h1>
    @foreach ($serverData as $server)
        <ul>
            <li>{{ $server->server_name }}</li>
            <li>{{ $server->guarantee }}</li>
            <li>{{ $server->quantity }}</li>
            <li>{{ $server->status }}</li>
        </ul>
    @endforeach
    @foreach ($laptopData as $laptop)
        <ul>
            <li>{{ $laptop->laptop_name }}</li>
            <li>{{ $laptop->guarantee }}</li>
            <li>{{ $laptop->quantity }}</li>
            <li>{{ $laptop->status }}</li>
        </ul>
    @endforeach
    @foreach ($networkData as $network)
        <ul>
            <li>{{ $network->device_Name }}</li>
            <li>{{ $laptop->guarantee }}</li>
            <li>{{ $laptop->quantity }}</li>
            <li>{{ $laptop->status }}</li>
        </ul>
    @endforeach --}}



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
