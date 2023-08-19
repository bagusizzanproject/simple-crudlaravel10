@extends('dashboard')
@section('main-content')
    <div class="card p-3">
        <div class="card-title">
            <div class="d-flex justify-content-between">
                <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
                <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah</a>
            </div>
        </div>
        <!-- Main Content goes here -->


        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-bordered table-striped table-hover">
            <input type="text" id="searchInput" placeholder="Cari Nama/NIP" class="form-control mb-2">

            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Golongan</th>
                    <th>Unit Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pegawais as $pegawai)
                    <tr class="text-center">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td class="nama">{{ $pegawai->gelar_d . ' ' . $pegawai->nama . ', ' . $pegawai->gelar_b }}</td>
                        <td class="nip">{{ $pegawai->nip }}</td>
                        <td>{{ $pegawai->jabatan ?: '-' }}</td>
                        <td>{{ $pegawai->golongan ?: '-' }}</td>
                        <td>{{ $pegawai->unit_kerja ?: '-' }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('pegawai.show', ['id' => $pegawai->id]) }} }}"
                                    class="btn btn-sm btn-secondary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('pegawai.edit', ['id' => $pegawai->id]) }}"
                                    class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></i></a>
                                <form action="{{ route('pegawai.destroy', ['id' => $pegawai->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure to delete this?')"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="7">Belum ada data yang ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div id="noDataFound" class="alert alert-info" style="display: none">
            Data tidak ditemukan.
        </div>
    </div>

    <script>
        // Ambil elemen input search
        const searchInput = document.getElementById('searchInput');

        // Tambahkan event listener untuk event input pada input search
        searchInput.addEventListener('input', function() {
            // Ambil nilai dari input search
            const searchTerm = searchInput.value.toLowerCase();

            // Ambil semua elemen baris dari tabel (tbody)
            const rows = document.querySelectorAll('tbody tr');

            // Iterasi melalui semua elemen baris
            rows.forEach(row => {
                // Ambil data nama dan NIP dari kolom yang sesuai
                const nama = row.querySelector('.nama').textContent.toLowerCase();
                const nip = row.querySelector('.nip').textContent.toLowerCase();

                // Periksa apakah nilai pencarian cocok dengan nama atau NIP
                if (nama.includes(searchTerm) || nip.includes(searchTerm)) {
                    row.style.display = 'table-row'; // Tampilkan baris
                    found = true; // Set variabel found menjadi true jika ada hasil pencarian
                } else {
                    row.style.display = 'none'; // Sembunyikan baris
                }
            });
            // Tampilkan atau sembunyikan pesan "Data tidak ditemukan"
            const noDataFound = document.getElementById('noDataFound');
            if (found) {
                document.getElementById('noDataFound').style.display = 'none'; // Menyembunyikan pesan
            } else {
                document.getElementById('noDataFound').style.display = 'block'; // Menampilkan pesan
            }
        });
    </script>
@endsection
