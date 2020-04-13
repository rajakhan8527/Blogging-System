
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blog System Admin Login - Authentication</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
      <link href="{{asset('admin/css/login.css?id=88479922aa715b61c58a')}}" rel="stylesheet" type="text/css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>BLOG SYSTEM</b>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div class="form-group">
                    </div>
        <form id="form-login" role="form" action="{{ route('login') }}" method="post">
            @csrf

            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
        </form>
    </div>
    <p class="text-center pd-10 text-green">
        &#9830; ART Inc. &#9830;
    </p>

</div>
<script src="{{asset('js/vendor.js?id=0f3d897e0ce5c70e8c63')}}" type="text/javascript"></script>
</body>
</html>