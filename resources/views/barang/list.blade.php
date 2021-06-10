@extends('layouts.master',['module' => 'Barang'])

@section('content')
<?php
    $jumlah = \DB::select("SELECT * from barang");
?>
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Barang</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container">

    <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-box"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Barang</span>
                        <span class="info-box-number">{{count($jumlah)}}</span>
                        <span class="info-box-number">Barang</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="button-add">
                <a data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($barang as $row)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>
                                        <img style="width: 100px; height:auto; margin-left:auto; margin-right:auto; display:block; "src="{{ url('upload/foto'.'/'.$row->foto_barang) }}" alt="" srcset="">
                                    </td>
                                    <td>{{ $row->nm_barang}}</td>
                                    <td><span>Rp.</span> {{ format_uang($row->harga_beli)}}</td>
                                    <td><span>Rp.</span> {{format_uang($row->harga_jual)}}</td>
                                    <td>{{ format_uang($row->stok)}}</td>
                                    <td>
                                        <a href="{{ route('formEditBarang', ['barangId' => $row->id])}}"><i class="fas fa-pen"></i></a>&nbsp
                                        <a href="{{ route('hapusBarang', ['barangId' => $row->id])}}" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @php $no++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Input Data Barang</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('simpanBarang')}}" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Foto Barang</label>
                        @if($errors->has('foto_barang'))
                        <div class="text-danger"><b>{{ $errors->first('foto_barang') }}</b></div>
                        @endif
                        <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control" name="foto_barang" value="" placeholder="Masukkan Foto Barang">
                        <img id="output"/ style="margin-top: 15px; margin-left:auto; margin-right:auto; display:block;" height="150" width="150">
                    </div>
                    <div class="form-group">
                    <label for="">Nama Barang</label>
                    @if($errors->has('nm_barang'))
                        <div class="text-danger"><b>{{ $errors->first('nm_barang') }}</b></div>
                        @endif
                        <input type="text" class="form-control" name="nm_barang" value="{{ old('nm_barang', $barang->nm_barang ?? '') }}" placeholder="Masukkan Nama Barang">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Harga Beli</label>
                        @if($errors->has('harga_beli'))
                        <div class="text-danger"><b>{{ $errors->first('harga_beli') }}</b></div>
                        @endif
                        <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-money-bill"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="harga_beli" value="{{ old('harga_beli', $barang->harga_beli ?? '') }}" placeholder="Masukkan Harga Beli">
                </div>
                    </div>

                    <div class="form-group">
                        <label for="">Harga Jual</label>
                        @if($errors->has('harga_jual'))
                        <div class="text-danger"><b>{{ $errors->first('harga_jual') }}</b></div>
                        @endif
                        <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-money-bill"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="harga_jual" value="{{ old('harga_jual', $barang->harga_jual ?? '') }}" placeholder="Masukkan Harga Jual">
                </div>
                    </div>

                    <div class="form-group">
                        <label for="">Stok</label>
                        @if($errors->has('stok'))
                        <div class="text-danger"><b>{{ $errors->first('stok') }}</b></div>
                        @endif
                        <input type="text" class="form-control" name="stok" value="{{ old('stok', $barang->stok ?? '') }}" placeholder="Masukkan Stok">
                    </div>
            </div>
            <div class="modal-footer">
                <button name="submit" id="tombol_form" type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection