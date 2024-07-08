<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'The Fare')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40 !important;
        }
        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
            font-size: 1.5em;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #f8c94d !important;
        }
        .navbar-toggler {
            border-color: #f8c94d !important;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%287, 7, 7, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        .container {
            margin-top: 20px;
        }
            /* Custom button styles */
    .btn-custom {
        background-color: #007bff; /* Custom blue color */
        border: none;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 25px;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #0056b3; /* Darker blue color */
        color: #fff;
    }

    .btn-custom-outline {
        border: 2px solid #007bff;
        color: #007bff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 25px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-custom-outline:hover {
        background-color: #007bff;
        color: #fff;
    }

    /* Custom card styles */
    .card-custom {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Custom heading styles */
    h1, h2 {
        color: #333;
        font-family: 'Helvetica Neue', sans-serif;
        font-weight: 300;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Custom list group styles */
    .list-group-item {
        border: none;
        padding: 15px 20px;
        background-color: #f8f9fa;
        margin-bottom: 10px;
        border-radius: 10px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('home') }}">The Fare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('promotions.index') }}">Promotions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">My cart</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('favorites.index') }}">Favorites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('addresses.index') }}">Addresses</a>
                    </li>
                    @can('viewAny', \App\Models\User::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
