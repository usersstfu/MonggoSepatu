<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Bootstrap 5 Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
   
     <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
    <form method="POST" action="login.php" class="needs-validation" novalidate="" autocomplete="off">
    <div class="mb-3">
    <label class="mb-2 text-muted" for="email">Username</label>
    <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
    </div>

    <div class="mb-3">
    <div class="mb-2 w-100">
    <label class="text-muted" for="password">Password</label>
    </div>
     <input id="password" type="password" class="form-control" name="password" required>
     <div class="invalid-feedback">
     Password is required
    </div>
    </div>
    <div class="d-flex align-items-center">
     <button type="submit" name="submit" class="btn btn-dark ms-auto">
         Login
     </button>
     </div>
    </form>
    </div>
     </div>
    </div>
    </div>
    </div>
    </section>

</body>

</html>