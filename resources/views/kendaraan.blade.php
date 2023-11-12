@extends('home')
@section('content')

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
        <h3 class="col p-md-0">Kendaraan</h3>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header pt-4">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> &nbsp Tambah Kendaraan
                </button>
                <h4>Data Kendaraan</h4>
            </div>
            <div class="card-body pt-0">
                <!-- Modal -->
                <form action="{{ route('kendaraanstore') }}" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kendaraan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <label>Model</label>
                                        <input type="text" name="model" required="required" class="form-control" placeholder="Model">
                                        <label>Jenis</label> 
                                        <select name="jenis" required class="form-control" id="jenis">
                                            <option value="Mobil">Mobil</option>
                                            <option value="Motor">Motor</option>
                                            <option value="Truk">Truk</option>
                                        </select>
                                        <label>Tahun</label>
                                        <input type="text" name="tahun" required="required" class="form-control" placeholder="Tahun">
                                        <label>Jumlah Penumpang</label>
                                        <input type="text" name="jumlah_penumpang" required="required" class="form-control" placeholder="Jumlah penumpang">
                                        <label>Manufaktur</label>
                                        <input type="text" name="manufaktur" required="required" class="form-control" placeholder="Manufaktur">
                                        <label>Harga</label>
                                        <input type="number" name="harga" required="required" class="form-control" placeholder="Harga">
                                    </div>
                                    <div class="form-group" id="form-mobil" style="display: none;">
                                        <label for="bahan_bakar">Tipe Bahan Bakar</label>
                                        <input type="text" name="bahan_bakar" class="form-control" placeholder="Tipe Bahan Bakar">
                                        <label for="luas_bagasi">Luas Bagasi</label>
                                        <input type="text" name="luas_bagasi" class="form-control" placeholder="Luas Bagasi">
                                    </div>
                                    
                                    <div class="form-group" id="form-truk" style="display: none;">
                                        <label for="jumlah_roda">Jumlah Roda Ban</label>
                                        <input type="text" name="jumlah_roda" class="form-control" placeholder="Jumlah Roda">
                                        <label for="luas_kargo">Luas Area Kargo</label>
                                        <input type="text" name="luas_kargo" class="form-control" placeholder="Luas Area Kargo">
                                    </div>
                                    
                                    <div class="form-group" id="form-motor" style="display: none;">
                                        <label for="ukuran_bagasi">Ukuran Bagasi</label>
                                        <input type="text" name="ukuran_bagasi" class="form-control" placeholder="Ukuran Bagasi">
                                        <label for="kapasitas_bensin">Kapasitas Bensin</label>
                                        <input type="text" name="kapasitas_bensin" class="form-control" placeholder="Kapasitas Bensin">
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        <i class="ti-close m-r-5 f-s-12"></i> Tutup
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-paper-plane m-r-5"></i> Simpan
                                    </button>
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
                                <th>Model</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Jumlah Penumpang</th>
                                <th>Manufaktur</th>
                                <th>Harga</th>
                                <th class="text-center" width="10%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($kendaraan as $item)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $item->model }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->jumlah_penumpang }}</td>
                                    <td>{{ $item->manufaktur }}</td>
                                    <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($item->id != 0)
                                            <div class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#edit_kendaraan_{{ $item->id }}">Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#hapus_kendaraan_{{ $item->id }}">Delete
                                                </button>
                                            </div>
                                        @endif
                                        <!-- Modal update -->
                                        <form action="{{ route('kendaraanupdate', ['id' => $item->id]) }}" method="post">
                                            <div class="modal fade" id="edit_kendaraan_{{ $item->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kendaraan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            {{ method_field('PUT') }}
                                                            <div class="form-group" style="width:100%">
                                                                <label>Model</label>
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <input type="text" name="model" required="required" class="form-control"
                                                                    placeholder="{{ $item->model }}" value="{{ $item->model }}"
                                                                    style="width:100%">

                                                                    <label>Tahun</label>
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <input type="text" name="tahun" required="required" class="form-control"
                                                                    placeholder="{{ $item->tahun }}" value="{{ $item->tahun }}"
                                                                    style="width:100%">

                                                                    <label>Jumlah Penumpang</label>
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <input type="text" name="jumlah_penumpang" required="required" class="form-control"
                                                                    placeholder="{{ $item->jumlah_penumpang }}" value="{{ $item->jumlah_penumpang }}"
                                                                    style="width:100%">

                                                                    <label>Manufaktur</label>
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <input type="text" name="manufaktur" required="required" class="form-control"
                                                                    placeholder="{{ $item->manufaktur }}" value="{{ $item->manufaktur }}"
                                                                    style="width:100%">

                                                                    <label>Harga</label>
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <input type="text" name="harga" required="required" class="form-control"
                                                                    placeholder="{{ $item->harga }}" value="{{ $item->harga }}"
                                                                    style="width:100%">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                <i class="ti-close m-r-5 f-s-12"></i> Tutup
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-paper-plane m-r-5"></i> Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Modal hapus -->
                                        <form method="POST" action="{{ route('kendaraandelete', ['id' => $item->id]) }}">
                                            <div class="modal fade" id="hapus_kendaraan_{{ $item->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Yakin ingin menghapus data ini?</p>
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                <i class="ti-close m-r-5 f-s-12"></i> Batal
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-paper-plane m-r-5"></i> Ya, Hapus
                                                            </button>
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
<script>
    document.getElementById('jenis').addEventListener('change', function() {
        // Ambil nilai yang dipilih dalam dropdown "Jenis"
        var selectedJenis = this.value;

        // Sembunyikan semua form tambahan terlebih dahulu
        document.getElementById('form-mobil').style.display = 'none';
        document.getElementById('form-truk').style.display = 'none';
        document.getElementById('form-motor').style.display = 'none';

        // Tampilkan form tambahan sesuai dengan jenis yang dipilih
        if (selectedJenis === 'Mobil') {
            document.getElementById('form-mobil').style.display = 'block';
        } else if (selectedJenis === 'Truk') {
            document.getElementById('form-truk').style.display = 'block';
        } else if (selectedJenis === 'Motor') {
            document.getElementById('form-motor').style.display = 'block';
        }
    });
</script>
@endsection
