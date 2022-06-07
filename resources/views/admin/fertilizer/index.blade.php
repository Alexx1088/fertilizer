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
                        <div class="col-sm-6 mt-3 " style="max-width: 510px; width: 100%">
                            <h4 class="m-0">Удобрения, удаленные из таблицы удобрений:</h4>
                        </div><!-- /.col -->
                        <div class="row" style="max-width: 510px; width: 100%;">

                            <div class="d-flex">

                                <div class="card col-12 mt-3 " style="margin-right: 250px; ">
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

                                <div class="card col-4 ml-3-3 mt-3">
                                    <form action="{{route('admin.fertilizer.index')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('get')
                                        <label for="districts">Поиск района</label>
                                        <select multiple="multiple" name="districts[]" id="districts"
                                                class="form-control">
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}">{{$district->district}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-block btn-primary mt-3">
                                            Поиск
                                        </button>
                                    </form>

                                </div>

                                {{--     <div class="card col-4 ml-3-3 mt-3">--}}
                                {{--<div class="form-group mr-3">--}}
                                {{--<form action="{{route('admin.fertilizer.index')}}" method="post">
                                    @csrf
                                    @method('get')
                                    <label for="districts">Поиск района</label>
                                    <select multiple="multiple" name="districts[]" id="districts" class="form-control">
                                        @foreach($districts as $district)
                                            <option
                                        @if(isset($data['districts']))
                                        @foreach($districts as $district_id)
                                            {{ $district_id == $district->id ? 'selected' : '' }}
                                            <option value="{{$district->id}}">{{$district->district}}</option>
                                        @endforeach
                                        @endif
                                        value="{{ $district->id }}"> {{$district->district}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-block btn-primary mt-3">
                                        Поиск
                                    </button>
                                </form>--}}
                          {{--  </div>--}}

                            <div class="form-group mr-3">
                                <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                    @csrf
                                    @method('get')
                                    {{-- <label>Группа культур</label>--}}
                                    <label>Группа культур
                                        <select multiple class="form-control" name="culture_group_ids[]">
                                            @foreach($fertilizers as $fertilizer )
                                                {{--  <option value="{{$district->id}}">{{$district->district}}</option>--}}
                                                <option  value="{{$fertilizer->id}}">{{$fertilizer->culture_group_id}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <button type="submit" class="btn btn-block btn-primary mt-3">
                                        Поиск
                                    </button>
                                </form>
                            </div>


                        </div>
                        <div class="mt-3">
                            <h4 class="mb-3"> Фильтр по удобрениям</h4>

                            <div class="col-12 " style="border: 1px solid darkred;">
                                <form action="{{route('admin.fertilizer.index')}}" method="post"
                                      class="w-65" enctype="multipart/form-data">
                                    @csrf
                                    @method('get')
                                    <div class="form-group ">
                                        <label>наименование</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Наименование удобрения">
                                    </div>
                                    <div class="card col-9">
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
                                                        @foreach($fertilizers_search as $fertilizer_search)
                                                            <td>{{ $fertilizer_search->id }}</td>
                                                            <td>{{ $fertilizer_search->name }}</td>
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

                            <div class="col-12 " style="border: 1px solid darkred;">
                                <form action="{{route('admin.fertilizer.index')}}" method="post"
                                      class="w-65" enctype="multipart/form-data">
                                    @csrf
                                    @method('get')
                                    <div class="form-group ">
                                        <label>Норма азота "от"</label>
                                        <input type="number" class="form-control" name="nitrogen_rate_from"
                                               placeholder="Норма азота 'от'">
                                    </div>
                                    <div class="form-group ">
                                        <label>Норма азота "до"</label>
                                        <input type="number" class="form-control" name="nitrogen_rate_to"
                                               placeholder="Норма азота 'до'">
                                    </div>
                                    <div class="card col-9">
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
                                                    @if(isset($data['nitrogen_rate_from']) && isset($data['nitrogen_rate_to']))
                                                        @foreach($fertilizers_search as $fertilizer_search)
                                                            <td>{{ $fertilizer_search->id }}</td>
                                                            <td>{{ $fertilizer_search->name }}</td>

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

                            <div class="col-12 " style="border: 1px solid darkred;">
                                <form action="{{route('admin.fertilizer.index')}}" method="post"
                                      class="w-65" enctype="multipart/form-data">
                                    @csrf
                                    @method('get')
                                    <div class="form-group ">
                                        <label>Норма фосфора "от"</label>
                                        <input type="number" class="form-control" name="phosphorus_rate_from"
                                               placeholder="Норма азота 'от'">
                                    </div>
                                    <div class="form-group ">
                                        <label>Норма фосфора "до"</label>
                                        <input type="number" class="form-control" name="phosphorus_rate_to"
                                               placeholder="Норма азота 'до'">
                                    </div>
                                    <div class="card col-9">
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
                                                    @if(isset($data['phosphorus_rate_from']) && isset($data['phosphorus_rate_to']))
                                                        @foreach($fertilizers_search as $fertilizer_search)
                                                            <td>{{ $fertilizer_search->id }}</td>
                                                            <td>{{ $fertilizer_search->name }}</td>

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

                            <div class="col-12 " style="border: 1px solid darkred;">
                                <form action="{{route('admin.fertilizer.index')}}" method="post"
                                      class="w-65" enctype="multipart/form-data">
                                    @csrf
                                    @method('get')
                                    <div class="form-group ">
                                        <label>Норма калия "от"</label>
                                        <input type="number" class="form-control" name="potassium_rate_from"
                                               placeholder="Норма калия 'от'">
                                    </div>
                                    <div class="form-group ">
                                        <label>Норма фосфора "до"</label>
                                        <input type="number" class="form-control" name="potassium_rate_to"
                                               placeholder="Норма калия 'до'">
                                    </div>
                                    <div class="card col-9">
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
                                                    @if(isset($data['potassium_rate_from']) && isset($data['potassium_rate_to']))
                                                        @foreach($fertilizers_search as $fertilizer_search)
                                                            <td>{{ $fertilizer_search->id }}</td>
                                                            <td>{{ $fertilizer_search->name }}</td>

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

                            <div class="col-12 " style="border: 1px solid darkred;">
                                <form action="{{route('admin.fertilizer.index')}}" method="post"
                                      class="w-65" enctype="multipart/form-data">
                                    @csrf
                                    @method('get')
                                    <div class="form-group ">
                                        <label>Стоимость "от"</label>
                                        <input type="number" class="form-control" name="price_from"
                                               placeholder="стоимость 'от'">
                                    </div>
                                    <div class="form-group ">
                                        <label>Стоимость "до"</label>
                                        <input type="number" class="form-control" name="price_to"
                                               placeholder="стоимость 'до'">
                                    </div>
                                    <div class="card col-9">
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
                                                    @if(isset($data['price_from']) && isset($data['price_to']))
                                                        @foreach($fertilizers_search as $fertilizer_search)
                                                            <td>{{ $fertilizer_search->id }}</td>
                                                            <td>{{ $fertilizer_search->name }}</td>

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

                            <div class="col-12 " style="border: 1px solid darkred;">
                                <form action="{{route('admin.fertilizer.index')}}" method="post"
                                      class="w-65" enctype="multipart/form-data">
                                    @csrf
                                    @method('get')
                                    <div class="form-group ">
                                        <label>Описание</label>
                                        <input type="text" class="form-control" name="description"
                                               placeholder="Описание удобрения">
                                    </div>
                                    <div class="card col-9">
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
                                                    @if(isset($data['description']))
                                                        @foreach($fertilizers_search as $fertilizer_search)
                                                            <td>{{ $fertilizer_search->id }}</td>
                                                            <td>{{ $fertilizer_search->name }}</td>
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

                            <div class="col-12 " style="border: 1px solid darkred;">
                                <form action="{{route('admin.fertilizer.index')}}" method="post"
                                      class="w-65" enctype="multipart/form-data">
                                    @csrf
                                    @method('get')
                                    <div class="form-group ">
                                        <label>Назначение</label>
                                        <input type="text" class="form-control" name="destination"
                                               placeholder="Назначение">
                                    </div>
                                    <div class="card col-9">
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
                                                    @if(isset($data['destination']))
                                                        @foreach($fertilizers_search as $fertilizer_search)
                                                            <td>{{ $fertilizer_search->id }}</td>
                                                            <td>{{ $fertilizer_search->name }}</td>
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
                            {{--   <div class="form-group">
                                   <input type="submit" class="btn btn-primary" value="Применить фильтр">
                               </div>--}}
                            {{--
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
                            </div>--}}


                        </div>

                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

@endsection
