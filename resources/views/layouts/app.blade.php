<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-body">
  <div>
    <header>
      {{-- navbar --}}
      <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
        <div class="container">
          {{-- navbar brand --}}
          <a class="navbar-brand" href="/">
            <i class="fa-brands fa-laravel me-1"></i>
            <span>Shop</span>
          </a>

          {{-- navbar items toggle button --}}
          <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#headerNavItems" type="button"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          {{-- navbar items --}}
          <div class="collapse navbar-collapse" id="headerNavItems">
            <ul class="navbar-nav">

              {{-- products page --}}
              <li class="nav-item">
                <a href="{{ route('products.index') }}" aria-current="page" @class(['nav-link', 'active' => Route::is('products.*')])>
                  <i class="fa-solid fa-box fa-sm me-1"></i>
                  <span>Products</span>
                </a>
              </li>

              {{-- about page --}}
              <li class="nav-item">
                <a href="{{ route('about') }}" aria-current="page" @class(['nav-link', 'active' => Route::is('about')])>
                  <i class="fa-solid fa-user fa-sm me-1"></i>
                  <span>About</span>
                </a>
              </li>

            </ul>
          </div>

        </div>
      </nav>
    </header>
    <main>
      @yield('content')
    </main>
  </div>
</body>

</html>
