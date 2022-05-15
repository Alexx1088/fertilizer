@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Список клиентов</h1>
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
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-block btn-primary">Добавить</a>
                </div>
            </div>
            <div class="row"
<div >
    <div class="card col-9">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Дата договора</th>
                    <th>Стоимость доставки</th>
                    <th>регион</th>
                    <th colspan="2" class="text-center">Действие</th>
                 </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->agreement_date}}</td>
                        <td>{{ $client->delivery_cost}}</td>
                        <td>{{ $client->region}}</td>
                    <td><a href="{{ route('admin.clients.show', $client->id) }}"><i class="far fa-eye"></i></a></td>
                    <td><a href="{{ route('admin.clients.edit', $client->id) }}"
                           class="text-success"><i class="fas fa-pencil-alt"></i></a></td>

                    <td >
                           <form action="{{route('admin.clients.delete', $client->id)}}"
                       method = "POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="border-0 bg-transparent">
                        <i class="fas fa-trash text-danger" ></i>
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
            </div>
             </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection