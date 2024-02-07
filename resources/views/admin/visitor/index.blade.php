@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('All Visitors') }}</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>NO</th>
                                        <th>TANGGAL PROMO</th>
                                        <th>LAUNCH DATETIME</th>
                                        <th>IP ADDRESS</th>
                                        <th>DETAIL</th>
                                        {{-- <th>CREATED_AT</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($visitors as $item)
                                        <tr>
                                            <td>{{ $loop->iteration + ($visitors->currentPage() - 1) * $visitors->perPage() }}
                                            </td>
                                            <td>{{ $item->promo->date }}</td>
                                            <td>{{ $item->launch_date }}</td>
                                            <td class="text-center">{{ $item->ip }}</td>
                                            <td class="text-center">{{ $item->detail }}</td>
                                            {{-- <td>{{ $item->created_at }}</td> --}}
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="7">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $visitors->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
