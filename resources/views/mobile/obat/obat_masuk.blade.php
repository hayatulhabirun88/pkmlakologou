@extends('mobile.template')

@section('title', 'Obat Masuk - PKM Lakologou')

@section('title-header', 'Obat Masuk')

@section('content')
    <div class="page-content-wrapper py-3">
        <!-- Element Heading -->
        <div class="container">
            <div class="element-heading">
                <h6>Cari Obat</h6>
            </div>
        </div>

        @livewire('mobile.obat-masuk')
    @endsection
