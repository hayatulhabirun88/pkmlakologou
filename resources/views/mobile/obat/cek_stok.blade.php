@extends('mobile.template')

@section('title', 'Cek Stok Obat - PKM Lakologou')

@section('title-header', 'Cek Stok Obat')

@section('content')
    <div class="page-content-wrapper py-3">
        <!-- Element Heading -->
        <div class="container">
            <div class="element-heading">
                <h6>Cari Obat</h6>
            </div>
        </div>

        @livewire('obat.cek-stok')
    @endsection
