@extends('layouts.app')

@push('css')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit Promo') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="g-3 mx-3 row" method="post" action="{{ route('promos.update', $item->id) }}">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                                @include('components.date', [
                                    'title' => 'Tanggal',
                                    'name' => 'date',
                                    'type' => 'text',
                                    'id' => 'tanggal',
                                    'item' => $item->date,
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.select', [
                                    'title' => 'Status',
                                    'name' => 'status',
                                    'data' => [
                                        'Aktif' => 1,
                                        'Tidak Aktif' => 0,
                                    ],
                                    'item' => $item->status,
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.text', [
                                    'title' => 'Diskon (%)',
                                    'name' => 'discount',
                                    'type' => 'number',
                                    'item' => $item->discount
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.text', [
                                    'title' => 'Selesai (Jam)',
                                    'name' => 'finish_time',
                                    'type' => 'number',
                                    'item' => $item->finish_time
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.text', [
                                    'title' => 'Kode Promo',
                                    'name' => 'code',
                                    'type' => 'text',
                                    'item' => $item->code
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.select', [
                                    'title' => 'Produk',
                                    'name' => 'product',
                                    'data' => $products,
                                    'item' => $item->product,
                                ])
                            </div>
                            <div class="col-md-12 py-4 text-center">
                                <button type="submit" class="btn btn-success btn-block">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#tanggal').datepicker({
            format: 'dd-mm-yyyy',
            orientation: "bottom left",
        });
    </script>
@endpush
