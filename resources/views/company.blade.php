<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 10 Custom Login and Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
    <div class="container">

      <a class="navbar-brand" href="http://127.0.0.1:8000/home">Hire.ps</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/home">Home</a>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/company">Company</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Rint</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Courses</a>
          </li>
          </li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Logout</button>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/profile">Profile</a>
            </li>
            </li>
        </form>
      </div>
    </div>
  </nav>


  <div class="container">
    <h1> Welcome to company page, {{ Auth::user()->name }}</h1>
  </div>


  <!-- -start div for company- -->



  <style>
    /* div {
		
            width: 30%;
            border:1px solid red;
            float:right;
            text-align:center;
			
			
        } */

    .card {
      margin: 15px;
      background-color: #E0E3E5;
    }
  </style>
  <section>
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="" style="height: 200px;" alt="companys pic">
            <h4 class="card-title align-left mbr-black mb-2 mbr-fonts-style display-7"><strong>companys name</strong>
              <div class="card-body">
                <p style="font-family:'Times New Roman';">11111111111111111111111111<br></p>
                <h2 class="card-text" style="text-align: center;">

              </div>
          </div>
        </div>

        <!-- <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-box align-left">
                        <span class="mbr-iconfont mobi-mbri-setting mobi-mbri"></span>
                        <img class="card-img-top" src="" style="height: 200px;" alt="companys pic">
                        <h4 class="card-title align-left mbr-black mb-2 mbr-fonts-style display-7"><strong>Processing</strong>
                        </h4>
                        <p class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            eiusmod tempor incididunt.<br></p>
                    </div>
                </div>
            </div> -->
        <div class="col-md-4">
          <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="" style="height: 200px;" alt="companys pic">
            <h4 class="card-title align-left mbr-black mb-2 mbr-fonts-style display-7"><strong>companys name2</strong>
              <div class="card-body">
                <p style="font-family:'Times New Roman';">2222222222222222222222222222222222<br></p>
                <h2 class="card-text" style="text-align: center;">

              </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="" style="height: 200px;" alt="companys pic">
            <h4 class="card-title align-left mbr-black mb-2 mbr-fonts-style display-7"><strong>companys name3</strong>
              <div class="card-body">
                <p style="font-family:'Times New Roman';">333333333333333333333333<br></p>
                <h2 class="card-text" style="text-align: center;">

              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ////////////////////////////-->


  </section>
</body>

</html>