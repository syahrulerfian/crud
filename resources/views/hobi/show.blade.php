@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hobi</div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="">Jenis Hobi</label>
                            <input type="text" class="form-control" value="{{$hobi->hobi}}" name="hobi" readonly>
                        </div>
                            <a class="btn btn-primary" href="{{ route('hobi.index') }}">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection