@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('All Promo') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('promos.create') }}" class="btn btn-success my-2">Tambah Promo</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>NO</th>
                                        <th>TANGGAL</th>
                                        <th>DISCOUNT</th>
                                        <th>STATUS</th>
                                        <th>FINISH TIME</th>
                                        <th>DIBUAT OLEH</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($promos as $item)
                                        <tr>
                                            <td>{{ $loop->iteration + ($promos->currentPage() - 1) * $promos->perPage() }}
                                            </td>
                                            <td>{{ $item->date }}</td>
                                            <td class="text-center">{{ $item->discount }}</td>
                                            <td class="text-center">{{ $item->status?'Aktif':'Tidak Aktif' }}</td>
                                            <td class="text-center">{{ $item->finish_time }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('promos.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm mx-2">Edit</a>
                                                <form method="post" class="d-inline"
                                                    action="{{ route('promos.destroy', [$item->id]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="btnDelete()"
                                                        class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="7">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $promos->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function btnDelete() {
        event.preventDefault()
        var form = event.target.form; // storing the form
        Swal.fire({
            title: 'Anda yakin?',
            text: "Anda tidak akan dapat mengembalikannya!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Batalkan',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    }
</script>
@endpush

