@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-center">Удобрения</h1>
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
                    <div class="col-3 mb-3 ml-5">
                        <a href="{{ route('admin.fertilizer.create') }}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-12 ml-5">
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

                                @if($data == null)
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

                                @else
                                    @foreach($fertilizers_searches as $fertilizer_search)
                                        <tr>
                                            <td>{{ $fertilizer_search->id }}</td>
                                            <td>{{ $fertilizer_search->name }}</td>
                                            <td>{{ $fertilizer_search->nitrogen_rate}}</td>
                                            <td>{{ $fertilizer_search->phosphorus_rate}}</td>
                                            <td>{{ $fertilizer_search->potassium_rate}}</td>
                                            <td>{{ $fertilizer_search->culture_group_id}}</td>
                                            <td>{{ $fertilizer_search->district}}</td>
                                            <td>{{ $fertilizer_search->price}}</td>
                                            <td>{{ $fertilizer_search->description}}</td>
                                            <td>{{ $fertilizer_search->destination}}</td>
                                            <td>
                                                <a href="{{ route('admin.fertilizer.show', $fertilizer_search->id) }}"><i
                                                            class="far fa-eye"></i></a></td>
                                            <td><a href="{{ route('admin.fertilizer.edit', $fertilizer_search->id) }}"
                                                   class="text-success"><i class="fas fa-pencil-alt"></i></a></td>

                                            <td>
                                                <form action="{{route('admin.fertilizer.delete', $fertilizer_search->id)}}"
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

                    <div class="form-group mr-3 ml-5">
                        <form action="{{ route('admin.fertilizer.index') }}" method="post">
                            @csrf
                            @method('get')

                            <div class="form-group ">
                                {{--<label>Название</label>--}}
                                <input type="hidden" class="form-control" name="name"
                                       value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Сбросить фильтр">
                            </div>
                        </form>
                    </div>


                    <div style="width: 800px; margin: 50px 0 0 0px; text-align: center ">
                        <h4> Фильтр по удобрениям:</h4>
                    </div>
                    <div class="wrapper d-flex align-content-start" style="margin: 50px 300px 0 100px;">
                        {{--  <div class="d-flex --}}{{--align-content-start--}}{{-- flex-wrap " style="width: 1000px;">--}}
                        <div class="wrapper_del_fert mt-1"
                             style="width: 400px; height: 400px; border: solid 1px darkred; ">

                            <h5 class="m-0 text-center ml-1">Удобрения, удаленные из таблицы удобрений:</h5>

                            {{--  <div class="row" style="max-width: 510px; width: 100%;">--}}
                            <div class="ml-5 col-9 ">
                                <div class="card col-12 mt-3 " style="margin-right: 5px;  ">
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
                        </div> {{--wrapper deleted fertilizers--}}

                        <div class="wrapper_filters d-flex flex-wrap ">

                            <div {{--class="col-4"--}} style=" border: solid 1px red; margin: 5px">
                                <div class="form-group mr-3">
                                    <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                        @csrf
                                        @method('get')

                                        <div class="form-group ">
                                            <label>Название</label>
                                            <input type="text" class="form-control" name="name"
                                                   placeholder="Название удобрения"
                                                   value="{{old('name')}}">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Применить фильтр">
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div {{--class="col-4"--}} style=" border: solid 1px red; margin: 5px">
                                <div class="form-group mr-3">
                                    <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                        @csrf
                                        @method('get')

                                        <div class="form-group ">
                                            <label>Назначение</label>
                                            <input type="text" class="form-control" name="destination"
                                                   placeholder="Назначение" value="{{old('destination')}}">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Применить фильтр">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div {{--class="col-5"--}} style=" border: solid 1px red; margin: 5px">
                                <div class="form-group mr-3">
                                    <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                        @csrf
                                        @method('get')
                                        <div class="form-group ">
                                            <label>Описание</label>
                                            <input type="text" class="form-control" name="description"
                                                   placeholder="Описание удобрения" value="{{old('description')}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Применить фильтр">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div {{--class="col-5"--}} style=" border: solid 1px red; margin: 5px">
                                <div class="form-group mr-3">
                                    <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                        @csrf
                                        @method('get')
                                        <div class="form-group ">
                                            <label>Норма азота "от"</label>
                                            <input type="number" class="form-control" name="nitrogen_rate_from"
                                                   placeholder="Норма азота 'от'" value="{{old('nitrogen_rate_from')}}">
                                        </div>
                                        <div class="form-group ">
                                            <label>Норма азота "до"</label>
                                            <input type="number" class="form-control" name="nitrogen_rate_to"
                                                   placeholder="Норма азота 'до'" value="{{old('nitrogen_rate_to')}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Применить фильтр">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div {{--class="col-5"--}} style=" border: solid 1px red; margin: 5px">
                                <div class="form-group mr-3">
                                    <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                        @csrf
                                        @method('get')
                                        <div class="form-group ">
                                            <label>Норма фосфора "от"</label>
                                            <input type="number" class="form-control" name="phosphorus_rate_from"
                                                   placeholder="Норма фосфора 'от'"
                                                   value="{{old('phosphorus_rate_from')}}">
                                        </div>
                                        <div class="form-group ">
                                            <label>Норма фосфора "до"</label>
                                            <input type="number" class="form-control" name="phosphorus_rate_to"
                                                   placeholder="Норма фосфора 'до'"
                                                   value="{{old('phosphorus_rate_to')}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Применить фильтр">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div {{--class="col-5"--}} style=" border: solid 1px red; margin: 5px">
                                <div class="form-group mr-3">
                                    <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                        @csrf
                                        @method('get')
                                        <div class="form-group ">
                                            <label>Норма калия "от"</label>
                                            <input type="number" class="form-control" name="potassium_rate_from"
                                                   placeholder="Норма калия 'от'"
                                                   value="{{old('potassium_rate_from')}}">
                                        </div>
                                        <div class="form-group ">
                                            <label>Норма калия "до"</label>
                                            <input type="number" class="form-control" name="potassium_rate_to"
                                                   placeholder="Норма калия 'до'" value="{{old('potassium_rate_to')}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Применить фильтр">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div {{--class="col-5"--}} style=" border: solid 1px red; margin: 5px">
                                <div class="form-group mr-3">
                                    <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                        @csrf
                                        @method('get')
                                        <div class="form-group ">
                                            <label>стоимость "от"</label>
                                            <input type="number" class="form-control" name="price_from"
                                                   placeholder="стоимость 'от'" value="{{old('price_from')}}">
                                        </div>
                                        <div class="form-group ">
                                            <label>стоимость "до"</label>
                                            <input type="number" class="form-control" name="price_to"
                                                   placeholder="стоимость 'до'" value="{{old('price_to')}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Применить фильтр">
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div {{--class="col-5"--}} style=" border: solid 1px red; margin: 5px">
                                <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                    @csrf
                                    @method('get')
                                    <label>Группа культур, id</label>
                                    <select multiple class="form-control" name="culture_group_ids[]">
                                        @foreach($cultures as $culture)
                                            <option
                                                    @if(isset($data['culture_group_ids']))
                                                    @foreach($data['culture_group_ids'] as $culture_id)
                                                    {{ $culture_id == $culture->id ? 'selected' : '' }}
                                                    @endforeach
                                                    @endif
                                                    value="{{ $culture->id }}">{{ $culture->id }}</option>
                                        @endforeach
                                    </select>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Применить фильтр">
                                    </div>
                                </form>
                            </div>

                            <div {{--class="col-5"--}} style=" border: solid 1px red; margin: 5px">
                                <form action="{{ route('admin.fertilizer.index') }}" method="post">
                                    @csrf
                                    @method('get')
                                    <label>Район</label>
                                    <select multiple class="form-control" name="districts[]">
                                        @foreach($fertilizers as $fertilizer)
                                            <option
                                                    @if(isset($data['districts']))
                                                    @foreach($data['districts'] as $district)
                                                    {{ $district == $fertilizer->district ? 'selected' : '' }}
                                                    @endforeach
                                                    @endif
                                                    value="{{ $fertilizer->district }}">{{ $fertilizer->district }}</option>
                                        @endforeach
                                    </select>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Применить фильтр">
                                    </div>
                                </form>
                            </div>
                        </div>{{-- wrapper_filters--}}

                        {{--  </div>--}}{{-- d-flex--}}
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
