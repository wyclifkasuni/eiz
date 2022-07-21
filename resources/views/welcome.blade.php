<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EIZ VMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <style>
        .card-img-top {
            width: auto;
            height: 30vw;
            object-fit: cover;
        }
    </style>
    <div class="container-fluid p-5">
        <div class="card card-outline card-success bg-success p-2 text-dark bg-opacity-10">
           <div class="card-header">
            <div class="row">
                <div class="col"><a href="#" class="navbar-brand">
                        <img src="{{ asset('images/footer_logo.png') }}" height="40" alt="CoolBrand">
                    </a></div>
                <div class="col">
                    <h3 class="text-center text-success text-bold"> EIZ Voting Management System</h3>
                </div>
            </div>
           </div>


            <div class="card-body">
                <div class="card" style="width: auto;">
                    <img src="{{ asset('assets/Lpage/images/vote.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="flex-fill flex-row-reverse row shadow-sm text-bg-danger text-center">

                            <div class="col">
                                <a class="btn btn-inverse-success btn-lg btn-outline-warning rounded-pill text-success"
                                    href="{{ route('register') }}">Register</a>
                            </div>
                            <div class="col">
                                <a class="btn btn-inverse-success btn-lg btn-outline-success rounded-pill"
                                    href="{{ route('login') }}">Login
                                </a>
                            </div>

                        </div>

                    </div>
                </div>



            </div>
</body>

</html>
