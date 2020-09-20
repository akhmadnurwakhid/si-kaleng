@extends('layouts.app')
@section('title','Edit Penerimaan')
@section('page-heading','Edit Penerimaan')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penerimaan</h6>
            </div>

            <div class="card-body">
                    @if (session()->has('pesan'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                <form action="{{route('penerimaan.update', $penerimaan->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="kaleng_id">No Register</label>
                        <select class="form-control" id="kaleng_id" name="kaleng_id">
                            @forelse ($munfik as $item)
                                <option value="{{$item->kaleng->id}}" {{ (old('kaleng_id') ?? $item->kaleng->id) == $item->kaleng_id ? 'selected': ''}}>{{ $item->kaleng->no_register }}</option>
                            @empty
                                <option value="">tidak ada data</option>
                            @endforelse
                        </select>
                        @error('kaleng_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        @php

                        @endphp
                        <select name="bulan" id="bulan" class="form-control">
                            @foreach ($bulan as $item)
                                <option value="{{$item}}" {{ (old('bulan') ?? $penerimaan->bulan) == $item ? 'selected': ''}}>{{$item}}</option>
                            @endforeach
                        </select>
                        @error('bulan')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" id="tahun" value="{{old('tahun') ?? $penerimaan->tahun}}">
                        @error('tahun')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" value="{{old('jumlah') ?? $penerimaan->jumlah}}">
                        @error('jumlah')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
