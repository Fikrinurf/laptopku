<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produk</title>
    <link href="{{ asset('assets/bootstrap-v5/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LaptopKU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ '/logout' }}">Logout</a>
                    </li>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/product/' . $product->img) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->product_name }}</h1>
                <p>{{ $product->desc }}</p>
                <p>{{ $product->price }}</p>
                <p>{{ $product->specification }}</p>
                <p>{{ $product->Brand->brand_name }}</p>
                <p>{{ $product->Processor->name }}</p>
                <p>{{ $product->warranty == 'Y' ? 'Garansi' : 'Tidak Bergarasansi' }}</p>


                <a href="{{ url('/product') }}" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white mt-5 p-4 text-center">
        <div class="container">
            <p class="mb-0">&copy; 2024 LaptopKU. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('assets/product/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/product/popper.min.js') }}"></script>
    <script src="{{ asset('assets/product/bootstrap.min.js') }}"></script>
</body>

</html>
