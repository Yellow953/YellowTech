<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Favicon --}}
  <link rel="shortcut icon" href="{{ asset('assets/logo/yellowtech.png') }}" type="image/x-icon">

  <title>YellowTech | Ticket</title>

  {{-- Coding Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('assets/css/ticket.css') }}">
</head>

<body>
  <section class="vh-100">
    <div class="container py-auto h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-12">
          <div class="card">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{ asset('assets/images/tickets5.jpg') }}" alt="login form" class="img-fluid left-image" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  @include('admin.layouts._flash')
                  <form method="POST" action="{{ route('tickets.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-center align-items-center mb-3 pb-1">
                      <img src="{{ asset('assets/logo/logo_Y_vector.png') }}" alt="YellowTech Logo" class="logo" />
                      <h2 class="mx-3">Ticket Portal</h2>
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="name">Name *</label>
                      <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Please Enter your Name..." required />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="subject">Subject *</label>
                      <input type="text" id="subject" class="form-control" name="subject" value="{{ old('subject') }}"
                        placeholder="Please Enter the Ticket's Subject..." required />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="description">Description *</label>
                      <textarea type="text" id="description" class="form-control" name="description" rows="3"
                        placeholder="Please Describe your Issue in Details..."
                        required>{{ old('description') }}</textarea>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Submit</button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                      <a href="{{ route('terms_and_conditions') }}" class="small text-muted">Terms of use.</a>
                      <a href="{{ route('privacy_policy') }}" class="small text-muted">Privacy policy</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
  </script>
</body>

</html>