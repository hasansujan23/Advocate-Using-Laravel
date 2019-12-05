<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker|Righteous|Ubuntu|Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="{{ asset('css/notify.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/headfoot.css')}}">
  <link rel="shortcut icon" type="image/png" href="{{asset('images/logo.png')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{ asset('js/notify.js') }}"></script>

  @yield('header')

  <title>Online Advocate services</title>
  <style>
  .act{
    border-bottom: 2px solid #e58e26;
  }
</style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-custom fixed-top">
    <div class="container">
    <a class="navbar-brand" href="#"><img src="{{asset('images/logo.png')}}" alt="Logo"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a id="homeLink" class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a id="profileLink" class="nav-link" href="{{route('profile')}}">Profile</a>
        </li>
        <li class="nav-item">
          <a id="addCaseLink" class="nav-link" href="{{route('addcase')}}">AddCase</a>
        </li>
        <li class="nav-item">
          <a id="allCaseLink" class="nav-link" href="{{route('allcase')}}">AllCase</a>
        </li>

        <li class="nav-item">
          <a id="archiveLink" class="nav-link" href="{{route('archive')}}">Archive</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Documentation
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('noc')}}">NOC</a>
            <a class="dropdown-item" href="{{route('penitation')}}">Penitation</a>
            <a class="dropdown-item" href="{{route('other')}}">Others</a>
        </li>
      </ul>
      <form action="{{ route('userCaseDetails') }}" method="get" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" name="case_no" placeholder="Search case no" aria-label="Search">
        <input type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0" value="Search">
      </form>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">Log Out</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>


  @yield('content')

   @yield('script')


  <div class="footer">
    <div class="col-md-12 text-center">
      <p>&copy; 2019-eAdvocate || All right reserved</p>
    </div>
  </div>
  <!--Script ended here-->

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>