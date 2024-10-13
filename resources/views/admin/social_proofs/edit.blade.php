@extends('layouts.app')

@push('css')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit Pembeli') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="g-3 mx-3 row" method="post" action="{{ route('social-proofs.update', [$socialProof->id]) }}">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                                @include('components.date', [
                                    'title' => 'Tanggal',
                                    'name' => 'purchased_at',
                                    'type' => 'text',
                                    'id' => 'tanggal',
                                    'item' => $socialProof->purchased_at,
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.text', [
                                    'title' => 'Nama',
                                    'name' => 'name',
                                    'type' => 'text',
                                    'id' => 'name',
                                    'item' => $socialProof->name,
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('components.text', [
                                    'title' => 'Email',
                                    'name' => 'email',
                                    'type' => 'email',
                                    'id' => 'email',
                                    'item' => $socialProof->email,
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
                                    'item' => $socialProof->status,
                                ])
                            </div>
                            <div class="col-md-12">
                                @include('components.select', [
                                    'title' => 'Produk',
                                    'name' => 'product',
                                    'data' => $products,
                                    'item' => $socialProof->product,
                                ])
                            </div>
                            <div class="col-md-12 py-4 text-center">
                                <button type="submit" class="btn btn-success btn-block">Perbarui</button>
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
