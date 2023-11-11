<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<div class="container">
    <h1>Create New Order</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createOrderModal">
        Create New Order
    </button>

    <!-- Modal -->
    <div class="modal fade" id="createOrderModal" tabindex="-1" role="dialog" aria-labelledby="createOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createOrderModalLabel">Create New Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('orderstore') }}">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <select name="customer_id" class="form-control">
                                @foreach ($customer as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kendaraan_id">Kendaraan</label>
                            <select name="kendaraan_id" class="form-control">
                                @foreach ($kendaraan as $item)
                                    <option value="{{ $item->id }}">{{ $item->model }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_order">Order Date</label>
                            <input type="date" name="tanggal_order" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Order</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <table class="table table-bordered" id="table-datatable">
        <thead>
            <tr>
                <th width="1%">No.</th>
                <th>Nama Customer</th>
                <th>Kendaraan</th>
                <th>Tanggal order</th>
                <th>Harga</th>
                <th class="text-center" width="10%">OPSI</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($order as $item)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $item->customer->nama }}</td>
                    <td>{{ $item->kendaraan->model }}, {{ $item->kendaraan->manufaktur }}, {{ $item->kendaraan->tahun }}</td>
                    <td>{{ $item->tanggal_order }}</td>
                    <td>Rp. {{ number_format($item->kendaraan->harga, 0, ',', '.') }}</td>
                    <td>

                        @if ($item->id != 0)
                            <div class="text-center">
                                <button type="button" class="btn btn-warning btn-sm"
                                    data-toggle="modal"
                                    data-target="#edit_customer_{{ $item->id }}">
                                    Edit
                                </button>

                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#hapus_customer_{{ $item->id }}">
                                    Delete
                                </button>
                            </div>
                        @endif

                        {{-- modal update --}}
                        <form action="{{ route('orderupdate', ['id' => $item->id]) }}"
                            method="post">
                            <div class="modal fade" id="edit_customer_{{ $item->id }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Order
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            @csrf
                                            {{ method_field('PUT') }}

                                            <div class="form-group" style="width:100%">

                                                <label>Kendaraan </label>
                                                <select name="order" class="form-control">
                                                    @foreach ($kendaraan as $item)
                                                        <option value="{{ $item->id }}">{{ $item->model }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal"><i
                                                    class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-paper-plane m-r-5"></i>
                                                Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- modal hapus -->
                        <form method="POST"
                            action="{{ route('customerdelete', ['id' => $item->id]) }}">
                            <div class="modal fade" id="hapus_customer_{{ $item->id }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Peringatan!
                                            </h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <p>Yakin ingin menghapus data ini?</p>

                                            @csrf
                                            {{ method_field('DELETE') }}


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal"><i
                                                    class="ti-close m-r-5 f-s-12"></i> Batal</button>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-paper-plane m-r-5"></i> Ya,
                                                Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
