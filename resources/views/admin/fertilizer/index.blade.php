@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Удобрения</h1>
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
                    <div class="col-1 mb-3">
                        <a href="{{ route('admin.fertilizer.create') }}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div {{--class="card col-12"--}}>
                        <div class="card col-12">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Норма азота</th>
                                        <th>Норма фосфор</th>
                                        <th>Норма калий</th>
                                        <th>Группа культур</th>
                                        <th>район</th>
                                        <th>стоимость</th>
                                        <th>описание</th>
                                        <th>назначение</th>
                                        <th colspan="2" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fertilizers as $fertilizer)
                                        <tr>
                                            <td>{{ $fertilizer->id }}</td>
                                            <td>{{ $fertilizer->name }}</td>
                                            <td>{{ $fertilizer->nitrogen_rate}}</td>
                                            <td>{{ $fertilizer->phosphorus_rate}}</td>
                                            <td>{{ $fertilizer->potassium_rate}}</td>
                                            <td>{{ $fertilizer->culture_group_id}}</td>
                                            <td>{{ $fertilizer->district}}</td>
                                            <td>{{ $fertilizer->price}}</td>
                                            <td>{{ $fertilizer->description}}</td>
                                            <td>{{ $fertilizer->destination}}</td>
                                            <td><a href="{{ route('admin.fertilizer.show', $fertilizer->id) }}"><i
                                                            class="far fa-eye"></i></a></td>
                                            <td><a href="{{ route('admin.fertilizer.edit', $fertilizer->id) }}"
                                                   class="text-success"><i class="fas fa-pencil-alt"></i></a></td>

                                            <td>
                                                <form action="{{route('admin.fertilizer.delete', $fertilizer->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="col-sm-6 mt-3" style="max-width: 510px; width: 100%">
                            <h4 class="m-0">Удобрения, удаленные из таблицы удобрений:</h4>
                        </div><!-- /.col -->
                        <div class="row" style="max-width: 510px; width: 100%;">
                            <div class="card col-12 mt-3">
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0 " style="height: 300px; ">
                                    <table class="table table-head-fixed text-nowrap ">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%">ID</th>
                                            <th>Название</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($deleted_fertilizers as $deleted_fertilizer)
                                            <tr>
                                                <td>{{ $deleted_fertilizer->id }}</td>
                                                <td>{{ $deleted_fertilizer->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
