<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src={{ asset('assets/plugins/fontawesome/js/all.min.js') }}></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href={{ asset('assets/css/portal.css') }}>

</head>

<body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4">
                        <a class="app-logo" href="index.html">
                            {{-- <img class="logo-icon me-2" src={{ asset('images/app-logo.svg') }} alt="logo"> --}}
                        </a>
                    </div>
                    <h2 class="auth-heading text-center mb-4">Créer un compte</h2>

                    <div class="auth-form-container text-start mx-auto">
                        <form method="post" action={{ route('register') }} class="auth-form auth-form">
                            @csrf
                            @method('POST')

                            <div class="email mb-3">
                                <label class="sr-only" for="name">Nom complet</label>
                                <input id="name" name="name" type="text" value="{{ old('text') }}"
                                    class="form-control name" placeholder="Nom complet" required="required">
                                @error('name')
                                    <p class="text-danger" style="font-size: 13px;">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="email">Your Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}"
                                    class="form-control email" placeholder="Email" required="required">
                                @error('email')
                                    <p class="text-danger" style="font-size: 13px;">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="password">Password</label>
                                <input id="password" name="password" type="password" value="{{ old('password') }}"
                                    class="form-control password" placeholder="Mot de passe" required="required">
                                @error('password')
                                    <p class="text-danger" style="font-size: 13px;">{{ $message }}</p>
                                @enderror

                            </div>
                            {{-- <div class="extra mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="RememberPassword">
                                    <label class="form-check-label" for="RememberPassword">
                                        I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and
                                        <a href="#" class="app-link">Privacy Policy</a>.
                                    </label>
                                </div>
                            </div><!--//extra--> --}}

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                    Up</button>
                            </div>
                        </form><!--//auth-form-->

                        <div class="auth-option text-center pt-5">Vous avez déjà un compte? <a class="text-link"
                                href={{ route('login') }}>Se connecter</a></div>
                    </div><!--//auth-form-container-->



                </div><!--//auth-body-->

                {{-- <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                                style="color: #fb866a;"></i> by <a class="app-link"
                                href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for
                            developers</small>

                    </div>
                </footer><!--//app-auth-footer--> --}}
            </div><!--//flex-column-->
        </div><!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                    <div class="overlay-content p-3 p-lg-4 rounded">
                        <h5 class="mb-3 overlay-title">L'app qu'il vous faut</h5>
                        <div>L'espace admin qu'il vous faut pour lister tous vos employes ainsi que les dépratemnts de
                            votre entreprise.
                        </div>
                    </div>
                </div>
            </div><!--//auth-background-overlay-->
        </div><!--//auth-background-col-->

    </div><!--//row-->


</body>

</html>
