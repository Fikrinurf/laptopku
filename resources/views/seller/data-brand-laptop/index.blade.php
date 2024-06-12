@extends('layout.seller.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/seller/dataTables.bootstrap5.min.css') }}">
@endpush

@section('title', 'Seller - Data Brand Laptop')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Data Brand Laptop</h1>
                    <a href="{{ '/seller/data-brand/create' }}" class="btn btn-success text-white mt-4">Tambah</a>
                    @if ($errors->any())
                        <div class="mt-3">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="swal" data-swal="{{ session('success') }}"></div>
                </div>
            </div><!--//row-->
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="cell">No</th>
                                            <th class="cell">Nama Brand</th>
                                            <th class="cell">Negara</th>
                                            <th class="cell">Penemu</th>
                                            <th class="cell">Tgl Ditemukan</th>
                                            <th class="cell">Tempat Ditemukan</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//tab-pane-->
            </div><!--//tab-content-->



        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection

@push('js')
    <script src="{{ asset('assets/seller/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/seller/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/seller/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/seller/sweetalert2@11.js') }}"></script>


    <script>
        const swal = $('.swal').data('swal');

        if (swal) {
            Swal.fire({
                'title': 'Success',
                'text': swal,
                'icon': 'success',
                'showConfirmButton': false,
                'timer': 1500
            })
        }

        function deleteDataBrand(e) {
            let id = e.getAttribute('data-id');

            Swal.fire({
                title: 'Hapus',
                text: 'Yakin Data Akan dihapus ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: '/seller/data-brand/' + id,
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                            }).then((result) => {
                                window.location.href = '/seller/data-brand';
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });
                }

            })
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverside: true,
                ajax: '{{ url()->current() }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',

                    },
                    {
                        data: 'brand_name',
                        name: 'brand_name'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'founder',
                        name: 'founder'
                    },
                    {
                        data: 'founded_date',
                        name: 'founded_date'
                    },
                    {
                        data: 'founded_place',
                        name: 'founded_place'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    },
                ]
            });
        });
    </script>
@endpush
