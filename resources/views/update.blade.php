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
            <div class="col-2 mb-2"><h3 class="mb-2">{{Auth::user()->name}}</h3></div>
            <div class="col-1"></div>
            <hr>
        </div>
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="{{route('update')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="mb-2"><h4>Email ozgertiw ushin</h4></label>
                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" id="email">
                    </div>

                    <button type="submit" name="e_update" value="1" class="btn btn-success">Email Update</button>
                   <br>
                   <hr>
                   <br>
                    <div class="mb-3">
                        <label for="pas1" class="mb-2"><h4>Password ozgertiw ushin</h4></label>
                        <input type="password" name="password" class="form-control" placeholder="Aldingi paroldi jazin" name="old_password" id="pas1">
                    </div>
                    <hr>
                    <div class="mb-3 mt-3">
                        <input type="password" name="new_password" class="form-control" placeholder="Taza paroldi jazin" name="password" id="pas2">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="renew_password" class="form-control" placeholder="Taza paroldi jane jazin" name="re_password" id="pas2">
                    </div>
                   
                        <button type="submit"  name="p_update"  value="1" class="btn btn-primary">Password Update</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>