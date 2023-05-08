<?php
require_once 'session.php';
require_once 'fungsi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="data_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="data_template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
    body  {
        background-image: url("walpaper.jpg");
        background-size: cover;
        background-position: center;
    }
</style>
</head>
<body >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
              <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                      <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-gradient-info" style="background-image: url('office.jpg'); background-position: center;"></div>
                        <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login Now!</h1>
                        </div>
                        <form class="user" method="POST" action="proses_login.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-success btn-user">Login</button>
                            </div>
                        </form>
                        <hr>
                    <div class="text-center">
                        <a class="small" href="register.php">Tidak Punya Akun? Daftar ?</a>
                    </div>
                    </div>
                    </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

</body>
</html>
