<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleSignIn.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="img/logo_bolen.png" alt="Logo Bolen Jonegoroan">
        </div>
        <div class="col-md-8">
          <div class="containerForm">
            <form method="POST">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password">
              </div>
              <div class="form-group">
                <label for="password">Konfirmasi Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Confirmation Password">
              </div>
            </form>
          </div>
          <div class="tombol1">
            <button type="submit" class="tombolSignIn">SIGN IN</button>
          </div>
          <div class="login">
            <p>Apakah sudah mempunyai akun? <a href="/login">Lanjutkan Login</a></p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
