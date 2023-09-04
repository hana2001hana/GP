<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
        <img src=https://dynamic.brandcrowd.com/asset/logo/344f974a-eac5-43c2-b014-f66d7a24c923/logo-search-grid-2x?logoTemplateVersion=1&v=637882835663670000&text=Hire.ps alt="N"width="50" height="50">
          <a class="navbar-brand" href="http://127.0.0.1:8000/home">Hire.ps</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/company">Company</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Rint</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Courses</a>
              </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item"> -->
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/profile">Profile</a>
                <!-- </li> -->
             
            </form>
          </div>
        </div>
    </nav>
 
    <div class="container">
       <h1 class="center"> Welcome to home page, {{ Auth::user()->name }}</h1>
    </div>
<!-- ----------------------------------starting home page ---------------------------------------------------- -->
<section data-bs-version="5.1" class="header3 cid-sQksrcs27E" id="header03-2">
    
    
    <div class="container">
        <div class="row align-left justify-content-center align-content-around">
            <div class="col-12 col-lg col-md-12 m-auto">
                <div class="text-wrapper md-pb">
                    <!-- <h2 class="mbr-section-subtitle mbr-fonts-style mb-2 align-left display-7"><strong>####</strong></h2> -->
                    <h2 class="mbr-section-title mbr-fonts-style mb-2 align-left display-1"><strong>HIRE.PS<br></strong></h2>
                    <!-- <p class="mbr-text mbr-fonts-style align-left display-7">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt labore dolore magna aliqua.
                    </p> -->
                     <div class="mbr-section-btn mt-4"><a class="btn btn-primary display-4" href="http://127.0.0.1:8000/company">Get Started</a></div>
                  
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 image-wrapper">
                <img class="w-100" src="https://dynamic.brandcrowd.com/asset/logo/29f9c1d0-e94d-45bc-9f46-a4646ef84045/logo-search-grid-1x?logoTemplateVersion=1&v=638266597090470000&text=Hire.ps&colorpalette=blue" alt="Mobirise">
            </div>
        </div>
    </div>
</section>

</body>
</html>