
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
            <div class="col-3">
                <form action="{{route('see_kursavoys')}}" method="post">
                    @csrf
                        <div class="mb-3">
                            <select class="form-select form-select-sm" name="subgroup_id" aria-label=".form-select-sm example">
                                @if($status == 0)
                                    <option value="{{$subgroups->id}}">{{$subgroups->group_name}} - {{$subgroups->subject_name}}</option> 
                                @endif
                                @if($status == 1)
                                    <option selected >Open this select menu</option>
                                    @foreach ($subgroups as $val)
                                    <option value="{{$val->id}}">{{$val->group_name}} - {{$val->subject_name}}</option> 
                                    @endforeach
                                @endif
                            </select>
                        </div>
                            @if($status == 1)
                                <div class="mb-3">
                                    <button class="btn btn-success" type="submit">Select</button>
                                </div>
                            @endif
            </div>    
            <div class="col-3">
                @if (!empty($kursavoys))
                    <div class="mb-3">
                        <select class="form-select form-select-sm" name="kursavoy_id" aria-label=".form-select-sm example">
                            @if($kursavoy_status == 0)
                                <option value="{{$kursavoys->id}}">{{$kursavoys->tema}}</option> 
                            @endif
                            @if($kursavoy_status == 1)
                                <option selected >Open this select menu</option>
                                @foreach ($kursavoys as $val)
                                    <option value="{{$val->id}}">{{$val->tema}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                        @if($kursavoy_status == 1)
                            <div class="mb-3">
                                <button class="btn btn-success" type="submit">Select</button>
                            </div>
                        @endif
                @endif
            </div>
            @if(!empty($works))
                <div class="col-2"><a href="{{route('home')}}"><button class="btn btn-outline-success">Home</button></a></div>
            @endif
        </div>
            
                </form>
        @if(!empty($works))
            <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-8">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">№</th>
                        <th scope="col">Student Ati</th>
                        <th scope="col">File</th>
                        <th scope="col">Baxalaw</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($works as $val)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <form action="{{route('score')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$val->user_id}}">
                                    <input type="hidden" name="work_id" value="{{$val->id}}">
                                <td>{{$val->user_name}}</td>
                                <td><a href="../../../works/{{$val->file_name}}" target="_blank">{{$val->file_name}}</a></td>
                                <td>
                                    <div class="row mt-1">
                                        <div class="col-8">
                                        <select class="form-select form-select-sm" name="score" id="3" aria-label=".form-select-sm example">
                                            @if($val->score != NULL)
                                            <div class="mb-3">
                                            <option selected>{{$val->score}}</option>
                                            </div>
                                            @elseif($val->score == NULL)
                                            <option selected>Open this select menu</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            @endif
                                        </select>
                                        </div>
                                        @if($val->score == NULL)
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-success">Ok</button>
                                        </div>
                                        @endif
                                    </div>
                                </td>

                            </form>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
            </div>
        @endif
    </div>

</body>
</html>