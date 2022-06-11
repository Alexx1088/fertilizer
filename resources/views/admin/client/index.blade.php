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
                <div>
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
                                        <td><a href="{{ route('admin.clients.show', $client->id) }}"><i
                                                        class="far fa-eye"></i></a></td>
                                        <td><a href="{{ route('admin.clients.edit', $client->id) }}"
                                               class="text-success"><i class="fas fa-pencil-alt"></i></a></td>

                                        <td>
                                            <form action="{{route('admin.clients.delete', $client->id)}}"
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
                    <div>
                        <h4 class="m-0 mb-4 mt-5">Клиенты, удаленные из таблицы клиентов:</h4>
                        <div class="card-body table-responsive p-0 col-6 " style="max-width: 510px; width: 100%" ;
                        ">
                        <table class="table table-head-fixed text-nowrap ">
                            <thead>
                            <tr>
                                <th style="width: 10%">ID</th>
                                <th>Имя</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deleted_clients as $deleted_client)
                                <tr>
                                    <td>{{ $deleted_client->id }}</td>
                                    <td>{{ $deleted_client->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            {{--   </div><!-- /.container-fluid -->--}}

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <h4 class="mb-3" style="margin-left:280px "> Фильтр для клиентов:</h4>
    <div class="row d-flex flex-row ml-5" style="width:900px">

        <div class="col-4" style="border: 1px solid darkred; margin-left:300px; margin-right: 5px">
            <div class="form-group mr-3">
                <form action="{{ route('admin.clients.index') }}" method="post">
                    @csrf
                    @method('get')
                    <label>Регион</label>
                    <select multiple class="form-control" name="regions[]">
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->region}}
                            </option>
                        @endforeach
                    </select>
                    {{--  </label>--}}
                    <button type="submit" class="btn btn-block btn-primary mt-3">
                        Поиск
                    </button>
                </form>
            </div>
            <div class="card col-12">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-1 "
                     style="height: 150px; width: 200px;">
                    <table class="table table-head-fixed text-nowrap">
                        <tbody>
                        <tr>
                            <th width="5">ID региона</th>
                        </tr>
                        <tr>
                            @if(isset($regions))
                                @foreach($regions as $region)
                                    <td>{{ $region }}</td>
                                @endforeach
                            @else
                                <td></td>
                            @endif
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-3" style="border: 1px solid darkred; margin: 5px">
            <form action="{{route('admin.clients.index')}}" method="post"
                  class="w-65" enctype="multipart/form-data">
                @csrf
                @method('get')
                <div class="form-group ">
                    <label>Имя клиента</label>
                    <input type="text" class="form-control" name="name"
                           placeholder="Имя клиента">
                </div>
                <div class="card col-12" style="height:200px">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-1 "
                         style="height: 150px; width: 200px;">
                        <table class="table table-head-fixed text-nowrap">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                            </tr>
                            <tr>
                                @if(isset($data['name']))
                                    @foreach($clients_search as $client_search)
                                        <td>{{ $client_search->id }}</td>
                                        <td>{{ $client_search->name }}</td>
                                    @endforeach
                                @else
                                    <td></td>
                                @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Применить фильтр">
                </div>
            </form>
        </div>


    </div> row d-flex







@endsection