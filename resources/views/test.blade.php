<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/Lpage/css/style.css') }}" media="screen" />
    <script type="text/javascript" src="{{ asset('assets/Lpage/js/cufon-yui.js') }}"></script>
    <script src="{{ asset('assets/Lpage/js/GeosansLight_500.font.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        Cufon.replace('.logo', {
            fontFamily: 'GeosansLight'
        });
        Cufon.replace('h1', {
            fontFamily: 'GeosansLight'
        });
        Cufon.replace('h2', {
            fontFamily: 'GeosansLight'
        });
        Cufon.replace('h3', {
            fontFamily: 'GeosansLight'
        });
    </script>
</head>

<body>



    <!-- START PAGE SOURCE -->
    <div id="main_container">
        <div class="header">
            <div class="logo"><a href="#">Voting Management System</a></div>
        </div>
        <div class="home_center">
            <div class="pack_descr">
                <h1>Welcome to Our Voting & Voter Management System.</h1>
                <p class="home_intro"> One of the most important rights of Our citizens is the
                    franchise—the right to
                    vote.
                    Its Constitutinal, You Have The Right! And, Your Turn helps you Make the Best Decision..
                    <strong>Yes</strong>, it gives you the choice to vote for your local and national representatives,
                    if you
                    don’t
                    vote, other people get to choose who represents you.....
                </p>
                <hr>
                <div class="flex-fill row">
                    <div class="col">
                        <a class="btn-inverse-warning btn-lg rounded-pill text-lg-center text-success"
                        href="{{ route('register') }}">Register</a>
                    </div>
                    <div class="col">
                        <a
                        class="btn-inverse-success btn-lg rounded-pill text-lg-center text-success" href="{{ route('login') }}">Login
                    </a>
                    </div>
                   
                </div>
                
                <hr>
            </div>
            <div class="pack_pic"> <img src="{{ asset('assets/Lpage/images/vote.png') }}" alt=""
                    border="0" /> </div>
        </div>
        <div id="footer">
            <p class="lf">Copyright &copy; {{ date('Y') }} <a href="#">VMS</a> - All Rights Reserved</p>
            <p class="rf">Design by <a href="">Marcus</a></p>
            <div class="clear"></div>
        </div>
    </div>
    <!-- END PAGE SOURCE -->
</body>

</html>
