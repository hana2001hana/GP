<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>finalprojectgraduation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </head>
  <body>
    
  <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Register</h1>
                </div>
                <div class="card-body">
                  @if(Session::has('success'))
                      <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                      </div>
                      @endif
                    <Form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">First Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="first name" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="last name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="VARCHAR(20)" name="phone_number" class="form-control" id="phone_number" placeholder="05........" required>
                        </div>


                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" name="password" class="form-control" id="confirm-password" required>
                        </div> -->
                        <div class="mb-3">
                          <div class="d-grid">
                            <button class="btn btn-primary">Register</button>
                          </div>
                        </div>
                    </Form>
                </div>
                <div class="mb-3">
                        <!-- <button type="button" class="btn btn-secondary" href="">Base class</button> -->
                        <a href='http://127.0.0.1:8000/login'  >
                            <button class="btn btn-secondary" >Login</button></a>
                        </div>
            </div>
        </div>
    </div>
  </body>
</html>
