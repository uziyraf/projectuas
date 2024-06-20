<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Register</title>
    <style>
        body, html {
            height: 100%;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .card {
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>
<body>

<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Informatic Engineer 22</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</nav>

<div class="container">
    <div class="card p-4 shadow">
        <h4 class="card-title text-center mb-4">Register</h4>
        <form class="row g-3" method="POST" action="/register">
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>    
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>    
            @endif
            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="name" required>
            </div>
            <div class="col-md-6">
                <label for="inputNim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="inputNim" name="nim" required>
            </div>
            <div class="col-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
            </div>
            <div class="col-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="JL. / NO." name="address" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Sign up</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
