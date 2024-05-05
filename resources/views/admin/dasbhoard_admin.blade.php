<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- link bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link font awasome -->
    <script src="https://kit.fontawesome.com/f9189b0d8d.js" crossorigin="anonymous"></script>
    <!-- link css  -->
    <link rel="stylesheet" href="{{ asset('/assets/css/sidebar.css') }}">


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
                <li class="sidebar_item {{ \Route::is('adminTesti.index') ? 'active' : '' }}">
                    <a href="{{ route('adminTesti.index') }}" class="sidebar_link">
                        <i class="fa-solid fa-user"></i>
                        <span>Task</span>
                    </a>
                </li>
                <li class="sidebar_item">
                    <a href="#" class="sidebar_link">
                        <i class="fa-solid fa-user"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar_item">
                    <a href="#" class="sidebar_link">
                        <i class="fa-solid fa-user"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar_link">
                    <i class="fa-solid fa-user"></i>
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