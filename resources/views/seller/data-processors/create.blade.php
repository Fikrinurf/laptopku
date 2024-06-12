@extends('layout.seller.app')
@section('title', 'Seller - Tambah Data Processor')
@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Tambah Data Processor </h1>
                </div>
            </div><!--//row-->
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form action="{{ url('/seller/data-processor') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nama Processor</label>
                            <input type="text" class="form-control" id="setting-input-1" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="brand" class="form-label">Brand Processor</label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="INTEL" {{ old('brand') == 'INTEL' ? 'selected' : '' }}>INTEL
                                        </option>
                                        <option value="AMD" {{ old('brand') == 'AMD' ? 'selected' : '' }}>AMD</option>
                                    </select>

                                    @error('brand')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="setting-input-3" class="form-label">Generation</label>
                                    <input type="text" class="form-control" id="setting-input-3" name="generation"
                                        value="{{ old('generation') }}">
                                    @error('generation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="core" class="form-label">Core</label>
                                    <input type="text" class="form-control" id="core" name="core"
                                        value="{{ old('core') }}">
                                    @error('core')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="thread" class="form-label">Thread</label>
                                    <input type="text" class="form-control" id="thread" name="thread"
                                        value="{{ old('thread') }}">
                                    @error('thread')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="release" class="form-label">Tanggal Rilis</label>
                            <input type="date" class="form-control" id="release" name="release_date"
                                value="{{ old('release_date') }}">
                            @error('release_date')
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
