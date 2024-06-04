<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Register</title>
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

@if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
 @endif
<form class="row g-3" method="POST" action="/register">
  @csrf
  <div class="col-md-6">
    <label for="inputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="inputName" name="name">
  </div>
  <div class="col-md-6">
    <label for="inputNim" class="form-label">NIM</label>
    <input type="text" class="form-control" id="inputNim" name="nim">
  </div>
  <div class="col-12">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
  </div>
  <div class="col-12">
    <label for="inputPassword" class="form-label">Password</label>
    <input type="Password" class="form-control" id="inputPassword" placeholder="Password" name="password">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address </label>
    <input type="text" class="form-control" id="inputAddress" placeholder="JL. / NO." name="address">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
</body>
</html>