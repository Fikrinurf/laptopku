@extends('layout.seller.app')
@section('title', 'Seller - Detail Slider')
@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Detail Slider</h1>
                </div>
            </div><!--//row-->

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left table-striped">
                                    <tr>
                                        <th>Nama</th>
                                        <td>: {{ $sliders->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gambar</th>
                                        <td>
                                            <a href="{{ asset('storage/slider/' . $sliders->img) }}" target="_blank"
                                                rel="noopener noreferrer"><img
                                                    src="{{ asset('storage/slider/' . $sliders->img) }}" alt=""
                                                    width="30%"></a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>: {{ $sliders->desc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td>: {{ $sliders->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Diupdate</th>
                                        <td>: {{ $sliders->created_at }}</td>
                                    </tr>

                                    <div class="float-end">
                                        <a href="{{ url('/seller/slider') }}" class="btn btn-secondary">Kembali</a>
                                    </div>

                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//tab-pane-->
            </div><!--//tab-content-->

        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
