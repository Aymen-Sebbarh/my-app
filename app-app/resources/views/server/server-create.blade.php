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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>add server</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-groupe mb-3" method="POST" action="{{ route('server.store') }}">
                            @csrf
                            <div class="form-group">
                                <label> Server Name:</label>
                                <input type="text" class="form-control" name="server_name">
                                @error('server_name')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Host name:</label>
                                <input type="text" class="form-control" name="host_name">
                                @error('host_name')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ip_address">Ip_address:</label>
                                <input type="text" class="form-control" name="ip_address">
                                @error('ip_address')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Port">Port:</label>
                                <input type="number" class="form-control" name="port">
                                @error('port')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Quantity">Quantity:</label>
                                <input type="number" class="form-control" name="quantity">
                                @error('quantity')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="guarantee">guarantee(par mois):</label>
                                <input type="number" class="form-control" name="guarantee">
                                @error('guarantee')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                </div>
                                <select class="custom-select" name="status">
                                    <option selected>Choose...</option>
                                    <option value="buying succeed">buying succeed</option>
                                    <option value="available in stock">available in stock</option>
                                    <option value="its used">its used</option>
                                    <option value="in repair">in repair</option>
                                    <option value="not available">not available</option>
                                </select>

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>


                        </form>

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
