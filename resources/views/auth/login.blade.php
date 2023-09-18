<html lang="en">
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/stylee.css') }}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <div class="bg-img">
        <div class="content">
          <header>Login </header>
          <form method="POST" action="{{ route('login') }}">
            @csrf

              <div>
                <input   id="email" placeholder="Email"   type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong  style="color: red" >{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <br>
              <div>
                <input id="password"  placeholder="password" type="password" class=" form-control form-control-lg  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red" >{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <br>
                  <div class="d-flex justify-content-start">
                      <input class="form-check-input" style="width: 30px ; height: 20px"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                      <label class="form-check-label " for="remember" style="color: rgb(249, 249, 252)" >
                         {{ __('Remember Me') }}
                      </label>
                  </div>
    <br>
          <div class="">
              <div >
                <div class="field">
                  <input type="submit"  value="LOGIN">
                </div>
                
                  @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
              </div>
          </div>
    
          </form>
          <div class="signup">Don't have account?
            <a href="{{ route('register') }}">Signup Now</a>
          </div>
        </div>
      </div>
</body>
</html>


