<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleProfile.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h1 style="font-size: 60px">Hi, {{ $user->name }}</h1>
                <p style="font-size: 20px">Welcome to your profile page.</p>
            </div>
            <div class="col-4 contentProfile">
                <div>
                    <span>Name :</span>
                    <p style="margin-top: 5px" class="profileData">{{ $user->name }}</p>
                </div>
                <div>
                    <span>Number Phone :</span>
                    <p style="margin-top: 5px" class="profileData">{{ $user->number }}</p>
                </div>
                <div>
                    <span>Address :</span>
                    <p style="margin-top: 5px" class="profileData">{{ $user->alamat }}</p>
                </div>
                <div>
                    <span>Email :</span>
                    <p style="margin-top: 5px" class="profileData">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <div class="modal" id="editProfileModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form id="editProfileForm" method="POST" action="{{ route('profile-update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Name:</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor">Number Phonel:</label>
                                <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $user->number }}" maxlength="15" onkeypress="return isNumberKey(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->alamat }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <form id="logoutForm" action="{{ route('logout') }}">
            <button type="button" class="btn btn-primary tombolEdit" id="editProfileBtn" style="font-size: 20px">Edit Profile</button>
            @csrf
            <button type="submit" class="btn btn-danger tombolLogout" style="font-size: 20px">Logout</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $("#editProfileBtn").click(function(){
                $("#editProfileModal").modal('show');
            });
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
@if ($message = Session::get('success'))
     <script>
        Swal.fire('{{ $message }}');
    </script>
@endif

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
