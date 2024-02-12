<!DOCTYPE html>
<html lang="en" dir="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sistem Manajemen Aset Koperasi Mahasiswa </title>

    <!-- ======= Styles ======= -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <!-- ================ SESSION PAGE =============== -->
    <div class="container" id="container">
        {{-- ============= SIGN IN FORM ============== --}}
        <div class="form-container sign-in-container">
            <form action="/login/actionlogin" method="post">
                @csrf
                <h1>Sign In</h1>
                <div class="input-field">
                    <div class="input-container">
                        <p class="input-label">Email</p>
                        <input type="email" name="email" id="email" placeholder="Enter your email" />
                        {{-- <span class="error email-error">
                            <i class="bi bi-exclamation-circle"></i>
                            <p class="error-text">Please enter a valid Email</p>
                        </span> --}}
                    </div>
                    <div class="input-container">
                        <p class="input-label">Password</p>
                        <input type="password" name="password" id="password" placeholder="Enter your password" />
                        <i class="bi bi-eye-slash show-input"></i>
                        {{-- <span class="error password-error">
                            <i class="bi bi-exclamation-circle"></i>
                            <p class="error-text">Wrong password</p>
                        </span> --}}
                    </div>
                    <a id="forgetPwd" href="#">Forgot your password?</a>
                </div>             
                <button> <a href="">Sign In </a></button> 
                @if ($message = Session::get('verifikasi'))
                    <div class="center error-message">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="center error-message">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('verifIssues'))
                    <div class="center error-message">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('reset'))
                <div class="center error-message">
                    {{ $message }}
                </div>
                @endif
                @if ($message = Session::get('resetIssues'))
                <div class="center error-message">
                    {{ $message }}
                </div>
                @endif
                @if ($errors->has('email'))
                    <div class="alert alert-danger center" role="alert">
                        <small>{{$errors->first('email')}}</small>
                    </div>
                @endif 
            </form>
            <span class="breakLine"></span>
            <button class="btnGoogleSI" >
                <a href="auth/google" >
                    <img class="Google-si" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/800px-Google_%22G%22_logo.svg.png" alt="Sign-in Google" >
                    <div class="btnLabel"> Masuk dengan Google </div>
                </a>
            </button>
            <span> Belum punya akun? <a href="#" class="register" id="signUp" >Create Account</a> </span>
        </div>

        {{-- ============= SIGN UP FORM ============== --}}
        <div class="form-container sign-up-container">
            <form action="/pendaftaran/action" method="post">
                @csrf
                <h1>Create Account</h1>
                <div class="input-field-create">
                    <div class="input-container">
                        <p class="input-label">Nama</p>
                        <input type="text" name="name" id="name" placeholder="Ketik nama lengkapmu" />
                        @if ($errors->has('name'))
                        <div class="alert alert-danger center" role="alert">
                            <small>{{$errors->first('name')}}</small>
                        </div>
                        @endif
                    </div>

                    <div class="input-container">
                        <p class="input-label">Email</p>
                        <input type="email" name="email" id="email" placeholder="Enter aktif kamu" />
                        @if ($errors->has('email'))
                        <div class="alert alert-danger center" role="alert">
                            <small>{{$errors->first('email')}}</small>
                        </div>
                        @endif 
                    </div>

                    <div class="input-container">
                        <p class="input-label">Password</p>
                        <input type="password" name="password" id="password" placeholder="Kata sandi kombinasi huruf dan angka" />
                        <i class="bi bi-eye-slash show-input"></i>
                        @if ($errors->has('password'))
                        <div class="alert alert-danger center" role="alert">
                            <small>{{$errors->first('password')}}</small>
                        </div>
                        @endif
                    </div>

                    <div class="input-container">
                        <p class="input-label">Konfirmasi Password</p>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ketik ulang kata sandimu" />
                        <i class="bi bi-eye-slash show-input"></i>
                        @if ($errors->has('password'))
                        <div class="alert alert-danger center" role="alert">
                            <small>{{$errors->first('password')}}</small>
                        </div>
                        @endif 
                    </div>

                    <div class="input-container">
                        <input type="checkbox" id="rememberMe" />
                        <label for="rememberMe">Ingat Password</label>
                    </div>
                </div>
                <div class="createAccount">
                    <button class="btnCreateAccount" ><a href="#" >CREATE ACCOUNT</a></button>
                    <span> Sudah punya akun? <a href="#" class="register" id="signIn" >Sign In</a> </span>
                </div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="{{asset('elements/logoLandscape.png')}}" alt="" class="brandLogo">
                    <img src="{{asset('elements/registerElement.png')}}" alt="">
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="{{asset('elements/logoLandscape.png')}}" alt="" class="brandLogo">
                    <img src="{{asset('elements/loginElement.png')}}" alt="loginImg">
                </div>
            </div>
        </div>
    </div>

    {{-- ========= FORGET PASSWORD FORM ========= --}}
    <div class="popup" id="popup" >
        <div class="close-btn">&times;</div>
        <div class="image-container">
            <img class="img-forget" src="{{asset('elements/forgetPwd.png')}}" alt="forgotPwd">
        </div>
        <form class="form-forgetPwd" action="/ResetPassword/reset" method="get">
            <h2>Lupa Password ?</h2>
            <p>Jangan khawatir.</p>
            <p>Kami akan mengirimkan link untuk perubahan password baru melalui Emailmu. </p>
            <div class="input-container">
                <p class="input-label">Email</p>
                <input type="email" name="email" id="email" required="required" placeholder="Email yang terdaftar">
            </div>
            <button class="submit-btn" > <a href="#">SUBMIT</a> </button>
        </form>
    </div>


    <!-- ======= Scripts ======= -->
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');
        const popup = document.getElementsByClassName('.popup');
        // const eyeIcons = document.querySelectorAll(".show-input");

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        document.querySelector("#forgetPwd").addEventListener("click",function(){
            document.querySelector(".popup").classList.add("active");
            document.querySelector(".container").classList.add("blur");
        });
        document.querySelector(".close-btn").addEventListener("click",function(){
            document.querySelector(".popup").classList.remove("active");
            document.querySelector(".container").classList.remove("blur");
        });


        // eyeIcons.forEach((eyeIcon) => {
        //     eyeIcon.addEventListener("click", function => {
        //         const input = eyeIcon.parentElement.querySelector("#password");
        //         if(input.type ==="password"){
        //             eyeIcon.classList.replace("bi-eye-slash", "bi-eye")
        //         }
        //     })
            
        // });

    </script>
</body>
</html>