<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wishlist App')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        /* Background Gradient and Body Setup */
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(-45deg, #ffd1dc, #ffe4e1, #ffc0cb, #ffe4e1);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
        }

        html, body {
            height: 100%; 
            overflow-y: auto;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.2s ease;
            height: auto;
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Style for the Falling Stars Effect */
        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            animation: star-fall 1.5s infinite linear;
            z-index: -1;
        }

        @keyframes star-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(180deg);
                opacity: 0;
            }
        }

        /* Falling stars in different positions */
        .star:nth-child(1) { left: 5%; animation-delay: 0s; animation-duration: 3s; }
        .star:nth-child(2) { left: 10%; animation-delay: 0.5s; animation-duration: 4s; }
        .star:nth-child(3) { left: 15%; animation-delay: 1s; animation-duration: 2.5s; }
        .star:nth-child(4) { left: 20%; animation-delay: 0s; animation-duration: 3.5s; }
        .star:nth-child(5) { left: 25%; animation-delay: 2s; animation-duration: 4.2s; }
        .star:nth-child(6) { left: 30%; animation-delay: 0.3s; animation-duration: 3s; }
        .star:nth-child(7) { left: 35%; animation-delay: 1s; animation-duration: 3s; }
        .star:nth-child(8) { left: 40%; animation-delay: 0.8s; animation-duration: 2.8s; }
        .star:nth-child(9) { left: 45%; animation-delay: 2.5s; animation-duration: 3.5s; }
        .star:nth-child(10) { left: 50%; animation-delay: 1.5s; animation-duration: 4.1s; }
        .star:nth-child(11) { left: 55%; animation-delay: 0s; animation-duration: 3.2s; }
        .star:nth-child(12) { left: 60%; animation-delay: 3s; animation-duration: 2.7s; }
        .star:nth-child(13) { left: 65%; animation-delay: 0.4s; animation-duration: 4.5s; }
        .star:nth-child(14) { left: 70%; animation-delay: 1.2s; animation-duration: 3s; }
        .star:nth-child(15) { left: 75%; animation-delay: 0.7s; animation-duration: 3.3s; }
        .star:nth-child(16) { left: 80%; animation-delay: 2s; animation-duration: 2.6s; }
        .star:nth-child(17) { left: 85%; animation-delay: 0.6s; animation-duration: 4.3s; }
        .star:nth-child(18) { left: 90%; animation-delay: 3.2s; animation-duration: 3.1s; }
        .star:nth-child(19) { left: 95%; animation-delay: 1.8s; animation-duration: 3.8s; }
        .star:nth-child(20) { left: 100%; animation-delay: 2.4s; animation-duration: 4s; }

        /* Card Styling */
        .card-custom {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 30px;
            animation: fadeIn 1.2s ease;
        }

        .btn-primary, .btn-danger {
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn-primary:hover, .btn-danger:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <!-- Falling Stars Effect -->
    <div class="star" style="top: 5%;"></div>
    <div class="star" style="top: 10%;"></div>
    <div class="star" style="top: 15%;"></div>
    <div class="star" style="top: 20%;"></div>
    <div class="star" style="top: 25%;"></div>
    <div class="star" style="top: 30%;"></div>
    <div class="star" style="top: 35%;"></div>
    <div class="star" style="top: 40%;"></div>
    <div class="star" style="top: 45%;"></div>
    <div class="star" style="top: 50%;"></div>
    <div class="star" style="top: 55%;"></div>
    <div class="star" style="top: 60%;"></div>
    <div class="star" style="top: 65%;"></div>
    <div class="star" style="top: 70%;"></div>
    <div class="star" style="top: 75%;"></div>
    <div class="star" style="top: 80%;"></div>
    <div class="star" style="top: 85%;"></div>
    <div class="star" style="top: 90%;"></div>
    <div class="star" style="top: 95%;"></div>
    <div class="star" style="top: 100%;"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">WishU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wishlist-items.index') }}">Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wishlist-categories.index') }}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
