<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
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
            <form action="{{ route('login-proses') }}" method="post">
                @csrf
                <div class="containerForm">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                        @error('username')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" for="showPassword">Show Password</label>
                    </div>
                </div>
                <div class="tombol1">
                    <button type="submit" class="tombolLogin">LOGIN</button>
                </div>
                <div class="login">
                    <p>Apakah belum mempunyai akun? <a href="/register">Silahkan Sign In</a></p>
                </div>
            </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('failed'))
         <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif

    @if ($message = Session::get('success'))
         <script>
            Swal.fire('{{ $message }}');
        </script>
    @endif

    <script>
      document.getElementById('showPassword').addEventListener('change', function() {
          var passwordField = document.getElementById('password');
          if (this.checked) {
              passwordField.type = 'text';
          } else {
              passwordField.type = 'password';
          }
      });
    </script>
  </body>
</html>
