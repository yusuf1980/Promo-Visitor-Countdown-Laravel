@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Semua Pembelian') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    <a href="{{ route('social-proofs.create') }}" class="btn btn-success my-2">Tambah Pembeli</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>STATUS</th>
                                    <th>PRODUK</th>
                                    <th>TANGGAL DIBUAT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($socialProofs as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration + ($socialProofs->currentPage() - 1) * $socialProofs->perPage() }}
                                        </td>
                                        <td>{{ $item->purchased_at }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class="text-center">{{ $item->status ? 'Tampil' : 'Tidak Tampil' }}</td>
                                        <td>{{ $item->product }}</td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('social-proofs.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm mx-2">Edit</a>
                                            <form method="post" class="d-inline"
                                                action="{{ route('social-proofs.destroy', [$item->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="btnDelete()"
                                                    class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="8">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $socialProofs->links() }}
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