@extends('profile.layouts.base')
@section('ubah')
    <div class="container py-5">
        <div class="box-base-ubah">
            <div class="box-ubah">
                <form action="">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="nomor_hp">Nomor Hp</label>
                        <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" placeholder="Nomor Hp">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
                    </div>
                    <button type="submit">UBAH</button>
                </form>
            </div>
        </div>
    </div>
@endsection
