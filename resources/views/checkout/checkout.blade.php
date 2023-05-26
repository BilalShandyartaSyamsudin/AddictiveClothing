@extends('checkout.layouts.base')
@section('checkout')
    <section>
        <div class="box-checkout">
            <h1 class="title-checkout">CHECKOUT</h1>
            <div class="column-checkout">
                <div class="img-produk">
                    <img src="{{ asset('frontend/assets/img/produk/' . $barang->gambar) }}" alt="" srcset="">
                </div>
                <div class="row-checkout">
                    {{-- Merek Baju --}}
                    <h4>{{ $barang->merek }}</h4>
                    {{-- Deskripsi Baju --}}
                    <h6>{{ $barang->deskripsi }}</h6>
                    <div class="quantity-checkout">
                        <h6>Quantity</h6>
                        {{-- Button Untuk Tambah Quantity --}}
                        <button class="btn-quantity" id="btn-plus">
                            <i class="fa-sharp fa-solid fa-plus"></i>
                        </button>
                        <h6 id="quantity">1</h6>
                        {{-- Button Untuk Mengurangi Quantity --}}
                        <button class="btn-quantity" id="btn-minus">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-pembayaran">
                    <h1>Pembayaran</h1>
                    <div class="column-pembayaran">
                        <div class="subtitle-pembayaran">
                            <h6>HARGA</h6>
                            <h6>QUANTITY</h6>
                            <h6>TOTAL</h6>
                        </div>
                        <div class="harga">
                            {{-- Nilai Harga --}}
                            <h6>Rp. {{ $barang->harga }}</h6>
                            <h6 id="quantity-total">1</h6>
                            {{-- Total dengan format ribuan --}}
                            <h6 id="total">Rp. {{ number_format($barang->harga, 0, ',', '.') }}.000</h6>
                        </div>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="barang_id" value="{{ $barang->id_barang }}">
                        <button type="submit" class="btn btn-warning">CHECKOUT</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Dapatkan elemen tombol plus dan minus
        const btnPlus = document.getElementById('btn-plus');
        const btnMinus = document.getElementById('btn-minus');

        // Dapatkan elemen quantity dan total
        const quantityElem = document.getElementById('quantity');
        const totalElem = document.getElementById('total');
        const hargaBarang = {{ $barang->harga }};

        // Tambahkan event listener untuk tombol plus
        btnPlus.addEventListener('click', function() {
            let quantity = parseInt(quantityElem.innerText);
            quantity += 1;
            quantityElem.innerText = quantity;
            totalElem.innerText = 'Rp. ' + formatRibuan(hargaBarang * quantity)+'.000';
        });

        // Tambahkan event listener untuk tombol minus
        btnMinus.addEventListener('click', function() {
            let quantity = parseInt(quantityElem.innerText);
            if (quantity > 1) {
                quantity -= 1;
                quantityElem.innerText = quantity;
                totalElem.innerText = 'Rp. ' + formatRibuan(hargaBarang * quantity)+'.000';
            }
        });

        // Fungsi untuk format ribuan
        function formatRibuan(angka) {
            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>
@endsection
