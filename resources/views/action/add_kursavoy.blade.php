
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Kursavoy qosiw</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-1"></div>
            <div class="col-2 mb-2"><a href="{{route('home')}}"><h3 class="text-success">Kursavoy.app</a></h3></div>
            <div class="col-4"></div>
            <div class="col-2 mb-2"></div>
            <div class="col-2 mb-2"><a href="{{route('update_page')}}"><button class="btn btn-outline-success">{{Auth::user()->name}}</button></a></div>
            <div class="col-1"></div>
            <hr>
        </div>
        
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-4">
                <form action="{{route('subject_select')}}" method="post">
                    @csrf
                    @if(!empty($subgroups))
                        <div class="mb-3">
                            <select class="form-select form-select-sm" name="subgroup_id" aria-label=".form-select-sm example">
                                @if ($status==1)
                                <option value="{{$subgroups->id}}">{{$subgroups->group_name}} - {{$subgroups->subject_name}}</option> 
                                @endif
                                @if ($status==0)
                                    <option selected >Open this select menu</option>
                                    @foreach ($subgroups as $val)
                                    <option value="{{$val->id}}">{{$val->group_name}} - {{$val->subject_name}}</option> 
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @if ($status==0)
                            <div class="mb-3">
                                <button class="btn btn-success" type="submit">Select</button>
                            </div>
                        @endif
                    @endif
            </div>
            <div class="col-2"></div>
        </div>
        @if($status == 1)
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-7">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Temanin ati</label>
                    <input type="text" name="tema" class="form-control" id="exampleFormControlInput1" placeholder="kursavoydin temasin ati">
                  </div>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-3">
                <div class="mb-3">
                    <label for="2" class="form-label">Juwmaqlaniw waqti</label>
                    <input type="date" name="end_time" class="form-control" id="2">
                </div>
            </div>
            <div class="col-3">
                <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-outline-primary">QOSIW</button>
                </div>
            </div>
        </div>
        @endif
                </form>
    </div>

</body>
</html>