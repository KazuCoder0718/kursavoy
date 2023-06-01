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
                <form action="{{route('login_store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Login</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>