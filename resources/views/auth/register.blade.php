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
        <header>Register </header>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          
            <div>
              <input  placeholder="Name" id="name" type="text" class=" form-control form-control-lg  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;"  >{{ $message }}</strong>
                    </span>
                @enderror
          </div>
         
<br>
          
            <div>
              <input  placeholder="Email"  id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong style="color: red;" >{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <br>
            <div>
              <input  placeholder="phone" id="phone" type="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
            
              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong style="color: red;" >{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <br>
            
              <div>
                <input placeholder="password"  id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;" >{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <br>
               
                <div>
                  <input placeholder="c-password" class="form-control form-control-lg" id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
              </div>
              <br>
          <div class="pass">
            <a href="#"></a>
          </div>
          <div class="field">
                <input type="submit" value="{{ __('Register') }}"  >
              </div>
        </form>
        <br>
        <div class="signup">
          <a href="{{ route('login') }}">Login Now</a>
        </div>

      </div>
    </div>
  </body>
</html>
