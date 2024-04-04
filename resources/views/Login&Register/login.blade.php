<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleLogin.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="../img/logo_bolen.png" alt="Logo Bolen Jonegoroan">
        </div>
        <div class="col-md-8">
          <div class="containerForm">
            <form>
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password">
              </div>
            </form>
          </div>
          <div class="tombol1">
            <button type="submit" class="tombolSignIn">LOGIN</button>
          </div>
          <div class="login">
            <p>Apakah belum mempunyai akun? <a href="/signIn">Silahkan Sign In</a></p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
