@extends('dashboard')

@section('main-content')
    
    <a href="{{ route('pegawai.index') }}" class="h3 text-secondary"><i class="fa fa-angle-left"></i></a>
    

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <div class="card mb-3">
        <div class="card-header border-0">
            <div class="card-title text-center">
                <h3 for="foto" class="font-weight-bold h3">Foto</h3>
            </div><hr>
            <div class="card-profile-image">
                <img alt="" class="rounded" id="display_foto"
                    @if ($pegawai->foto) src="{{ asset('storage/' . $pegawai->id . '/' . $pegawai->foto) }}"
                @else
                src="{{ asset('img/default_profile.jpg') }}" @endif>
                @if ($pegawai->foto)
                    <form action="{{ route('pegawai.deleteFoto', $pegawai->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn btn-danger"onclick="return confirm('Anda Yakin Hapus Foto?')">Hapus Foto</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Detail Informasi</h3>
        </div>
        <div class="row mx-3 justify-content-between">
            <div class="col-md-4 ">
                <table class="table">
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td>{{ $pegawai->nip }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $pegawai->gelar_d . ' ' . $pegawai->nama . ' ' . $pegawai->gelar_b }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ $pegawai->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $pegawai->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ $pegawai->agama }}</td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>:</td>
                        <td>{{ $pegawai->no_telp }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $pegawai->email }}</td>
                    </tr>
                    <tr>
                        <td>Bidang</td>
                        <td>:</td>
                        <td>{{ $pegawai->bidang }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ $pegawai->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Golongan</td>
                        <td>:</td>
                        <td>{{ $pegawai->golongan }}</td>
                    </tr>
                    <tr>
                        <td>Eselon</td>
                        <td>:</td>
                        <td>
                            @if ($pegawai->eselon)
                                {{ $pegawai->eselon }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td>{{ $pegawai->pendidikan }}</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td>:</td>
                        <td>
                            @if ($pegawai->unit_kerja)
                                {{ $pegawai->unit_kerja }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <a href="{{ route('pegawai.edit', ['id' => $pegawai->id]) }}" class="btn btn-primary">Edit
                                Data</a>
                        </td>
                    </tr>
                </table>

            </div>
            {{-- Preview Berkas --}}
            <div class="col-md-6">
                <div class="card-body">
                    <h3>Lihat Berkas :</h3>
                    <ul>
                        <li>
                            @if ($pegawai->sk_cpns)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->sk_cpns) }}')">SK
                                    CPNS</a>
                            @else
                                <span class="text-danger">SK CPNS belum diunggah.</span>
                            @endif
                        </li>
                        <li>
                            @if ($pegawai->sk_pns)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->sk_pns) }}')">SK
                                    CPNS</a>
                            @else
                                <span class="text-danger">SK PNS belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->sk_pelantikan)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->sk_pelantikan) }}')">SK
                                    Pelantikan</a>
                            @else
                                <span class="text-danger">SK Pelantikan belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->sk_penempatan)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->sk_penempatan) }}')">SK
                                    Penempatan</a>
                            @else
                                <span class="text-danger">SK Penempatan belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->sk_jabatan)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->sk_jabatan) }}')">SK
                                    Jabatan</a>
                            @else
                                <span class="text-danger">SK Jabatan belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->npwp)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->npwp) }}')">NPWP</a>
                            @else
                                <span class="text-danger">NPWP belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->kgb)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->kgb) }}')">KGB</a>
                            @else
                                <span class="text-danger">KGB belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->kp)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->kp) }}')">KP</a>
                            @else
                                <span class="text-danger">KP belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->bpjs)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->bpjs) }}')">BPJS</a>
                            @else
                                <span class="text-danger">BPJS belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->kk)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->kk) }}')">KK</a>
                            @else
                                <span class="text-danger">KK belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->skp)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->skp) }}')">SKP</a>
                            @else
                                <span class="text-danger">SKP belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->ijazah)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->ijazah) }}')">Ijazah</a>
                            @else
                                <span class="text-danger">Ijazah belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                        <li>
                            @if ($pegawai->dpl)
                                <a href="#"
                                    onclick="showPreview('{{ asset('storage/' . $pegawai->id . '/' . $pegawai->dpl) }}')">DPL</a>
                            @else
                                <span class="text-danger">DPL belum diunggah.</span>
                            @endif
                            </a>
                        </li>
                    </ul>
                    <a href="{{ route('pegawai.edit', ['id' => $pegawai->id]) }}" class="h4">Unggah/Edit file</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Lihat Berkas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="previewImage" src="" alt="Gambar Pratinjau" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <a id="downloadLink" href="#" class="btn btn-primary" download>Download</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Fungsi untuk menampilkan modal dan mengatur pratinjau gambar
        function showPreview(imageSrc) {
            var modal = $('#previewModal');
            var modalImage = modal.find('#previewImage');

            // Mengatur atribut src gambar pada modal
            modalImage.attr('src', imageSrc);

            // Mendapatkan dimensi gambar
            var image = new Image();
            image.src = imageSrc;
            image.onload = function() {
                // Mengatur ukuran modal sesuai dengan dimensi gambar
                modal.find('.modal-dialog').css({
                    'max-width': image.width + 'px',
                    'max-height': image.height + 'px'
                });

                // Menampilkan modal
                modal.modal('show');
            };

            // Mengatur tautan "Download" untuk mengunduh file
            var downloadLink = modal.find('#downloadLink');
            downloadLink.attr('href', imageSrc);
            downloadLink.attr('download', ''); // Menandai tautan sebagai tautan unduhan
        }
    </script>
@endsection
