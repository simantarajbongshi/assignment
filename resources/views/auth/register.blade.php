<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Survay | Registration</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 4.5 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-box-body">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group has-feedback @error('name') has-error @enderror">
                    <label for="name">{{ __('Full Name') }}</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Full name"
                        value="{{ old('name') }}" autocomplete="name" autofocus>
                    @error('name')
                    <span class="help-block" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group has-feedback @error('username') has-error @enderror">
                    <label for="username">{{ __('Username') }}</label>
                    <input id="username" name="username" type="text" class="form-control" placeholder="Username"
                        autocomplete="username">
                    @error('username')
                    <span class="help-block" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group has-feedback @error('password') has-error @enderror">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                        autocomplete="new-password">
                    @error('password')
                    <span class="help-block" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="Retype Password" autocomplete="new-password">
                </div>
                <div class="form-group has-feedback @error('level') has-error @enderror">
                    <label for="level">{{ __('User Level') }}</label>
                    <select name="level" id="level" class="form-control">
                        <option selected disabled>Select User Level</option>
                        <option value="0">Employee</option>
                        <option value="1">HR</option>
                    </select>
                    @error('level')
                    <span class="help-block" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-sm">Register</button>
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- Bootstrap 4.5 -->
    <script src="/bower_components/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
