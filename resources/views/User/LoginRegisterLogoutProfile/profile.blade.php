<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Hi, {{ $user->name }}</h1>
        <p>Welcome to your profile page.</p>
        <div class="col-md-8">
            <div>
                <span>Name :</span>
                <p style="margin-top: -5px">{{ $user->name }}</p>
            </div>
            <div>
                <span>Address :</span>
                <p style="margin-top: -5px">{{ $user->alamat }}</p>
            </div>
            <div>
                <span>Email :</span>
                <p style="margin-top: -5px">{{ $user->email }}</p>
            </div>
        </div>

        <button type="button" class="btn btn-primary" id="editProfileBtn">Edit Profile</button>

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
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
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
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Logout</button>
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
</body>
</html>
