@extends('pesanan.layouts.base')
@section('pesanan')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Pesanan Anda</h2>
            </div>

        </div>
    </section>
        <div class="container-pesanan">
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th>Merek</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        {{-- <th>Bayar</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $item)
                        <tr>
                            <td>{{ $item->item->merek }}</td>
                            <td>{{ $item->item->harga }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->status }}</td>
                            {{-- <td><a class="btn btn-success" href="{{ route('bayar', ['id' => $item->id]) }}">Bayar</a></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
