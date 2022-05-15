@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование клиента</h1>
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

    <form action="{{ route( 'admin.clients.update', $client->id) }}" method="post" class="w-25">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>Наименование</label>
        <input type="text" class="form-control" name="name"
        value="{{ $client->name }}">
            @error('name')
<div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Дата договора</label>
            <input type="date" class="form-control" name="agreement_date"
                   value="{{ $client->agreement_date }}">
            @error('agreement_date')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Стоимость поставки</label>
            <input type="number" class="form-control" name="delivery_cost"
                   value="{{ $client->delivery_cost }}">
            @error('delivery_cost')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Регион</label>
            <input type="text" class="form-control" name="region"
                   value="{{ $client->region }}">
            @error('region')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Обновить">
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