@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
                    <div class="card-body col-5 ml-3" style="border: solid 1px darkred">
                        @if (session('status'))
                            <div class="alert alert-success col-5" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('import_fertilizer.index') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('get')
                            <div class="form-group">
                                <input type="file" name="import_file">

                                <button type="submit" class="btn btn-primary">Импорт</button>
                            </div>
                        </form>
                        </button>
                    </div>
    </div>

       @endsection