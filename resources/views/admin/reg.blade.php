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
                <form action="{{route('register')}}" method="post">
                    @csrf
                    @if($reg_status != 0)
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{$role}} name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail21" class="form-label">email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail21" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    @endif
                    @if($reg_status != 0)
                        @if($role == 'teacher')
                            <div class="mb-3">
                                <label for="3" class="form-label">Qaysi gruppa qaysi pannen sabaq beriwin saylan</label>
                                <select class="form-select form-select-sm" name="subgroup_id" id="3" aria-label=".form-select-sm example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($subgroups as $val)
                                    <option value="{{$val->id}}">{{$groups[$val->group_id-1]->name}} - {{$subjects[$val->subject_id-1]->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @elseif($role == 'student')
                            <div class="mb-3">
                                <label for="3" class="form-label">Gruppa saylan</label>
                                <select class="form-select form-select-sm" name="group_id" id="3" aria-label=".form-select-sm example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($groups as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    @endif
                    <div class="mb-3">
                        @if($reg_status == 0)
                        <label for="3" class="form-label">role saylan</label>
                        @endif
                        <select class="form-select form-select-sm" name="role" id="3" aria-label=".form-select-sm example">
                            @if($reg_status == 1)
                            <option value="{{$role}}">{{$role}}</option>
                            @elseif($reg_status == 0)
                            <option selected>Open this select menu</option>
                            <option value="teacher">teacher</option>
                            <option value="student">student</option>
                            @endif
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>