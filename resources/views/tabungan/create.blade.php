@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in! --}}
                    <form action=" {{ route('tabungan.store') }} " method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Pilih Nama Siswa</label>
                            </div>
                            <div class="col-md-8">
                                <select name="siswa_id" class="form-control">
                                @foreach ($data as $item)
                                <option value=" {{ $item->id }}" > {{ $item->nama }} - {{ $item->kelas}}
                                @endforeach
                                </select>
                            </option>
                            </div>
                            <div class="col-md-4">
                                <label for="">Masukkan Jumlah Uang</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" name="jumlah_uang" classs="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection