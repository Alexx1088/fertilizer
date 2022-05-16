@extends('fertilizer.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $fertilizer->name }}</h1>
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
<div>
    <div class="card col-9">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 " style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <tbody>
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
                    <td ><a href="{{ route('fertilizer.edit', $fertilizer->id) }}" class="text-success" >
                            <i class="fas fa-pencil-alt" ></i></a></td>
                    <td>
                        <form action="{{route('fertilizer.delete', $fertilizer->id)}}"
                              method = "POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" ></i>
                            </button>
                        </form>
                    </td>
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