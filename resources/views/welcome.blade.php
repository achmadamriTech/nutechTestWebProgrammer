@extends('layouts.master',['module' => 'Home'])

@section('content')
<br><br>
<div class="content">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-primary">
                            <img class="img-circle" style="width: 200px; height:auto;margin-left:auto;margin-right:auto;display:block" src="{{url('adminlte/dist/img/6.png')}}" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username text-center" style="margin-left: -10px; margin-top:15px;">Achmad Maulana Amri</h3>
                        <h5 class="widget-user-desc text-center" style="margin-left: -10px; margin-top:15px;">Web Programmer</h5>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- /.col -->
           
        </div>
    </div><!-- /.container-fluid -->
</div>
@endsection