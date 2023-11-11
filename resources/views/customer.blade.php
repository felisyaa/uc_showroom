<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<div class="content-body">

    <div class="row page-titles mx-0 mt-2">

        <h3 class="col p-md-0">Customer</h3>

    </div>

    <div class="container-fluid">

        <div class="card">

            <div class="card-header pt-4">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fa fa-plus"></i> &nbsp Tambah Customer
                </button>
                <h4>Data Customer</h4>

            </div>
            <div class="card-body pt-0">

                <!-- Modal -->
                <form action="{{ route('customerstore') }}" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    @csrf
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" required="required" class="form-control"
                                            placeholder="Nama">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" required="required" class="form-control"
                                            placeholder="Alamat">
                                        <label>Telpon</label>
                                        <input type="text" name="telpon" required="required" class="form-control"
                                            placeholder="telpon">
                                        <label>Id Card</label>
                                        <input type="text" name="id_card" required="required" class="form-control"
                                            placeholder="ID Card">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                            class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa fa-paper-plane m-r-5"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <div class="table-responsive">


                    <table class="table table-bordered" id="table-datatable">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th>Nama Customer</th>
                                <th>Alamat</th>
                                <th>Telpon</th>
                                <th>ID Card</th>
                                <th class="text-center" width="10%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($customer as $item)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->telpon }}</td>
                                    <td>{{ $item->id_card }}</td>
                                    <td>

                                        @if ($item->id != 0)
                                            <div class="text-center">
                                                <button type="button" class="btn btn-default btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#edit_customer_{{ $item->id }}">
                                                    <i class="fa fa-cog"></i>
                                                </button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#hapus_customer_{{ $item->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        @endif

                                        {{-- modal update --}}
                                        <form action="{{ route('customerupdate', ['id' => $item->id]) }}"
                                            method="post">
                                            <div class="modal fade" id="edit_customer_{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit customer
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
                                                                <label>Nama </label>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <input type="text" name="nama"
                                                                    required="required" class="form-control"
                                                                    placeholder={{ $item->nama }}
                                                                    value="{{ $item->customer }}" style="width:100%">

                                                                <label>Alamat </label>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <input type="text" name="alamat"
                                                                    required="required" class="form-control"
                                                                    placeholder={{ $item->alamat }}
                                                                    value="{{ $item->customer }}" style="width:100%">

                                                                <label>Telpon </label>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <input type="text" name="telpon"
                                                                    required="required" class="form-control"
                                                                    placeholder={{ $item->telpon }}
                                                                    value="{{ $item->customer }}" style="width:100%">

                                                                <label>ID Card </label>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <input type="text" name="id_card"
                                                                    required="required" class="form-control"
                                                                    placeholder={{ $item->id_card }}
                                                                    value="{{ $item->customer }}" style="width:100%">
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
            </div>

        </div>

    </div>
</div>

</html>
