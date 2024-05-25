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
          background-image: url('https://img.freepik.com/vecteurs-libre/abstrait-realiste-particules_23-2148409681.jpg?w=996&t=st=1712352551~exp=1712353151~hmac=6f9b9b4821a0188d25c469074a3c411e3f5a41a7a447fa1a110cf55acc76cf72'); /* Replace 'your-image-url.jpg' with the URL or path to your image */
          background-size: cover;
          background-repeat: no-repeat;

        }
      </style>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">create account </h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('users.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                                            @error('name')
                                            <p class="text text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="surname">Surname</label>
                                            <input type="text" class="form-control" name="prenom" placeholder="Enter your surname">
                                            @error('prenom')
                                            <p class="text text-danger">{{$message}}</p>
                                            @enderror</div>
                                            <label for="role">Role</label>
                                            <select id="role" name="role" class="form-control">
                                                <option selected>Choose...</option>
                                                <option value="user">user</option>
                                                <option value="admin">admin</option>
                                            </select>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                                            @error('email')
                                            <p class="text text-danger">{{$message}}</p>
                                            @enderror</div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number" placeholder="Enter phone number">
                                            @error('phone_number')
                                            <p class="text text-danger">{{$message}}</p>
                                            @enderror</div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                            @error('password')
                                            <p class="text text-danger">{{$message}}</p>
                                            @enderror</div>

                                        <button type="submit" class="btn btn-primary">Submit</button>


                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
