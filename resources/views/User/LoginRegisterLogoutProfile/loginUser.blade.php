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
  </body>
</html>
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
