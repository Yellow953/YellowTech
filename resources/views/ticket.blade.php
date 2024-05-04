<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body style="background-color: rgb(229,228,226);">
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="{{ asset('assets/images/tickets3.jpg') }}"
                alt="login form" class="img-fluid" style="height: 100%; border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form method="POST" action="{{ route('tickets.create') }}" enctype="multipart/form-data">
          @csrf
     


                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <img style="width: 100px" src="{{ asset('assets/logo/logo_Y_vector.png') }}" alt="YellowTech Logo" />
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create your ticket here</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form2Example17" class="form-control form-control-lg"  value="{{ old('title') }}" required/>
                    <label class="form-label" for="form2Example17">Name*</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form2Example27" class="form-control form-control-lg"  value="{{ old('subject') }}" required />
                    <label class="form-label" for="form2Example27">Subject*</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <textarea type="text" id="form2Example27" class="form-control form-control-lg" required>{{ old('description') }}</textarea>
                    <label class="form-label" for="form2Example27">Description*</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block"  type="submit">Submit</button>
                  </div>

                  @auth
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="project_id" value="{{ Auth::user()->project_id }}">
    @endauth


          
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>