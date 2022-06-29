<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Импорт из файла "эксель"</div>

                <div class="card-body">

                    <form action="{{ route('admin.fertilizer.index') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('get')
                        <div class="form-group">
                            <input type="file" name="import_file">

                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                    </button>
                </div>
            </div>
        </div>
    </div>

