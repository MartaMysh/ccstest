<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Board Games</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('boardGames.index') }}>Board Games</a>
        <div class="justify-center">
            <div class="col ">
                <a class="btn btn-sm btn-success" href="{{ route('sales.index') }}">To sales list</a>
            </div>
        </div>
        <div class="justify-end ">
            <div class="col ">
                <span class="btn btn-sm btn-success showForm">Add new game</span>
                <span class="btn btn-sm btn-danger hideForm" style="visibility: hidden">Not now</span>
            </div>
        </div>
    </div>
</nav>
<div class="container mt-5">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($messages = Session::get('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($messages as $message)
                @foreach ($message as $messageInfo)
                    <strong>{{ $messageInfo }}</strong>
                @endforeach
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container h-100 mt-5 createForm" style="visibility: hidden">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add a Post</h3>
                <form action="{{ route('boardGames.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Game name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="created_by">Produced by</label>
                        <input type="text" class="form-control" id="created_by" name="created_by" required>
                    </div>
                    <div class="form-group">
                        <label for="created_year">Year of production</label>
                        <input type="text" class="form-control" id="created_year" name="created_year" required>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre of game</label>
                        <input type="text" class="form-control" id="genre" name="genre" required>
                    </div>
                    <div class="form-group">
                        <label for="language">Game language</label>
                        <input type="text" class="form-control" id="language" name="language" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Game</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($games as $game)
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <a class="navbar-brand h5" href="{{ route('boardGames.show', $game->id) }}">{{ $game->name }}</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $game->created_by }}</p>
                        <p class="card-text">{{ $game->created_year }}
                        <p class="card-text">{{ $game->genre }}
                        <p class="card-text">{{ $game->language }}
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm">
                                <form action="{{ route('boardGames.destroy', $game->id) }}" method="post">
                                    <input name="_token" value={{ csrf_token() }} type="hidden">
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="footer">
    {{ $games->links() }}
</div>
</body>
<script>
    $('.showForm').on('click', function () {
        $('.createForm, .hideForm').css('visibility', 'visible');
        $('.showForm').css('visibility', 'hidden');
    });
    $('.hideForm').on('click', function () {
        $('.createForm, .hideForm').css('visibility', 'hidden');
        $('.showForm').css('visibility', 'visible');
    });
</script>
</html>