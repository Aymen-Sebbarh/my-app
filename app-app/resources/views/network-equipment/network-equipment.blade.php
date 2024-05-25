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


    @if (auth()->check() && auth()->user()->role == 'admin')
        <div class="container d-flex justify-content-start my-4">
            <form class="form-inline my-2 my-lg-0" action="{{ route('searchNetwork') }}" method="GET">
                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <div class="container my-3">
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>network equipment  data:</h4>
                            <a href="{{ route('network.create') }}" class="btn btn-primary btn-sm">Add network equipment</a>
                        </div>
                        <div class="card-body">
                            @if(isset($networks) && count($networks) > 0)

                            <table class="table table-border table-striped">
                                <thead>
                                    <th> id</th>
                                    <th> name</th>
                                    <th>guarantee</th>
                                    <th>quantitè</th>
                                    <th>status</th>
                                    <th>action</th>
                                </thead>
                                <tbody>

                                    @foreach ($networks as $network)
                                        <tr>
                                            <td>{{ $network->id }}</td>
                                            <td>{{ $network->device_Name }}</td>
                                            <td>{{ $network->guarantee }}</td>
                                            <td>{{ $network->quantity }}</td>
                                            <td>{{ $network->status }}</td>
                                            <td class="d-flex">
                                                <form action="{{ route('network.destroy', $network->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>

                                                <form action="{{ route('network.edit', $network->id) }}" method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning mx-2">edit</button>
                                                </form>

                                                <a href="{{route("network.show",$network->id)}}" class="btn btn-success btn-sm">show more info</a>

                                            </td>
                                        </tr>

                                    @endforeach


                                </tbody>
                            </table>
                            {{$networks->links()}}
                            @else
                            <div class="alert alert-info">No networks equipment found.</div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
<div class="container my-3">
    <div class="container my-3">
        @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
        @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>network equipment  available:</h4>
                </div>
                <div class="card-body">

                    <table class="table table-border table-striped">
                        <thead>
                            <th> id</th>
                            <th> name</th>
                            <th>guarantee</th>
                            <th>quantitè</th>
                            <th>status</th>
                            <th>action</th>
                        </thead>
                        <tbody>

                            @foreach ($availableNetworks as $availableNetwork)
                                <tr>
                                    <td>{{ $availableNetwork->id }}</td>
                                    <td>{{ $availableNetwork->device_Name }}</td>
                                    <td>{{ $availableNetwork->guarantee }}</td>
                                    <td>{{ $availableNetwork->quantity }}</td>
                                    <td>{{ $availableNetwork->status }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('network.show', $availableNetwork->id) }}" class="btn btn-success">Show More Info</a>
                                        @php
                                            $userAssociatedWithNetwork = $availableNetwork->users()->where('user_id', auth()->id())->exists();
                                        @endphp
                                        @if (!$userAssociatedWithNetwork)
                                            <form action="{{ route('network.use', $availableNetwork->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                <button type="submit" class="btn btn-primary mx-2">Use It</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>

                            @endforeach


                        </tbody>
                    </table>
                    {{$availableNetworks->links()}}

                </div>
            </div>
        </div>
    </div>
</div>
</div>
    @endif
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
