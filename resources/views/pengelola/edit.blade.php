@extends('pengelola.layouts.base')
@section('edit-barang')
    <section class="container">
        <div class="item">
            <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="merek">Merek</label>
                <input type="text" name="merek" value="{{ $barang->merek }}" required>

                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" value="{{ $barang->gambar }}" required>

                <label for="harga">Harga</label>
                <input type="number" name="harga" value="{{ $barang->harga }}" required>

                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" value="{{ $barang->deskripsi }}" required>

                <input type="submit" value="Update">
            </form>
        </div>
    </section>
@endsection
