<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laptops</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="https://www.ocpgroup.ma/fr">
                <img src="https://img.freepik.com/psd-gratuit/logo-abstrait-degrade_23-2150689657.jpg?w=740&t=st=1716546904~exp=1716547504~hmac=3dce7c897fc921cf03ddbaf00abf723776768535d90f2033d9d061bcdd5f92af " alt="Logo" width="40" height="40" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('homepage') }}">Home</a>
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->email }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@if (auth()->check() && auth()->user()->role == 'admin')


    <div class="container d-flex justify-content-start my-4">
        <form class="form-inline my-2 my-lg-0" action="{{ route('searchLaptop') }}" method="GET">
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
                        <h4>Laptops Data:</h4>
                        <a href="{{ route('laptop.create') }}" class="btn btn-primary btn-sm">Add Laptop</a>
                    </div>
                    <div class="card-body">
                        @if(isset($laptops) && count($laptops) > 0)
                            <table class="table table-border table-striped">
                                <thead>
                                    <tr>
                                        <th>Laptop ID</th>
                                        <th>Laptop Name</th>
                                        <th>Guarantee</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laptops as $laptop)
                                        <tr>
                                            <td>{{ $laptop->id }}</td>
                                            <td>{{ $laptop->laptop_name }}</td>
                                            <td>{{ $laptop->guarantee }}</td>
                                            <td>{{ $laptop->quantity }}</td>
                                            <td>{{ $laptop->status }}</td>
                                            <td class="d-flex">
                                                <form action="{{ route('laptop.destroy', $laptop->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                <form action="{{ route('laptop.edit', $laptop->id) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning mx-2">Edit</button>
                                                </form>
                                                <a href="{{ route('laptop.show', $laptop->id) }}" class="btn btn-success">Show More Info</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $laptops->links() }}
                        @else
                            <div class="alert alert-info">No laptops found.</div>
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
                    <h4>Laptops available:</h4>
                </div>
                <div class="card-body">
                        <table class="table table-border table-striped">
                            <thead>
                                <tr>
                                    <th>Laptop ID</th>
                                    <th>Laptop Name</th>
                                    <th>Guarantee</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($availableLaptops as $availableLaptop)
                                    <tr>
                                        <td>{{ $availableLaptop->id }}</td>
                                        <td>{{ $availableLaptop->laptop_name }}</td>
                                        <td>{{ $availableLaptop->guarantee }}</td>
                                        <td>{{ $availableLaptop->quantity }}</td>
                                        <td>{{ $availableLaptop->status }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('laptop.show', $availableLaptop->id) }}" class="btn btn-success">Show More Info</a>
                                            @php
                                                $userAssociatedWithLaptop = $availableLaptop->users()->where('user_id', auth()->id())->exists();
                                            @endphp
                                            @if (!$userAssociatedWithLaptop)
                                                <form action="{{ route('laptop.use', $availableLaptop->id) }}" method="POST">
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
                        {{ $availableLaptops->links() }}
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
