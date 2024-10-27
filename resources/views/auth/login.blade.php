<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/fontawesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/login.css')}}">
  <style>
    .container {
      display: flex;
      justify-content: center;
    }

    .login-page {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f0f0f0;
      /* Optional background */
    }

    .login-container {
      width: 100%;
      max-width: 800px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .left-section img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .right-section h2 {
      margin-bottom: 20px;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .login-btn {
      width: 100%;
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="login-page">
    <div class="container">
      <div class="login-container">
        <div class="row ">
          <div class="col-lg-6 col-md-6 col-12 left-section">
            <div class="p-3">
              <div class="left-header-text mt-4">
                <h2 class="p-3 text-center fw-bold">{{ $content->company_name }}</h2>
              </div>
              <div class="left-section-img d-flex justify-content-center">
                <img src="{{asset('image/test.jpg')}}" alt="login image">
              </div>
              <div class="company-section d-flex justify-content-center">
                <!-- <a class="company-info text-black mt-3"><i class="fas fa-building"></i> Manage Your Ecommerce Business</a> -->
              </div>
              <div class="company-address mt-2">
                <p class="text-center">Corporate Office : {{ $content->address }}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12 right-section">
            <div class="mt-5 p-3">
              <div class="right-text-h2">
                <h2 class="fs-3 fw-bold">Login To Your Account</h2>
              </div>
              @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
              <form action="{{ route('login.check') }}" method="post">
                @csrf
                <label class="label-email mb-0" for="email">Username</label>
                <div class="input-group">
                  <div class="">
                    <span class="input-group-text input-item"><i class="fas fa-envelope-square"></i></span>
                  </div>
                  <input type="text" name="username" class="form-control item">
                </div>
                <label class="label-password mb-0" for="password">Password</label>
                <div class="input-group">
                  <div class="">
                    <span class="input-group-text input-item"><i class="fas fa-unlock"></i></span>
                  </div>
                  <input type="password" name="password" class="form-control item" placeholder="Your Password">
                </div>
                <div class="right-btn mt-3">
                  <input type="submit" class="login-btn" value="login">
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('admin/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/js/frontawesome.js')}}"></script>
</body>

</html>