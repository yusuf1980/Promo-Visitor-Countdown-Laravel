@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('All Products') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('products.create') }}" class="btn btn-success my-2">Tambah Produk</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>HARGA</th>
                                        <!-- <th>STATUS</th>
                                        <th>FINISH TIME</th>
                                        <th>DIBUAT OLEH</th> -->
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($products as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td style="text-align: right">Rp. {{ number_format($item->price, 0, ",", ".") }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('products.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm mx-2">Edit</a>
                                                <form method="post" class="d-inline"
                                                    action="{{ route('products.destroy', [$item->id]) }}">
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

                            {{ $products->links() }}
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

