<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="{{ asset('assets/bootstrap-v5/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .slider-img {
            width: auto;
            height: 600px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
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
    <main>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bootstrap Slider</title>
            <!-- Bootstrap CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>
            <section class="mb-5">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($sliders as $slider)
                            <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($sliders as $slider)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset('storage/slider/' . $slider->img) }}"
                                    class="d-block w-100 slider-img" alt="{{ $slider->title }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $slider->title }}</h5>
                                    <p>{{ $slider->desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </section>

            <section>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('storage/product/' . $product->img) }}"
                                    class="bd-placeholder-img card-img-top" width="100%" height="225"
                                    alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h1>{{ $product->product_name }}</h1>
                                    <p class="card-text">{{ $product->desc }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ url('/product/' . $product->id) }}" type="button"
                                                class="btn btn-sm btn-outline-secondary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>
            <footer class="bg-dark text-white mt-5 p-4 text-center">
                <div class="container">
                    <p class="mb-0">&copy; 2024 LaptopKU. All rights reserved.</p>
                </div>
            </footer>
        </body>

        </html>

    </main>
    <script src="{{ asset('assets/product/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/product/popper.min.js') }}"></script>
    <script src="{{ asset('assets/product/bootstrap.min.js') }}"></script>

</body>

</html>
