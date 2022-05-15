@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="mb-3">
                           Добавление клиента
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
                    <div class="col-126">
                        <form action="{{route('admin.clients.store')}}" method="POST"
                              class="w-65"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <input type="text" class="form-control" name="name" placeholder="Наименование клиента"
                                       value="{{old('name')}}">
                                @error('name')
                                <div class="text-danger">Это поле необходимо заполнить </div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <input type="date" class="form-control" name="agreement_date"                        " placeholder="Дата договора"
                                  {{-- required --}}   value="{{old('agreement_date')}}">
                                @error('agreement_date')
                                <div class="text-danger"> Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="number"  class="form-control" name="delivery_cost" {{--required--}}
                                       placeholder="Стоимость поставки"
                                       value="{{old('delivery_cost')}}">
                                @error('delivery_cost')
                                <div class="text-danger"> Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="text" class="form-control" name="region" placeholder="регион"
                                     {{--  required --}}  value="{{old('region')}}">
                                @error('region')
                                <div class="text-danger">Это поле необходимо заполнить </div>
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