@extends('layouts/index')

@section('css')
<link href="{{ asset('../asset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('konten')
@if (Session::has('success'))        
           
    <script>                    
        Swal.fire(
        'Data berhasil tersimpan!',
        'You clicked the button!',
        'success'
        )
        $('.swal2-content').remove();                   
        
    </script>

@endif
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Barang</a></li>
                </ol>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Data Barang</h4>
                    <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal" data-target=".tambahBarang">
                        <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>
                        Add
                    </button>
                </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 957px">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>Id </th>
                                        <th>Item </th>
                                        <th>Harga </th>
                                        <th>Stock </th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($barang as $barang)
                                    <tr style="text-align:center">
                                        <td>{{ $barang->id }}</td>
                                        <td>{{ $barang->item }}</td>
                                        <td>{{ $barang->harga }}</td>
                                        <td>{{ $barang->stock }}</td>  
                                        <td>                                      
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="modal" data-target=".editBarang{{ $barang->id }}"><i class="fa fa-pencil"></i></a>
                                                <form method="POST" action="{{ route('barang.destroy', $barang->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp mr-1" onclick="return confirm('Are you sure you want to delete this post?')"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>	
                                        </td>
                                    </tr>

                                    {{-- Edit Barang --}}
                                    <div class="modal fade editBarang{{ $barang->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Barang</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('barang.update', $barang->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="basic-form">
                                    
                                                        <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Item</label>
                                                                    <input type="text" name="item" value="{{ $barang->item }}" class="form-control" placeholder="Item">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Harga</label>
                                                                    <input type="number" name="harga" value="{{ $barang->harga }}" class="form-control" placeholder="0">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Stock</label>
                                                                    <input type="number" name="stock" value="{{ $barang->stock }}" class="form-control" placeholder="0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                        <input type="submit" value="Save changes" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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

<!-- Modal Tambah Data-->
<div class="modal fade tambahBarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{ route('barang.store') }}" method="post">
            {{ @csrf_field() }}
                <div class="modal-body">
                    <div class="basic-form">

                    <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Item</label>
                                <input type="text" name="item" class="form-control" placeholder="Item">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" placeholder="0">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Stock</label>
                                <input type="number" name="stock" class="form-control" placeholder="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <input type="submit" value="Save changes" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah Data -->
@endsection

@section('script')
    <script src="{{ asset('../asset/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../asset/js/plugins-init/datatables.init.js') }}"></script>
@endsection