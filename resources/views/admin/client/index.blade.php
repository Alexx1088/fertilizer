@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper ">
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
                    <div class="col-3 mb-3">
                        <a href="{{ route('admin.clients.create') }}"
                           class="btn btn-block btn-primary"
                        style="width: auto">Добавить</a>
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
                                @if($data = null)
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
                                @else
                                    @foreach($clients_searches as $clients_search)
                                        <tr>
                                            <td>{{ $clients_search->id }}</td>
                                            <td>{{ $clients_search->name }}</td>
                                            <td>{{ $clients_search->agreement_date}}</td>
                                            <td>{{ $clients_search->delivery_cost}}</td>
                                            <td>{{ $clients_search->region}}</td>
                                            <td><a href="{{ route('admin.clients.show', $clients_search->id) }}"><i
                                                            class="far fa-eye"></i></a></td>
                                            <td><a href="{{ route('admin.clients.edit', $clients_search->id) }}"
                                                   class="text-success"><i class="fas fa-pencil-alt"></i></a></td>

                                            <td>
                                                <form action="{{route('admin.clients.delete', $clients_search->id)}}"
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
                                @endif
                                </tbody>
                            </table>
                                                    </div>

                        <!-- /.card-body -->
                    </div>
                    <div class="form-group ml-5 mt-5" >
                        <form action="{{ route('admin.clients.index') }}" method="post">
                            @csrf
                            @method('get')

                            <div class="form-group ">
                                <input type="hidden" class="form-control" name="name"
                                >
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Сбросить фильтр">
                            </div>
                        </form>
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
    <h4 class="mb-3 " style="text-align: center "> Фильтр для клиентов:</h4>
    <div class="row d-flex flex-row "
         style="width:1300px; margin-left: 300px;">

        <div style="border: 1px solid darkred; margin: 5px; width: 250px; height: 300px;">
            <div class="form-group mr-3">
                <form action="{{ route('admin.clients.index') }}" method="post">
                    @csrf
                    @method('get')
                    <label style="margin-left: 100px; margin-top: 10px">Регион</label>
                    <select multiple class="form-control" name="regions[]">
                        @foreach($clients as $client)
                            <option
                                    @if(isset($data['regions']))
                                    @foreach($data['regions'] as $region_id)
                                    {{ $region_id == $client->id ? 'selected' : '' }}
                                    @endforeach
                                    @endif
                                    value="{{$client->region}}">{{$client->region}}
                            </option>
                        @endforeach
                    </select>
                    {{--  </label>--}}
                    <button type="submit" class="btn btn-block btn-primary mt-3 ml-2">
                        Поиск
                    </button>
                </form>
            </div>

        </div>

        <div style="border: 1px solid darkred; margin: 5px; width: 250px; height: 300px;">
                      <form action="{{route('admin.clients.index')}}" method="post"
                  class="w-65" enctype="multipart/form-data">
                @csrf
                @method('get')
                                     <div class="form-group ">
                    <label style="margin-left: 75px; margin-top: 10px">Имя клиента</label>
                    <input type="text" class="form-control" name="name"
                           placeholder="Имя клиента" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary ml-5 mt-5" value="Применить фильтр">
                </div>
            </form>
        </div>

        <div class="col-3 " style="border: 1px solid darkred; margin: 5px; width:250px; height: 300px;" ;>
            <form action="{{route('admin.clients.index')}}" method="post"
                  class="w-65" enctype="multipart/form-data">
                @csrf
                @method('get')
                <div class="form-group ">
                    <label style="margin-left: 75px; margin-top: 10px">Дата договора "от"</label>
                    <input type="date" class="form-control" name="agreement_date_from"
                           placeholder="дата договора 'от'" value="{{old('agreement_date_from')}}">
                </div>
                <div class="form-group ">
                    <label style="margin-left: 75px; margin-top: 10px">Дата договора "до"</label>
                    <input type="date" class="form-control" name="agreement_date_to"
                           placeholder="дата договора 'до'" value="{{old('agreement_date_to')}}">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary mt-1" style="margin-left: 75px"
                           value="Применить фильтр">
                </div>
            </form>
        </div>

        <div class="col-3 " style="border: 1px solid darkred; margin: 5px; width: 250px; height: 300px;">
            <form action="{{route('admin.clients.index')}}" method="post"
                  class="w-65" enctype="multipart/form-data">
                @csrf
                @method('get')
                <div class="form-group ">
                    <label>Стоимость поставки "от"</label>
                    <input type="number" class="form-control" name="delivery_cost_from"
                           placeholder="Стоимость поставки 'от'">
                </div>
                <div class="form-group ">
                    <label>Стоимость поставки "до"</label>
                    <input type="number" class="form-control" name="delivery_cost_to"
                           placeholder="Стоимость поставки 'до'">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary mt-3" style="margin-left: 75px"
                           value="Применить фильтр">
                </div>
            </form>
        </div>

    </div> {{--row d-flex--}}







@endsection