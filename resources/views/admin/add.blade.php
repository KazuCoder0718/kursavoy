<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-1"></div>
            <div class="col-2 mb-2"><a href="{{route('home')}}"><h3 class="text-success">Kursavoy.app</a></h3></div>
            <div class="col-6"></div>
            <div class="col-2 mb-2"></div>
            <div class="col-1"></div>
            <hr>
        </div>
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="{{route('add')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">{{$ne}} Qosiw</label>
                        <input type="hidden" name="ne" value="{{$ne}}">
                    </div>
                    @if($ne == 'Pan')
                    <div class="mb-3">
                        <label for="3" class="form-label">Qaysi gruppa ushin</label>
                        <select class="form-select form-select-sm" name="group_id" id="3" aria-label=".form-select-sm example">
                            <option selected>Open this select menu</option>
                            @foreach ($groups as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                        <button type="submit" class="btn btn-primary">Qosiw</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>