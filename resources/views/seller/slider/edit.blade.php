@extends('layout.seller.app')
@section('title', 'Seller - Edit Data Slider')
@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Edit Slider </h1>
                </div>
            </div><!--//row-->
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form action="{{ url('/seller/slider/' . $sliders->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <input type="hidden" name="oldImg" value="{{ $sliders->img }}">
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nama Slider</label>
                            <input type="text" class="form-control" id="setting-input-1" name="name"
                                value="{{ old('name', $sliders->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="img">Image (Max 2MB)</label>
                            <input type="file" id="img" name="img" class="form-control">
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                <small>Gambar Lama</small><br>
                                <img src="{{ asset('storage/slider/' . $sliders->img) }}" alt="" width="80px">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Deskripsi Slider</label>
                            <input type="text" class="form-control" id="setting-input-1" name="desc"
                                value="{{ old('desc', $sliders->desc) }}">
                            @error('desc')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn app-btn-primary">Tambah Data</button>
                    </form>
                </div><!--//app-card-body-->

            </div>


        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection

@push('js')
    <script src="{{ asset('assets/seller/jquery-3.5.1.js') }}"></script>
@endpush
