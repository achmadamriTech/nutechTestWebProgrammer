@extends('layouts.master',['module' => 'Barang'])

@section('content')
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
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Barang</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Barang Termahal</span>
                        <span class="info-box-number">410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Barang Termurah</span>
                        <span class="info-box-number">13,648</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Stok Terendah</span>
                        <span class="info-box-number">93,139</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
        <div class="button-add">
                <a  href="{{route('barang')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                    <form role="form" action="{{route($url)}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="barangId" value="{{ old('', $barang->id ?? '') }}">
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
                    <button type="submit" class="btn btn-primary btn-block">{{$tombol}}</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection