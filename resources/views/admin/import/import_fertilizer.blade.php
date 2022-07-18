@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
                            <div class="card-body col-5 ml-3" style="border: solid 1px darkred">
                      {{--  @if (session('status'))
                            <div class="alert alert-success col-5" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif--}}
                        <form action="{{route('import_fertilizer.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                    @method('get')
                            <div class="form-group">
                                <input type="file" name="import_file">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Импорт</button>
                            </div>
                            @error('import_file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                        </button>
                    </div>

        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Статус</th>
                <th scope="col">id юзера</th>
                <th scope="col">Дата создания статуса</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($import_status))
                             @foreach($import_status as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->users_id}}</td>
                <td>{{$item->created_at}}</td>
                            </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">Данные не найдены </td>
                </tr>
            @endif

            </tbody>
        </table>
    </div>
       @endsection