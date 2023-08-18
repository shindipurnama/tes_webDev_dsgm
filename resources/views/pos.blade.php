@extends('layouts/index')

@section('judul')

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
                    <li class="breadcrumb-item"><a href="dataPenjualan">Data Penjualan</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Penjualan</a></li>
                </ol>
            </div>
        </div>

        <div class="col-lg-12">
            
            <form action="{{ route('penjualan.store') }}" method="post">
			    {{ @csrf_field() }}
                                    
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mt-3 ">
                            <div class="card-body">
                                <div class="block margin-bottom-sm">
                                    <label for="inlineFormInput" class="col-sm-form-control-label">Tanggal</label>                                    
                                    <input type="date" value="{{ date('Y-m-d') }}" name="tanggal" class="mr-sm-3 form-control datepicker">                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mt-3 ">
                            <div class="card-body">
                                <div class="block margin-bottom-sm">
                                    <label for="inlineFormInput" class="col-sm-form-control-label">User</label>                                    
                                    <input type="text" readonly value="{{ Auth::user()->name }}" class="mr-sm-3 form-control">                                    
                                    <input type="hidden" readonly value="{{ Auth::user()->id }}" name="user_id" class="mr-sm-3 form-control">                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mt-3 ">
                            <div class="card-body">
                                <div class="block margin-bottom-sm">
                                    <label for="inlineFormInput" class="col-sm-form-control-label">Customer</label>
                                    <input type="text" value="Umum"  name="customer" class="mr-sm-3 form-control">                                        
                                    <input id="subtotal-val" type="hidden" hidden name="" class="mr-sm-3 form-control">                                        
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="block margin-bottom-sm">
                                    <center>
                                    <button type="button" class="btn btn-outline-primary btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        Select Product</button>
                                    <br><br>
                                    </center>
                                    <div class="table-responsive">
                                        <table id="keranjang" class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                            <thead align="center">
                                                <th width="295">Nama Barang</th>
                                                <th width="45">Qty</th>
                                                <th width="212">Harga</th>
                                                <th width="228">Sub Total</th>
                                                <th width="43"> Aksi</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                    </div>

                    <div class="col-lg-6">
                        <div class="card mt-3 ">
                            <div class="card-body">
                                <div class="block margin-bottom-sm">
                                    <label class="col-sm-form-control-label">Total</label>
                                    <input id="total-val" name="jumlah" type="text" placeholder="Rp. 0" class="mr-sm-3 form-control">
                                    <center> <br> 
                                    <button type="submit" class="btn btn-success">Tambah Penjualan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </form>

        </div>
    </div>
</div>

<!-- Modal barang Start -->
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive"> 
                     <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                    <thead>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                            @foreach ($barang as $br)
                            <tr >
                                <td>{{ $br->id }}</td>
                                <td>{{ $br->item }}</td>
                                <td style="text-align:left">RP. {{ $br->harga }}</td>
                                <td>{{ $br->stock }}</td>
                                <td><input type="button" onclick="pilihBarang('{{ $br -> id }}')" 
                                value="add" class="btn btn-primary"></td>
                            </tr>
                            @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Barang End -->

    

<script>
	var barang = <?php echo json_encode($barang); ?>;
	console.log(barang[0]["item"]);
	var colnum=0;

	function getVal(event){
		if (event.keyCode === 13) {
			modal();
		}
	}

	function pilihBarang(id){
		var index;
		for(var i=0;i<barang.length;i++){
			if(barang[i]["id"]==id){
				console.log(barang[i]);
				index=i;
				break;
			}
		}
		$("#myModal").modal("hide");

		var table = document.getElementById("keranjang");

        var flag=-1;

        for(var z=1; z<table.rows.length; z++)
        {
            var x=table.rows[z].childNodes[0].childNodes[0];
            console.log(x.value);
            if(x.value == barang[index]["id"])
            {
            flag = z;
            break;
            }
        }

        if(flag != -1)
        {
            var colQty = table.rows[flag].childNodes[1].childNodes[0];
            colQty.value = parseInt(colQty.value) + 1;
            var idrow = table.rows[flag].childNodes[0].childNodes[0].value;
            console.log(idrow);
            recount(idrow);
        }
        else
        {
		var row = table.insertRow(table.rows.length);
		row.setAttribute('id','col'+colnum);
		var id = 'col'+colnum;
		colnum++;

		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		console.log(index);
		cell1.innerHTML = '<input type="hidden" name="id['+barang[index]["id"]+']" value="'+barang[index]["id"]+'">'+barang[index]["item"];
		cell2.innerHTML = '<input type="number" name="qty['+barang[index]["id"]+']" min="0" max="'+barang[index]["stock"]+'" value="1" oninput="recount(\''+barang[index]["id"]+'\')" id="qty'+barang[index]["id"]+'">';		
		cell3.innerHTML = '<input type="hidden" id="harga'+barang[index]["id"]+'" name="harga['+barang[index]["id"]+']" value="'+barang[index]["harga"]+'">'+barang[index]["harga"];
		cell4.innerHTML = '<input type="hidden" class="subtotal" name="subtotal['+barang[index]["id"]+']" value="'+barang[index]["harga"]+'" id="subtotal'+barang[index]["id"]+'"><span id="subtotalval'+barang[index]["id"]+'">'+barang[index]["harga"]+'</span>';
		cell5.innerHTML = '<button onclick="hapusEl(\''+id+'\')"  class="btn btn-danger">Del</button>';

		total();
        }
		 
	}
	function lm(i){
		var min =  document.getElementById("qty"+i).value;
		if(min <= 1){

		}else{
		min--;
		document.getElementById("qty"+i).value = min;
		recount(i);
		}
	}
	function ln(i){
		var plus =  document.getElementById("qty"+i).value;
		console.log(plus);
		plus++;
		document.getElementById("qty"+i).value = plus;
		console.log(plus);
		recount(i);
	}
	function total(){
		var subtotals = document.getElementsByClassName("subtotal");
		var total = 0;
		for(var i=0; i<subtotals.length;++i){
			total += Number(subtotals[i].value); 
		}
		document.getElementById("subtotal-val").value = total;
		total = parseInt(total);
		document.getElementById("total-val").value = total;

	}

	function recount(id){

		var price = document.getElementById("harga"+id).value;
		var sembarang = document.getElementById("qty"+id).value;
        console.log(price);
		var lego = Number(price*sembarang);
		document.getElementById("subtotal"+id).value = lego;
		document.getElementById("subtotalval"+id).innerHTML = lego;
		total();
	}


	function modal(){
		$("#myModal").modal("show");
		document.getElementById("myText").value = "";
	}
	function hapusEl(idCol) {
		document.getElementById(idCol).remove();
		total();
	}

</script>

@endsection
