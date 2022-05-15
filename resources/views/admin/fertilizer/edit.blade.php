@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование удобрения</h1>
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

    <form action="{{ route( 'admin.fertilizer.update', $fertilizer->id) }}" method="post" class="w-25">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>Наименование</label>
        <input type="text" class="form-control" name="name"
        value="{{ $fertilizer->name }}">
            @error('name')
<div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
   </div>
        <div class="form-group">
            <label>Норма азота</label>
            <input type="number" class="form-control" name="nitrogen_rate"
                   value="{{ $fertilizer->nitrogen_rate }}">
            @error('nitrogen_rate')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Норма фосфора</label>
            <input type="number" class="form-control" name="phosphorus_rate"
                   value="{{ $fertilizer->phosphorus_rate }}">
            @error('phosphorus_rate')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
       <div class="form-group">
            <label>Норма калия</label>
            <input type="number" class="form-control" name="potassium_rate"
                   value="{{ $fertilizer->potassium_rate }}">
            @error('potassium_rate')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Группа культур</label>
            <input type="number" class="form-control" name="culture_group_id"
                   value="{{ $fertilizer->culture_group_id}}">
            @error('culture_group_id')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Район</label>
            <input type="text" class="form-control" name="district"
                   value="{{ $fertilizer->district }}">
            @error('district')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Стоимость</label>
            <input type="number" class="form-control" name="price"
                   value="{{ $fertilizer->price }}">
            @error('price')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Описание</label>
            <input type="text" class="form-control" name="description"
                   value="{{ $fertilizer->description }}">
            @error('description')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Назначение</label>
            <input type="text" class="form-control" name="destination"
                   value="{{ $fertilizer->destination }}">
            @error('destination')
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