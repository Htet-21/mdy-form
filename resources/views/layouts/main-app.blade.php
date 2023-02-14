<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mandalay</title>
    <link rel="icon" href="{{ asset('images/paing-logo.jpg') }}" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=pyidaungsu' />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</head>

<body>
    <header class>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md4">
                        <a class="brand-logo" href="{{ url('/') }}">
                            <img src="{{ asset('images/paing-logo.jpg') }}" alt="Dinger Logo">
                        </a>
                    </div>
                    <div class="hider">
                        <div class="row">
                            <p id="nav"><a href="#top-section">Home</a></p>
                            <p id="nav"><a href="#mid-section">About</a></p>
                            <p id="nav"><a href="#bot-section">Register</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>

    <footer>
        <div class="col-md12">
            <div class="container">
                <div class="row">
                    <div class="footer-content">
                        <img src="{{ asset('images/paing-logo.jpg') }}" alt="Dinger Logo">
                    </div>
                </div>
                <div class="footer-content2">
                    <div class="row">
                        <p id="nav"><a href="#top-section">Home</a></p>
                        <p id="nav"><a href="#mid-section">About</a></p>
                        <p id="nav"><a href="#bot-section">Register</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="footer-content">
                        <a href="https://www.facebook.com/dingerfintech"><img id="facebook" src="{{ asset('images/facebook.png') }}"></a>
                        <a href="https://www.linkedin.com/company/dinger/mycompany/"><img id="linked" src="{{ asset('images/linkedin.png') }}"></a>
                        <a href="https://dinger.asia/"><img id="web" src="{{ asset('images/website.png') }}"></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="container-footer">
        <div class="container">
            <div class="row">
                <div class="footer-block">
                    <p id="address">No.647, 21st Street, Hotel Chinatown, Latha, Yangon.</p>
                </div>
            </div> </div>


    </footer>

</body>

</html>