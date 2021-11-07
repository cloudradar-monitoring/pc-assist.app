<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>PC Assist - Open Source Remote PC Assistance</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
</head>
<body>
<div class="container-sm">
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/help">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/cloudradar-monitoring/pc-assist.app">Source <i
                                    class="fab fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
        <!-- Jumbotron -->
        <div class="p-5 text-center bg-light">
            <h1 class="mb-3">PC Assist</h1>
            <h4 class="mb-3">Open-Source Remote PC-Assistance</h4>
        </div>
        <!-- Jumbotron -->
    </header>
    <section class="border p-4 mb-4">
        {{ $slot }}
    </section>
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-dark" href="https://rport.io/en/imprint">cloudradar GmbH</a>
        </div>
        <!-- Copyright -->
    </footer>
</div>
</body>
</html>
