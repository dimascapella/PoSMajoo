<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Majoo Teknologi</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
  </head>
  <body>
    <section id="nav-section">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav-elements collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav text-center me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/product/create">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user">Data User</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/supplier">Data Supplier</a>
                  </li>
                </ul>
                <ul class="navbar-nav text-center ms-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="/addAdmin">Register Admin</a>
                  </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logoutHandler">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>
    </section>
    @yield('content')
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
      integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/customSelect.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/animatedProgressBar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
  </body>
</html>