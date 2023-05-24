@extends('pengelola.layouts.base')
@section('input')
    <section>
    <form action="{{ route('input.store') }}" method="POST">
        @csrf
        <label for="merek">Merek</label>
        <input type="text" name="merek" id="merek">

        <label for="gambar">Gambar</label>
        <input type="text" name="gambar" id="gambar">

        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga">

        <label for="deskripsi">Deskripsi</label>
        <input type="text" name="deskripsi" id="deskripsi">

        <input type="submit" value="Submit">
    </form>
</section>
@endsection
