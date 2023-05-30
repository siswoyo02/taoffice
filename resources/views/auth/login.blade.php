<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Perkantoran</title>

    <!-- CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="css/_bootstrap.min.css">

    <link rel="stylesheet" href="css/_style.css">

    <!-- <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sistem Informasi Perkantoran</h3>
                                <p class="mb-4">
                                    <br />Login terlebih dahulu untuk masuk
                                </p>
                            </div>
                            <form method="POST" id="myForm" action="{{ url('/login-proses') }}" class="form-horizontal" autocomplete="off">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input id="gmail" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" autocomplete="username" autofocus>
                                    @error('username')
                                    <span id="peringatan" class="invalid-feedback" role="alert" style="color:red">
                                        <strong><br><br><br>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group last">
                                    <label for="password">Password</label>
                                    <input id="sandi" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password">
                                    @error('password')
                                    <span id="peringatan" class="invalid-feedback" role="alert" style="color:red">
                                        <strong><br><br><br>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group last mb-4 mt-1">
                                    {!! captcha_img() !!} 
                                    <label for="captcha" class="mt-1">Captcha</label>
                                    <input id="captcha" type="text"
                                        class="form-control @error('captcha') is-invalid @enderror" name="captcha"
                                        autocomplete="current-captcha">
                                    @error('captcha')
                                    <span id="peringatan" class="invalid-feedback" role="alert" style="color:red">
                                        <!-- <strong><br><br><br>{{ $message }}</strong> -->
                                        @if ($message == 'validation.captcha')
                                            <strong><br>Captcha tidak sesuai</strong>
                                        @elseif ($message == 'The captcha field is required.')
                                        <strong><br>Captcha tidak boleh kosong</strong>
                                        @endif
                                    </span>
                                    @enderror
                                </div>
                                <button class="btn btn-block btn-primary" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/_jquery-3.3.1.min.js"></script>
    <script src="js/_popper.min.js"></script>
    <script src="js/_bootstrap.min.js"></script>
    <script src="js/_main.js"></script>
    <script>
        document.getElementById("myForm").addEventListener("submit", function(){
            localStorage.clear();
        });
        document.getElementById("gmail").autocomplete = "off";
        document.getElementById("sandi").autocomplete = "off";
    </script>
</body>

</html>