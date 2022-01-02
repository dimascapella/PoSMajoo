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
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
  </head>
  <body>
    <section id="nav-section">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Majoo Teknologi Indonesia</a>
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
            <ul class="navbar-nav text-center ms-auto">
                @if (auth()->user())
                <li class="nav-item">
                    <a class="nav-link active" href="/">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logoutHandler">Logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link active" href="/">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                @endif
            </ul>
            </div>
        </div>
      </nav>
    </section>
    <section id="product">
        <div class="container-fluid">
            <div class="row">
                <h3 class="mt-3 fw-bold">Produk</h3>
            </div>
            <div class="row">
                @if($data->count())
                @foreach($data as $value)
                <div class="col-md-3 py-2">
                    <div class="border border-2 rounded text-center products d-flex flex-column">
                        @if($value->image)
                        <img src="{{ asset('storage/' . $value->image) }}" alt="ProductImage" class="p-2 w-100 h-50">
                        @else
                        <img src="{{ asset('storage/post-images/r.png') }}" alt="ProductImage" class="p-2 w-100 h-50">
                        @endif
                        <p class="fw-bold mb-0 mt-2 fs-5">{{ $value->product_name }}</p>
                        <p class="fw-bold fs-5">Rp. {{ number_format($value->price, 0, '', '.') }}</p>
                        <p class="px-2 text-justify desc-content">{!! $value->description  !!}</p>
                        <button class="btn btn-primary w-50 mb-4 mt-auto mx-auto">Beli</button>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-md text-center mt-4">
                    <h3>Maaf, Produk Masih Belum Ada!</h3>
                </div>
                @endif
            </div>
        </div>
    </section>
    <section id="footer">
        <footer class="footer mt-auto py-3 bg-dark text-center fixed-bottom">
            <div class="container">
                <span class="text-muted">2021@PT Majoo Teknologi Indonesia</span>
            </div>
        </footer>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
      integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('js/currencyFormatting.js') }}"></script>
  </body>
</html>