<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>eAdvocate :: authentication</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/other.css')}}">
  <link rel="stylesheet" href="{{ asset('css/headfoot.css') }}">
</head>
<style>
  body {
    background: #E9EBEE;
  }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
        <div class="container">
        <a class="navbar-brand" href=""><img src="images/mainlogo.png" alt="Logo"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
          </ul>
          <form action="{{ route('login') }}" method="post" class="form-inline">
           {{csrf_field()}}
          <div class="form-group mb-2">
            <label for="inputEmail4" class="sr-only">Password</label>
            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
          </div>
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword2" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary mb-2">Login</button>
        </form>
        </div>
    </div>
  </nav>
  <div class="container content">
    <div class="row">
      <div class="col-md-7 cov">
        <div class="row justify-content-center cov-img">
            <img src="images/logCover.png" alt="Cover photo">
        </div>
                <hr>
        <div class="row">
            <div class="col-md-6">
                <p>
                    Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.

Be sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.

Here’s a quick example to demonstrate Bootstrap’s form styles. Keep reading for documentation on required classes, form layout, and more.
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.

Be sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.

Here’s a quick example to demonstrate Bootstrap’s form styles. Keep reading for documentation on required classes, form layout, and more.
                </p>
            </div>
        </div>
      </div>
      <div class="col-md-5 sign">
        @if (@$res==1)
          <h3 class="alert alert-success" style="padding: 15px;">Registration Completed</h3>
        @endif

        @if (@$res==2)
          <p class="alert alert-danger" style="padding: 15px;">Registration failed</p>
        @endif

        @if (session()->get( 'res' )==3)
          <p class="alert alert-danger" style="padding: 15px;">Wrong user id or password</p>
        @endif

        <h3>Create a new account</h3>
        <p>Sign up account is totally free</p>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <hr>
        <form action="{{ route('registration') }}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="inputName">Full name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Hasan Abdullah Sujan">
          </div>
          <div class="form-group">
            <label for="inputEmail4">Enter email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="abcd@gmail.com">
          </div>
          <div class="form-group">
            <label for="inputPassword4">Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="inputNumber">Registration number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="registration_number" id="inputNumber" placeholder="12345678">
          </div>
          <div class="form-group">
            <label for="inputgender">Gender</label>
            <select id="inputgender" name="gender" class="form-control">
              <option selected>Choose...</option>
              <option>Male</option>
              <option>Female</option>
              <option>Others</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Sign up</button>
        </form>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="col-md-12 text-center">
      <p>&copy; 2019-eAdvocate || All right reserved</p>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
