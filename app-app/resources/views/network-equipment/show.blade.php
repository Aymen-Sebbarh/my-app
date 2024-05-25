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
                        <h4> network equipment information:</h4>
                    </div>
                    <div class="card-body">

                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" name="device_Name" value="{{$network->device_Name}}" disabled>

                            </div>
                            <div class="form-group">
                                <label>Model:</label>
                                <input type="text" class="form-control" name="Model" value="{{$network->Model}}" disabled>

                            </div>
                            <div class="form-group">
                                <label>Manufacturer:</label>
                                <input type="text" class="form-control" name="Manufacturer" value="{{$network->Manufacturer}}" disabled>

                            </div>
                            <div class="form-group">
                                <label>Number Ports:</label>
                                <input type="number" class="form-control" name="number_ports" value="{{$network->number_ports}}" disabled>

                            </div>
                            <div class="form-group">
                                <label>Security Features:</label>
                                <input type="text" class="form-control" name="security_Features" value="{{$network->security_Features}}" disabled>

                            </div>
                            <div class="form-group">
                                <label>Management Interface:</label>
                                <input type="text" class="form-control" name="Management_Interface" value="{{$network->Management_Interface}}" disabled>

                            </div>
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input type="number" class="form-control" name="quantity" value="{{$network->quantity}}" disabled>

                            </div>
                            <div class="form-group">
                                <label>Guarantee (per month):</label>
                                <input type="number" class="form-control" name="guarantee" value="{{$network->guarantee}}" disabled>

                            </div>
                            <div class="form-group">
                                <label>Status:</label>
                                <select class="form-control" name="status" disabled>
                                    <option value="buying succeed" @if($network->status == 'buying succeed') selected @endif>Buying Succeed</option>
                                    <option value="available in stock" @if($network->status == 'available in stock') selected @endif>Available in Stock</option>
                                    <option value="its used" @if($network->status == 'its used') selected @endif>Used</option>
                                    <option value="in repair" @if($network->status == 'in repair') selected @endif>In Repair</option>
                                    <option value="not available" @if($network->status == 'not available') selected @endif>Not Available</option>
                                </select>

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
