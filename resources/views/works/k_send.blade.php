
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
            <div class="col-1"></div>
            <div class="col-10">
                <div class="row mt-3 mb-3">
                    <div class="col-5 mt-3 mb-3">
                        <div class="row mt-2 mb-2 border border-primary">
                            <div class="col-12 mt-3 mb-3"><h4 class="text text-bold">Kursavoy temasi: {{$kursavoy->tema}}</h4></div>
                            <div class="col-12 mt-3 mb-3"><h5 class="text text-bold text-success">Juwmaqlaniw wati: {{$kursavoy->end_time}}</h5></div>
                        </div>
                    </div>
                    <div class="col-5 mt-3 mb-3">
                        <form action="{{route('juklew')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="k_id" value="{{$kursavoy->id}}">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Kursavoydi doc, docx, ppt, pptx formatta juklen'</label>
                                <input class="form-control" type="file" name="file" id="formFile">
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Fayl juklen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

</body>
</html>