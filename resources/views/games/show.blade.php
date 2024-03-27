<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Posts</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('boardGames.index') }}>Board Games</a>
        <div class="justify-end ">
            <div class="col ">
                <a class="btn btn-sm btn-success showForm" href="{{ route('boardGames.index') }}">Back to the games list</a>
            </div>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $boardGame->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $boardGame->created_by }}</p>
                    <p class="card-text">{{ $boardGame->created_year }}
                    <p class="card-text">{{ $boardGame->genre }}
                    <p class="card-text">{{ $boardGame->language }}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>