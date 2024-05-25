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
                        <h4>add network equipment:</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-groupe mb-3" method="POST" action="{{ route('network.store') }}">
                            @csrf
                            <div class="form-group">
                                <label> Name:</label>
                                <input type="text" class="form-control" name="device_Name">
                                @error('device_Name')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>model:</label>
                                <input type="text" class="form-control" name="Model">
                                @error('Model')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Manufacturer:</label>
                                <input type="text" class="form-control" name="Manufacturer">
                                @error('Manufacturer')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >number ports:</label>
                                <input type="number" class="form-control" name="number_ports">
                                @error('number_ports')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >security Features:</label>
                                <input type="text" class="form-control" name="security_Features">
                                @error('security_Features')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Management Interface:</label>
                                <input type="text" class="form-control" name="Management_Interface">
                                @error('Management_Interface')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Quantity:</label>
                                <input type="number" class="form-control" name="quantity">
                                @error('quantity')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >guarantee(par mois):</label>
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
