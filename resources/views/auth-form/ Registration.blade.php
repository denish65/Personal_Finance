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
    <div class="title"><span>Signup Form</span></div>
    <form action="{{ route('register-form')}}" method="POST">
       @csrf
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="firstname" placeholder="first name" required />
        <!-- <input type="text" placeholder="last name" required />
        <input type="text" placeholder="Email " required />
        <input type="text" placeholder="Phone" required />
        <input type="text" placeholder="city" required />
        <input type="text" placeholder="state" required /> -->
        <!-- <input type="text" placeholder="country" required />
        <input type="text" placeholder="age" required /> -->
      </div>
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="lastname" placeholder="last name" required />
      </div>
      <div class="row">
        <i class="fas fa-user"></i>
              <input type="text" name="Email" placeholder="Email " required />

      </div>

      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text"  name="Phone" placeholder="Phone" required />

      </div>

      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="city" placeholder="city" required />
      </div>

      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="state" placeholder="state" required />
      </div>
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="country" placeholder="country" required />

      </div>
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="age" placeholder="age" required />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
         <input type="password" name="Password" placeholder="Password" required />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
         <input type="password" name="Confirmpassword" placeholder="Confirm password" required />
      </div>
      <div class="pass"><a href="#">Forgot password?</a></div>
      <div class="row button">
        <input type="submit" value="Signup" />
      </div>
      <div class="signup-link">Not a member? <a href="/">Signup now</a></div>
    </form>
  </div>
</body>
</html>