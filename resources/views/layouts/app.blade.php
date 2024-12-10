<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Your custom CSS file for additional styles -->
</head>

<body>
    <div class="d-flex">
        
        <div class="sidebar bg-dark text-white p-3" id="sidebar">
            <h3 class="text-center mb-4">MyApp</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Personal Information</a>
                </li>
                
            </ul>
        </div>

       
        <div class="content-area flex-grow-1 p-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Welcome, User</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

   
    <footer class="text-center py-3 bg-dark text-white mt-auto">
        <p>&copy; {{ date('Y') }} MyApp. All rights reserved.</p>
    </footer>

   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
