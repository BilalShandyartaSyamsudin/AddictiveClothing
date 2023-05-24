@extends('pengelola.layouts.base')
@section('barang')
    <section class="container">
        <div class="item">
            <table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Merek</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Created At</th>
                        <th>Update At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $barang->id_barang }}</td>
                            <td>{{ $barang->merek }}</td>
                            <td>{{ $barang->gambar }}</td>
                            <td>{{ $barang->harga }}</td>
                            <td>{{ $barang->deskripsi }}</td>
                            <td>{{ $barang->created_at }}</td>
                            <td>{{ $barang->updated_at }}</td>
                            <td>
                               <a href="{{ route('barang.edit', $barang->id_barang) }}">Edit</a>
                                <form action="{{ route('barang.delete', $barang->id_barang) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
