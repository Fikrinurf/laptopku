@extends('layout.seller.app')
@section('title', 'Seller - Tambah Data Slider')
@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Tambah Data Slider </h1>
                </div>
            </div><!--//row-->
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form action="{{ url('/seller/slider') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nama Slider</label>
                            <input type="text" class="form-control" id="setting-input-1" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Upload Gambar (Max 2mb)</label>
                            <input type="file" class="form-control" id="setting-input-1" name="img"
                                value="{{ old('img') }}">
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Descripsi Slider</label><br>
                            <textarea name="desc" class="form-control" id="" cols="30" rows="10">{{ old('desc') }}</textarea>
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
