@auth

@if (Auth::user()->role == 'student')

{{-- Studentler ushin bolim --}}

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
            <div class="col-2"></div>
            <div class="col-2 mb-2"><a href="{{route('update_page')}}"><button class="btn btn-outline-success">{{Auth::user()->name}}</button></a></div>
            <div class="col-2 mb-2"><a href="{{route('logout')}}"><button class="btn btn-success">Logout</button></a></div>
            <div class="col-1"></div>
            <hr>
        </div>
        
        <div class="row mt-3">
            <div class="col-1"></div>
            <div class="col-3">
                <div class="card" style="width: 12rem;">
                    <img src="add.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Kursavoy tapsiriw</h5>
                      <p class="card-text"></p>
                      <a href="{{route('send')}}" class="btn btn-primary">Tapsiriw</a>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 12rem;">
                    <img src="see.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Baxalardi koriw</h5>
                      <p class="card-text"></p>
                      <a href="{{route('see_score')}}" class="btn btn-primary">Koriw</a>
                    </div>
                  </div>
            </div>
            <div class="col-3"></div>
            <div class="col-1"></div>
        </div>
    </div>

</body>
</html>

@elseif(Auth::user()->role == 'teacher')

{{-- Teacherlar ushin bolim --}}

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
            <div class="col-4"></div>
            <div class="col-2 mb-2"><a href="{{route('update_page')}}"><button class="btn btn-outline-success">{{Auth::user()->name}}</button></a></div>
            <div class="col-2 mb-2"><a href="{{route('logout')}}"><button class="btn btn-success">Logout</button></a></div>
            <div class="col-1"></div>
            <hr>
        </div>
        
        <div class="row mt-3">
            <div class="col-1"></div>
            <div class="col-3">
                <div class="card" style="width: 12rem;">
                    <img src="add.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Taza <br>   kursavoy <br> qosiw</h5>
                      <p class="card-text"></p>
                      <a href="{{route('add_kursavoy')}}" class="btn btn-primary">Kursavoy Qosiw</a>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 12rem;">
                    <img src="see.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Tapsirilgan kursavoylardi koriw</h5>
                      <p class="card-text"></p>
                      <a href="{{route('see')}}" class="btn btn-primary">Koriw</a>
                    </div>
                  </div>
            </div>
            <div class="col-3"></div>
            <div class="col-1"></div>
        </div>
    </div>

</body>
</html>
@elseif(Auth::user()->role == 'admin')
{{
  redirect()->route('admin_home')->send()
}}
@endif

@else
{{-- Welcome page --}}
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
            <div class="col-2 mb-2"><a href="{{route('login_page')}}"><button class="btn btn-success">Login</button></div></a>
            <div class="col-1"></div>
            
            <hr>
        </div>
        <div class="row mt-3">
            <h2 class="text-center">Kursavoy.app about</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid sint vero recusandae, inventore rerum accusantium pariatur quis. Libero, amet. Animi doloribus adipisci vero, quisquam ut dolorum praesentium? Ut, odio placeat.
            Deserunt in veritatis doloribus perferendis odio blanditiis fugiat ipsam reprehenderit facere, consectetur natus? Qui libero sint veniam? Possimus, ducimus minus? Placeat, facilis necessitatibus unde quibusdam enim eveniet accusamus amet vero?
            Molestiae natus delectus iusto voluptate repellat? Consequuntur perferendis earum dolor sint qui molestias error optio dignissimos dicta excepturi ipsam consectetur, esse saepe voluptate assumenda quam natus. Dolores ratione eveniet cumque.
            Voluptatum, sint? Incidunt numquam eum rerum maiores dignissimos explicabo accusamus odit nesciunt vel aliquam facere suscipit praesentium modi, iusto molestias quia. Minima, veritatis accusamus magnam atque facere tenetur excepturi iste?
            Quia inventore eligendi expedita ipsa distinctio magnam pariatur ipsum delectus iste praesentium, facere ratione dolore laborum voluptate repellendus molestias unde quod asperiores ad eveniet neque. Odit libero excepturi culpa sunt.
            Sequi beatae enim quam rerum. Et praesentium rerum magnam facere eum odit dolores aspernatur voluptates, impedit eos minus voluptas eveniet quia hic ipsam? Blanditiis in, ab maiores necessitatibus aliquid aliquam!
            Alias magnam aspernatur necessitatibus fugiat eaque quaerat aut totam facere, amet sapiente vitae quos, eligendi accusamus eos vel sit cupiditate facilis eum! Provident qui et officiis sequi eaque, eos libero.</p>
        </div>
    </div>
</body>
</html>

@endauth