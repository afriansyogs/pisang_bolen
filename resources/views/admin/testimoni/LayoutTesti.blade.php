<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| PISANG BOLEN |</title>

    <!-- link bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- link font awasome -->
    <script src="https://kit.fontawesome.com/f9189b0d8d.js" crossorigin="anonymous"></script>

    <!-- link css  -->
    <link rel="stylesheet" href="{{ asset('/assets/css/sidebar.css') }}">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- DATA TABLES -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">

    <!-- DATA TABLES RESPONSIVE -->
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css">

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>


</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle_btn" type="button">
                    <i class="fa-solid fa-house-chimney"></i>
                </button>
                <div class="sidebar_logo">
                    <a href="#">Admin Bolen</a>
                </div>
            </div>
            <ul class="sidebar_nav">
                <li class="sidebar_item {{ \Route::is('dasbhoard_admin.index') ? 'active' : '' }}">
                    <a href="{{ route('dasbhoard_admin.index') }}" class="sidebar_link">
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar_item {{ \Route::is('adminTesti.admin') ? 'active' : '' }}">
                    <a href="{{ route('adminTesti.admin') }}" class="sidebar_link">
                        {{-- <i class="fa-solid fa-user"></i> --}}
                        <i class="fa-solid fa-envelope"></i>
                        <span>Task</span>
                    </a>
                </li>
                <li class="sidebar_item {{ \Route::is('Admin.admin', 'Admin.create', 'Admin.edit', 'Admin.hapus', 'Admin.history') ? 'active' : '' }}">
                    <a href="{{ route('Admin.admin') }}" class="sidebar_link">
                        <i class="fa-solid fa-utensils"></i>
                        <span>Product</span>
                    </a>
                </li>
                <li class="sidebar_item">
                    <a href="#" class="sidebar_link">
                        {{-- <i class="fa-solid fa-user"></i> --}}
                        <i class="fa-solid fa-bell"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar_item">
                    <a href="#" class="sidebar_link">
                        {{-- <i class="fa-solid fa-user"></i> --}}
                        <i class="bi bi-gear-fill"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar_link">
                    {{-- <i class="fa-solid fa-user"></i> --}}
                    <i class="bi bi-person-fill-slash"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="main p-3">
            @yield('content')
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>


</body>

</html>
