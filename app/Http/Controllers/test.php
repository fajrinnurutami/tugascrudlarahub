@extends('layouts.index')
@section('content')
@php
     $ar_gender = ['Laki-Laki' => 'L', 'Perempuan' => 'P'];
     $rs = App\Anggota::all()
@endphp

<h3>Form Input Anggota</h3>
<form class="user" method="POST" action="{{ route('anggota.store')}}"
      enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" name="no_anggota" class="form-control form-control-user @error ('no_anggota') is-invalid @enderror"
         placeholder="No Anggota" value="{{ old('no_anggota') }}">
     @error('no_anggota')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
        <input type="text" name="nama" class="form-control form-control-user @error ('nama') is-invalid @enderror"
         placeholder="Nama" value="{{ old('nama') }}">
    @error('nama')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <!-- Default inline 1-->
    <label>Jenis Kelamin</label> &nbsp;&nbsp;
    @foreach ($ar_gender as $label => $jk)
    @php
    $cek = (old('gender') ==  $jk) ? 'checked' : '' 
    @endphp
    <div class="form-check form-check-inline">
      <input type="radio" {{ $cek }}  class="form-check-input @error ('gender') is-invalid @enderror"
      name="gender" value="{{ $jk }}">
      <label class="form-check-label">{{ $label }}</label>  
    </div>
    @error('gender')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
      @endforeach
      
    

    <div class="form-group">
      <input type="text" class="form-control form-control-user @error ('tmp_lahir') is-invalid @enderror"
         name="tmp_lahir" placeholder="Tempat Lahir" value="{{ old('tmp_lahir') }}">
    @error('tmp_lahir')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
      <label  class="col-form-label">Tanggal Lahir</label>
      <input type="date" name="tgl_lahir" class="form-control form-control-user @error ('tgl_lahir') is-invalid @enderror"
      value="{{ old('tgl_lahir') }}">
      @error('tgl_lahir')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <textarea name="alamat"  cols="30" rows="3" style="resize:none"
      class="form-control @error ('alamat') is-invalid @enderror" 
      placeholder="Alamat">
      {{ old('alamat') }}
      </textarea>
      @error('alamat')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <input type="text" class="form-control form-control-user @error ('email') is-invalid @enderror"
         name="email" placeholder="Email" value="{{ old('email') }}">
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>


    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user @error ('no_hp') is-invalid @enderror"
         name="no_hp" placeholder="No Handphone" value="{{ old('no_hp') }}">
         @error('no_hp')
         <div class="invalid-feedback">{{ $message }}</div>
         @enderror
         
      </div>
      <div class="col-sm-6">
        <div class="custom-file">
          <input type="file" name="foto" class="custom-file-input @error ('foto') is-invalid @enderror">
          <label class="custom-file-label">Choose photo</label>
          @error('foto')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>
    <center>
    <button type="submit" name="proses" value="simpan" class="btn btn-primary btn-lg">
      Simpan
      <i class="far fa-save"></i> 
    </button>
  </center>
  </form>
@endsection