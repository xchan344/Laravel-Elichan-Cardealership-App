<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elichan Cardealership App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        h3 {
            color: white;
            font-size: 20px;
        }

        .active-link {
            background-color: rgb(25, 18, 55);
        }

        .dashboard-btn {
            width: 100%;
            text-align: left;
        }

        form.logout-button {
            width: 40%;
            margin-top: 30px;
        }

        .sidebar {
            background-color: rgb(35, 18, 75);
            height: 100vh;
            padding: 0;
            position: fixed;
        }

        .content {
            margin-left: 200px;
        }

        .center-align {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .dashboard-btn.btn-primary {
            background-color: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
        }

        .dashboard-btn.btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
        }

        .dashboard-btn.btn-success {
            background-color: #198754;
            color: #fff;
            border-color: #198754;
        }

        .dashboard-btn.btn-success:hover {
            background-color: #157347;
            border-color: #157347;
        }

        .dashboard-btn.btn-info {
            background-color: #0dcaf0;
            color: #fff;
            border-color: #0dcaf0;
        }

        .dashboard-btn.btn-info:hover {
            background-color: #0aa9c4;
            border-color: #0aa9c4;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <a href="{{ route('homepage.index') }}" style="text-decoration: none; color: inherit; display: block; text-align: center;">
                    <img src="logo.png" style="width: 70%; display: block; margin: 0 auto;">
                    <h3 class="text-center mt-4 mb-4">Elichan Cardealership App</h3>
                </a>
                <br>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('employees*') ? 'active-link' : '' }}" href="{{ route('employees.index') }}" style="font-family: 'Arial', sans-serif; color: white; text-align: center;">
                            <button class="btn dashboard-btn btn-primary">
                                <img src="employees.png" style="vertical-align: middle; margin-right: 5px;">
                                Employees
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('transactions*') ? 'active-link' : '' }}" href="{{ route('transactions.index') }}">
                            <button class="btn dashboard-btn btn-primary">
                                <img src="transactions.png" style="vertical-align: middle; margin-right: 5px;">
                                Transactions
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('cars*') ? 'active-link' : '' }}" href="{{ route('cars.index') }}">
                            <button class="btn dashboard-btn btn-primary">
                                <img src="cars.png" style="vertical-align: middle; margin-right: 5px;">
                                Cars
                            </button>
                        </a>
                    </li>
                </ul>
                <br>
                <div class="center-align">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger logout-button">Logout</button>
                    </form>
                </div>
                <div class="col-md-12">
                    <p class="text-center" style="padding-left: 8px; padding-right: 8px; color: white; position: absolute; bottom: 0;">
                        &copy; <script>
                            document.write(new Date().getFullYear())

                        </script>
                        <a href="https://github.com/xchan344" alt="github" style="font-size: small;" target="_blank">By: Christian Dela Gente</a>
                        <br>
                        <a href="https://github.com/NgtzBogz" alt="github" style="font-size: small;" target="_blank">and Elizalde Ulson</a>
                    </p>
                </div>

            </div>
            <div class="col-md-10 content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <h2>@yield('title')</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
