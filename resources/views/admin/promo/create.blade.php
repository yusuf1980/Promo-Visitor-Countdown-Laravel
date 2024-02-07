@extends('layouts.app')

@push('css')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Create Promo') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="g-3 mx-3 row" method="post" action="{{ route('promos.store') }}">
                            @csrf
                            @method('post')
                            <div class="col-md-6">
                                @include('components.date', [
                                    'title' => 'Tanggal',
                                    'name' => 'date',
                                    'type' => 'text',
                                    'id' => 'tanggal',
                                    'item' => date('d-m-Y'),
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
                                    'item' => 1,
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.text', [
                                    'title' => 'Diskon (%)',
                                    'name' => 'discount',
                                    'type' => 'number',
                                    'item' => 90
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.text', [
                                    'title' => 'Selesai (Jam)',
                                    'name' => 'finish_time',
                                    'type' => 'number',
                                    'item' => 6
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
