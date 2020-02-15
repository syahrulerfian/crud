@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Hobi</div>
                <div class="card-body">
                    <form action=" {{ route('hobi.update', $hobi->id) }} " method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="">Masukkan Jenis Hobi</label>
                                <input type="text" class="form-control" value="{{$hobi->hobi}}" name="hobi" required>
                            </div>

                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection