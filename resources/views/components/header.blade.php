<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        .btn-danger,
        .bg-danger {
            background-color: #ef3b2d !important;
        }

        .dashboard-card:hover {
            background-color: #ef3b2d;
            color: #fff;
            transition: all 0.3s ease-in;
        }

        .nav-link:hover {
            color: #ef3b2d !important;
        }

        .no-edit:hover {
            cursor: no-drop;
        }
    </style>
</head>

<body style="margin-bottom: 100px;">
    <!-- navbar start here -->
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg  p-0">
                <div class="container-fluid p-0">
                    <a class="navbar-brand pt-0" href="/"><img src="{{ asset('images/logo.png') }}" alt="LMS"
                            width="100" height="100"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse pe-5" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            @auth
                            @if (auth()->user()->role_name == 'employee')
                            <a class="nav-link fs-6 fw-bolder  {{ (Route::currentRouteName() == 'leave.create') ? 'text-danger' : 'text-black' }}"
                                href="{{ Route('leave.create') }}">Applay Leave</a>
                            <a class="nav-link fs-6 fw-bolder  {{ (Route::currentRouteName() == 'leave.index') ? 'text-danger' : 'text-black' }}"
                                href="{{ Route('leave.index') }}">Manage Leaves</a>
                            @endif
                            @if (auth()->user()->role_name == 'admin')
                            <a class="nav-link fs-6 fw-bolder {{ (Route::currentRouteName() == 'register') ? 'text-danger' : 'text-black'}}"
                                href="{{ Route('register') }}">New Employee</a>
                                <a class="nav-link fs-6 fw-bolder {{ (Route::currentRouteName() == 'mangemps.index') ? 'text-danger' : 'text-black'}}"
                                href="{{ Route('mangemps.index') }}">Manage Employee</a>
                            @endif
                            <form action="/logout" class="inline" method="POST">
                                @csrf
                                <button type="submit" class="btn mt-1">
                                    <i class="fas fa-power-off"></i>
                                    Logout
                                </button>
                            </form>
                            @else
                            <a class="nav-link  text-black fs-5 text-danger" href="{{ Route('login') }}"><i
                                    class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- navbar end -->
</body>
</html>