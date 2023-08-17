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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
                </ol>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
            <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Data User</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 957px">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>Id </th>
                                        <th>Name </th>
                                        <th>Email </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr style="text-align:center">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
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