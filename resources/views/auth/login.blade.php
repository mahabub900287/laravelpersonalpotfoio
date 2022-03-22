
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/css/daterangepicker.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('vendors/css/custom.min.css')}}" rel="stylesheet">
  </head>
  <style>
    .login{
        background-image:url('{{asset('images/bg.jpg')}}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position:center;
        height:500px;
    }
  </style>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper mt-0">
        <div class="animate form login_form" style="margin-top:90px;background:rgba(0,0,0,0.5);padding:20px">
          <section class="login_content">
            <img src="{{ asset('images/image.jpeg')}}" class="rounded-circle" width="100" alt="">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <h1>Login Form</h1>
              <div>
                <input id="email" type="email" placeholder="User" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                <div>
                    <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
             <div>
                <button class="btn btn-success btn-block" type="submit" href="{{ route('login')}}">Log in</button>
             <div>
                <a class="reset_pass" href="{{ route('register') }}">Create Accound</a>
                <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
        </div>
    </div>
<!-- jQuery -->
<script src="{{ asset('vendors/js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/js/bootstrap-progressbar.min.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('vendors/js/moment.min.js') }}"></script>
<script src="{{ asset('vendors/js/daterangepicker.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('vendors/js/custom.min.js') }}"></script>
</body>
</html>


