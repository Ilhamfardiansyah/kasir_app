<!DOCTYPE html>
<html lang="en">

<head>
    <title>Baksa Warehouse</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="#"><img class="logo-icon me-2"
                                src="{{ asset('img/logo.png') }}" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-4">Sign up to </h2>

                    <div class="auth-form-container text-start mx-auto">
                        <form class="auth-form auth-signup-form" method="POST" action="{{ route('register') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="name mb-3">
                                <label class="sr-only" for="name">Your Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                    placeholder="Nama Lengkap" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="nik mb-3">
                                <label class="sr-only" for="nik"></label>
                                <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                                    name="nik" value="{{ old('nik') }}" required autocomplete="nik"
                                    placeholder="NIK Karyawan">

                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email"></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="image mb-3">
                                <label class="sr-only" for="image" id="image"></label>
                                <input type="file" name="image"
                                    class="form-control @error('image') 'is-invalid' @enderror" id="image"
                                    value="{{ old('image') }}" required autocomplete="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="level mb-3">
                                <label class="level" for="level"></label>
                                <select name="level" id="" class="form-select" aria-label="Default select example">
                                    <option value="#" hidden selected>--Pilih Level--</option>
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="sr-only" for="password"></label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="signup-password">Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password">
                            </div>
                            <div class="extra mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                    <label class="form-check-label" for="RememberPassword">
                                        I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and
                                        <a href="#" class="app-link">Privacy Policy</a>.
                                    </label>
                                </div>
                            </div>
                            <!--//extra-->

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                    Up</button>
                            </div>
                        </form>
                        <!--//auth-form-->

                        <div class="auth-option text-center pt-5">Already have an account? <a class="text-link"
                                href="login.html">Log in</a></div>
                    </div>
                    <!--//auth-form-container-->



                </div>
                <!--//auth-body-->

                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                        <small class="copyright">Designed with <i class="fas fa-heart"
                                style="color: #fb866a;"></i> by <a class="app-link"
                                href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for
                            developers</small>

                    </div>
                </footer>
                <!--//app-auth-footer-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->
        <script type="text/javascript">
            window.onload = setInterval(clock, 1000);

            function clock() {
                var d = new Date();

                var date = d.getDate();

                var month = d.getMonth();
                var montharr = ["Jan", "Feb", "Mar", "April", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
                month = montharr[month];

                var year = d.getFullYear();

                var day = d.getDay();
                var dayarr = ["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"];
                day = dayarr[day];

                var hour = d.getHours();
                var min = d.getMinutes();
                var sec = d.getSeconds();

                document.getElementById("date").innerHTML = day + " " + date + " " + month + " " + year;
                document.getElementById("time").innerHTML = hour + ":" + min + ":" + sec;
            }
        </script>
        <style>
            #date {
                margin-top: 70px;
                color: silver;
                font-size: 20px;
                border: 2px dashed #2E9AFE;
                padding: 10px;
                width: 190px;
                margin-left: 250px;
            }

            #time {
                margin-top: 20px;
                font-size: 80px;
                position: center;
                color: silver;
                border: 2px dashed #2E9AFE;
                padding: 10px;
                width: 320px;
                margin-left: 190px;
            }

        </style>
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                    <div class="overlay-content p-3 p-lg-4 rounded">
                        <p id="date"></p>
                        <p id="time"></p>
                    </div>
                </div>
            </div>
            <!--//auth-background-overlay-->
        </div>
        <!--//auth-background-col-->

    </div>
    <!--//row-->


</body>

</html>
