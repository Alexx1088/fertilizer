@extends('fertilizer.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="mb-3">
                            Добавить удобрение
                        </h1>

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
                    <div class="col-4">
                        <form action="{{route('fertilizer.store')}}" method="POST"
                              class="w-65" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <input type="text" class="form-control" name="name" placeholder="Наименование удобрения"
                                       value="{{old('name')}}">
                                @error('name')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <input type="number" class="form-control" name="nitrogen_rate"
                                       placeholder="Норма азота"   value="{{old('nitrogen_rate')}}">
                                @error('nitrogen_rate')
                                <div class="text-danger"> Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="number" class="form-control" name="phosphorus_rate"
                                       placeholder="Норма фосфора" value="{{old('phosphorus_rate')}}">
                                @error('phosphorus_rate')
                                <div class="text-danger"> Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="number" class="form-control" name="potassium_rate"
                                       value="{{old('potassium_rate')}}" placeholder="Норма калия">
                                @error('potassium_rate')
                                <div class="text-danger"> Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="number" class="form-control" name="culture_group_id"
                                         value="{{old('culture_group_id')}}" placeholder="группа культур">
                                @error('culture_group_id')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="text" class="form-control" name="district"
                                       value="{{old('district')}}" placeholder="район">
                                @error('district')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="number" class="form-control" name="price"
                                       value="{{old('price')}}" placeholder="цена">
                                @error('price')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="text" class="form-control" name="description"
                                       value="{{old('description')}}" placeholder="описание">
                                @error('description')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="text" class="form-control" name="destination"
                                       value="{{old('destination')}}" placeholder="назначение">
                                @error('destination')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>

                        </form>
                    </div>

                    <!-- ./col -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection