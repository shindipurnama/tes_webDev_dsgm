@extends('layouts/index')

@section('css')
<link href="{{ asset('../asset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('konten')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Penjualan</a></li>
                </ol>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
            <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Data Penjualan</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 957px">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>Id </th>
                                        <th>Tanggal </th>
                                        <th>User </th>
                                        <th>Customer </th>
                                        <th>Jumlah </th>
                                        <th># </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($penjualan as $p)
                                    <tr style="text-align:center">
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->tanggal }}</td>
                                        <td>{{ $p->user->name }}</td>
                                        <td>{{ $p->customer }}</td>
                                        <td>{{ number_format($p->jumlah) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('penjualan.show', $p->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-book"></i></a>
                                            </div>	    
                                        </td>
                                    </tr>

                                    {{-- Detail --}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('../asset/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../asset/js/plugins-init/datatables.init.js') }}"></script>
@endsection