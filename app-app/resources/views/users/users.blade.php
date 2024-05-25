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
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> Users list</a>
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
            <form class="form-inline my-2 my-lg-0" action="{{ route('searchUser') }}" method="GET">
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
                            <h4>users list:</h4>
                        </div>
                        <div class="card-body">
                            @if(isset($users) && count($users) > 0)

                            <table class="table table-border table-striped">
                                <thead>
                                    <th>user id</th>
                                    <th> name</th>
                                    <th>prenom</th>
                                    <th>email</th>
                                    <th>phone number</th>
                                    <th>action</th>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->prenom }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td class="d-flex">
                                                <form action="{{ route('users.destroy', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>

                                                <form action="{{ route('users.edit', $user->id) }}" method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning mx-2">edit</button>
                                                </form>


                                            </td>
                                        </tr>

                                    @endforeach


                                </tbody>
                            </table>
                            {{$users->links()}}
                            @else
                            <div class="alert alert-info">No user found.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        you are not admin
    @endif
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
