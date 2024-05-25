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
                        <h4>edit laptop</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-groupe mb-3" method="POST" action="{{ route('laptop.update',$laptop->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label> laptop Name:</label>
                                <input type="text" class="form-control" name="laptop_name" value="{{$laptop->laptop_name}}">
                                @error('laptop_name')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>model:</label>
                                <input type="text" class="form-control" name="model" value="{{$laptop->model}}">
                                @error('model')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >processor:</label>
                                <input type="text" class="form-control" name="processor" value="{{$laptop->processor}}">
                                @error('processor')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >ram:</label>
                                <input type="text" class="form-control" name="ram" value="{{$laptop->ram}}">
                                @error('ram')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >storage:</label>
                                <input type="text" class="form-control" name="storage" value="{{$laptop->storage}}">
                                @error('storage')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >screen size:</label>
                                <input type="text" class="form-control" name="screen_size"value="{{$laptop->screen_size}}" >
                                @error('screen_size')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >graphics card:</label>
                                <input type="text" class="form-control" name="graphics_card" value="{{$laptop->graphics_card}}">
                                @error('graphics_card')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >battery life:</label>
                                <input type="text" class="form-control" name="battery_life"  value="{{$laptop->battery_life}}">
                                @error('battery_life')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Quantity:</label>
                                <input type="number" class="form-control" name="quantity" value="{{$laptop->quantity}}">
                                @error('quantity')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >guarantee(par mois):</label>
                                <input type="number" class="form-control" name="guarantee" value="{{$laptop->guarantee}}">
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
                                    <option value="buying succeed" @if($laptop->status == 'buying succeed') selected @endif>buying succeed</option>
                                    <option value="available in stock" @if($laptop->status== 'available in stock') selected @endif>available in stock</option>
                                    <option value="its used" @if($laptop->status == 'its used') selected @endif>its used</option>
                                    <option value="in repair" @if($laptop->status == 'in repair') selected @endif>in repair</option>
                                    <option value="not available" @if($laptop->status == 'not available') selected @endif>not available</option>
                                </select>

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
