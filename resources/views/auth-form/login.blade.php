<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Login Form HTML CSS | CodingNepal</title>
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
  <div class="wrapper">
    <div class="title"><span>Login Form</span></div>
    <form action="{{ route('admin.login')}}" method="POST">
      @csrf 
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="email" value="{{ old('email') }}" placeholder="Email or Phone"  />
        @if ($errors->has('email'))
          <span class="error-message">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" name="password"  value="{{ old('password') }}" placeholder="Password"  />
        @if ($errors->has('password'))
        <span class="error-message">{{ $errors->first('password') }}</span>
      @endif
      </div>
      <div class="pass"><a href="#">Forgot password?</a></div>
      <div class="row button">
        <input type="submit" value="Login" />
      </div>
      <div class="signup-link">Not a member? <a href="{{ route('signup') }}">Signup now</a></div>
    </form>
  </div>
</body>
</html>