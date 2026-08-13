@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <!-- Header Dashboard & Tombol Logout -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-0">Dashboard</h1>
            <p class="text-muted mb-0">
                Sistem Informasi Inventaris Aset Sekolah
            </p>
        </div>

        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
        </form>
    </div>

    <div class="row">

        {{-- BARANG --}}
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Total Barang</h6>
                            <h2>0</h2>
                        </div>

                        <div>
                            <i class="bi bi-box-seam fs-1"></i>
                        </div>
                    </div>

                    <a href="{{ route('barang.index') }}"
                       class="btn btn-sm btn-primary mt-2">
                        Lihat Barang
                    </a>

                </div>
            </div>
        </div>


        {{-- KATEGORI --}}
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Kategori</h6>
                            <h2>0</h2>
                        </div>

                        <div>
                            <i class="bi bi-tags fs-1"></i>
                        </div>
                    </div>

                    <a href="{{ route('kategori.index') }}"
                       class="btn btn-sm btn-primary mt-2">
                        Lihat Kategori
                    </a>

                </div>
            </div>
        </div>


        {{-- STOK --}}
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Stok</h6>
                            <h2>0</h2>
                        </div>

                        <div>
                            <i class="bi bi-stack fs-1"></i>
                        </div>
                    </div>

                    <a href="{{ route('stok.index') }}"
                       class="btn btn-sm btn-primary mt-2">
                        Lihat Stok
                    </a>

                </div>
            </div>
        </div>


        {{-- PENGAJUAN --}}
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <div>
                            <h6>Pengajuan</h6>
                            <h2>0</h2>
                        </div>

                        <div>
                            <i class="bi bi-clipboard-check fs-1"></i>
                        </div>
                    </div>

                    <a href="{{ route('pengajuan.index') }}"
                       class="btn btn-sm btn-primary mt-2">
                        Lihat Pengajuan
                    </a>

                </div>
            </div>
        </div>

    </div>


    {{-- MENU --}}
    <div class="card">

        <div class="card-body">

            <h5 class="mb-3">
                Menu Inventaris
            </h5>

            <div class="row">

                <div class="col-md-4 mb-3">
                    <a href="{{ route('barang.index') }}"
                       class="btn btn-outline-primary w-100">
                        <i class="bi bi-box-seam"></i>
                        Data Barang
                    </a>
                </div>

                <div class="col-md-4 mb-3">
                    <a href="{{ route('kategori.index') }}"
                       class="btn btn-outline-primary w-100">
                        <i class="bi bi-tags"></i>
                        Data Kategori
                    </a>
                </div>

                <div class="col-md-4 mb-3">
                    <a href="{{ route('stok.index') }}"
                       class="btn btn-outline-primary w-100">
                        <i class="bi bi-stack"></i>
                        Data Stok
                    </a>
                </div>

                <div class="col-md-4 mb-3">
                    <a href="{{ route('pengajuan.index') }}"
                       class="btn btn-outline-primary w-100">
                        <i class="bi bi-clipboard-check"></i>
                        Pengajuan
                    </a>
                </div>

                <div class="col-md-4 mb-3">
                    <a href="{{ route('penyusutan.index') }}"
                       class="btn btn-outline-primary w-100">
                        <i class="bi bi-graph-down"></i>
                        Penyusutan
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection