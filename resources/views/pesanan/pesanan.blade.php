@extends('pesanan.layouts.base')
@section('pesanan')
<!-- Tabel untuk menampilkan daftar pesanan -->
<div class="container-pesanan">
    <table border="1">
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>ID Barang</th>
            <th>Merek</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Alamat</th>
            <th>Tanggal Dibuat</th>
            <th>Tanggal Diperbarui</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesanan as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->barang_id }}</td>
            <td>{{ $item->item->merek }}</td>
            <td>{{ $item->item->harga }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
