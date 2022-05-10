@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить клиента</h1>
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
            <div class="row">

<div class="col-12">

    <form action="{{ route('admin.clients.store') }}" method="post" class="w-25">
        @csrf
        <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Ф.И.О. клиента">
            @error('name')
<div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="agreement_date" placeholder="дата договора">
            @error('agreement_date')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить">
    </form>
            </div>
             </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection