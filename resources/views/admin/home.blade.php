<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Kabinet</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-1"></div>
            <div class="col-2 mb-2"><a href="{{route('home')}}"><h3 class="text-success">Kursavoy.app</a></h3></div>
            <div class="col-2"></div>
            <div class="col-2 mb-2"><a href=""><button class="btn btn-outline-success">{{Auth::user()->name}}</button></a></div>
            <div class="col-2 mb-2"><a href="{{route('logout')}}"><button class="btn btn-success">Logout</button></a></div>
            <div class="col-1"></div>
            <hr>
        </div>
        
        <div class="row mt-3">
            <div class="col-3 mb-3">
                <div class="card" style="width: 12rem;">
                    <img src="add.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">User qosiw</h5>
                      <p class="card-text">Taza paydalaniwshi qosiw</p>
                      <a href="{{route('reg')}}" class="btn btn-primary">Add User</a>
                    </div>
                  </div>
            </div>
            <div class="col-3 mb-3">
              <div class="card" style="width: 12rem;">
                  <img src="add.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Sabaq beriw</h5>
                    <p class="card-text">Teacherga sabaq beriw</p>
                    <a href="{{route('set_page')}}" class="btn btn-primary">Set Lesson</a>
                  </div>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="card" style="width: 12rem;">
                    <img src="add.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Topar qosiw</h5>
                      <p class="card-text">Taza topar qosiw</p>
                      <a href="{{route('add_page', ['ne'=>'Topar'])}}" class="btn btn-primary">Add Group</a>
                    </div>
                  </div>
            </div>
            <div class="col-3 mb-3">
              <div class="card" style="width: 12rem;">
                  <img src="add.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Pan qosiw</h5>
                    <p class="card-text">Taza pan qosiw</p>
                    <a href="{{route('add_page', ['ne'=>'Pan'])}}" class="btn btn-primary">Add Subject</a>
                  </div>
                </div>
          </div>
            <div class="col-3 mb-3">
              <div class="card" style="width: 12rem;">
                  <img src="see.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Barligin koriw</h5>
                    <p class="card-text"></p>
                    <a href="{{route('see_page')}}" class="btn btn-primary">See All</a>
                  </div>
                </div>
          </div>
        </div>
    </div>

</body>
</html>