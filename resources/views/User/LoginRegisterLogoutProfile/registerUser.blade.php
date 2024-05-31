<!DOCTYPE html>
<html>
  <head>
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleRegister.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="img/logo_bolen.png" alt="Logo Bolen Jonegoroan">
        </div>
        <div class="col-md-8">
            <form action="{{ route('register-proses') }}" method="post">
                @csrf
                <div class="containerForm">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="{{ old('username') }}">
                        @error('username')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="{{ old('address') }}">
                        @error('address')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor">Number Phone:</label>
                        <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Enter Number Phone" value="{{ old('nomor') }}" maxlength="15" onkeypress="return isNumberKey(event)" required>
                        @error('nomor')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password:</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Confirmation Password">
                        @error('password_confirmation')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="tombol1">
                    <button type="submit" class="tombolSignIn">SIGN IN</button>
                </div>
                <div class="login">
                    <p>Apakah sudah mempunyai akun? <a href="/loginUser">Lanjutkan Login</a></p>
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

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
