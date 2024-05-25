<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div>
    <header>
      {{-- navbar --}}
      <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
          {{-- navbar brand --}}
          <a class="navbar-brand" href="#">
            <i class="fa-brands fa-laravel me-1"></i>
            <span>Shop</span>
          </a>

          {{-- navbar items --}}
          <div class="collapse navbar-collapse" id="headerNavItems">
            <ul class="navbar-nav">

              {{-- about page --}}
              <li class="nav-item">
                <a href="{{ route('about') }}" aria-current="page" @class(['nav-link', 'active' => Route::is('about')])>
                  <i class="fa-solid fa-user fa-sm me-1"></i>
                  <span>About</span>
                </a>
              </li>

            </ul>
          </div>

          {{-- navbar search box --}}
          <form class="d-flex" role="search">
            <input class="form-control form-control-sm me-2" type="search" aria-label="Search" placeholder="Search">
            <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
          </form>

          {{-- navbar items toggle button --}}
          <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#headerNavItems" type="button"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
    </header>
    <main>
      @yield('content')
    </main>
  </div>
</body>

</html>
