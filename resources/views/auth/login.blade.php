<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
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
            max-width: 400px;
        }
    </style>
</head>
<body>
  
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid ">
            <a class="navbar-brand " href="#">Informatic Engineer 22</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</nav>

<div class="container">
    <div class="card p-4 shadow">
        <h4 class="card-title text-center mb-4">Login</h4>
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Masuk</button>
                <a class="btn btn-secondary" href="/register">Daftar</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
