@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $culture->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="row"
<div >
    <div class="card col-6">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">

                <tbody>

                <tr>
                    <td>ID</td>
                    <td>Название</td>

                </tr>

                <tr>
                    <td>{{ $culture->id }}</td>
                    <td>{{ $culture->name }}</td>
                    <td ><a href="{{ route('admin.culture.edit', $culture->id) }}" class="text-success" >
                            <i class="fas fa-pencil-alt" ></i></a></td>
                 </tr>

                   </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
            </div>
             </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection