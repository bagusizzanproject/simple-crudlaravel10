@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nip">NIP <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip"
                placeholder="Nomor Induk Pegawai" value="{{ old('nip') ?? ($pegawai->nip ?? '') }}">
            @error('nip')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                placeholder="Nama Lengkap" value="{{ old('nama') ?? ($pegawai->nama ?? '') }}">
            @error('nama')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="nama" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
            <div class="d-flex mt-2">
                <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L"
                        @if ($tombol == 'Update') {{ old('jenis_kelamin') ?? $pegawai->jenis_kelamin == 'L' ? 'checked' : '' }}
                    @elseif($tombol == 'Tambah') {{ '' }}> @endif
                        <label class="form-check-label" for="laki_laki">Laki-laki</label>
                </div>
                <div class="form-check ml-2">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P"
                        @if ($tombol == 'Update') {{ old('jenis_kelamin') ?? $pegawai->jenis_kelamin == 'P' ? 'checked' : '' }}
                        @elseif ($tombol == 'Tambah') {{ '' }}> @endif
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
            </div>
            @error('jenis_kelamin')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <label for="alamat" style="margin-top: 10px;">Alamat</label>
            <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat"
                id="alamat" value="{{ old('alamat') ?? ($pegawai->alamat ?? '-') }}">
            @error('alamat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            @php
                $religion = ['-- Pilih --', 'Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Khonghucu'];
            @endphp
            <label for="agama">Agama <span class="text-danger">*</span></label>
            <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                @for ($i = 1; $i <= 6; $i++)
                    @if ($i + 1 == (old('agama') ?? ($pegawai->agama ?? '')))
                        <option value="{{ $i + 1 }} selected">{{ $religion[$i] }}</option>
                    @else
                        <option value="{{ $i + 1 }} ">{{ $religion[$i] }}</option>
                    @endif
                @endfor
            </select>
        </div>

    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="no_telp">No. Telp <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                id="no_telp" placeholder="Nomor Telepon" value="{{ old('no_telp') ?? ($pegawai->no_telp ?? '') }}">
            @error('no_telp')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                id="email" placeholder="example@gmail.com" value="{{ old('email') ?? ($pegawai->email ?? '') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="bidang">Bidang</label>
            <input type="text" class="form-control @error('bidang') is-invalid @enderror" name="bidang"
                id="bidang" placeholder="" value="{{ old('bidang') ?? ($pegawai->bidang ?? '-') }}">
            @error('bidang')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"
                id="jabatan" placeholder="" value="{{ old('jabatan') ?? ($pegawai->jabatan ?? '-') }}">
            @error('jabatan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="golongan">Golongan</label>
            <input type="text" class="form-control @error('golongan') is-invalid @enderror" name="golongan"
                id="golongan" placeholder="" value="{{ old('golongan') ?? ($pegawai->golongan ?? '-') }}">
            @error('golongan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="eselon">Eselon</label>
            <input type="text" class="form-control @error('eselon') is-invalid @enderror" name="eselon"
                id="eselon" placeholder="" value="{{ old('eselon') ?? ($pegawai->eselon ?? '-') }}">
            @error('eselon')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            @php
                $pdk = ['-- Pilih --', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat', 'D-III', 'D-IV/S1', 'S2', 'S3'];
            @endphp
            <label for="pendidikan">Pendidikan <span class="text-danger">*</span></label>
            <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan"
                id="pendidikan">
                @for ($i = 1; $i < 8; $i++)
                    @if ($i + 1 == (old('pendidikan') ?? ($pegawai->pendidikan ?? '')))
                        <option value="{{ $i+1 }} selected">{{ $pdk[$i] }}</option>
                    @else
                        <option value="{{ $i + 1 }}">{{ $pdk[$i] }}</option>
                    @endif
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="gelar_d">Gelar Depan</label>
            <input type="text" class="form-control @error('gelar_d') is-invalid @enderror" name="gelar_d"
                id="gelar_d" placeholder="" value="{{ old('gelar_d') ?? ($pegawai->gelar_d ?? '-') }}">
            @error('gelar_d')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="gelar_b">Gelar Belakang</label>
            <input type="text" class="form-control @error('gelar_b') is-invalid @enderror" name="gelar_b"
                id="gelar_b" placeholder="" value="{{ old('gelar_b') ?? ($pegawai->gelar_b ?? '-') }}">
            @error('gelar_b')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="unit_kerja">Unit Kerja</label>
            <input type="text" class="form-control @error('unit_kerja') is-invalid @enderror" name="unit_kerja"
                id="unit_kerja" placeholder="" value="{{ old('unit_kerja') ?? ($pegawai->unit_kerja ?? '-') }}">
            @error('unit_kerja')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>

<div class="card-header">
    <h3 class="m-0">Upload Berkas Pegawai</h3>
    <small class="font-italic"><span class="text-danger">*)</span> Pastikan berkas yang akan di unggah berekstensi
        <span class="text-danger font-italic">JPG/PNG</span> dengan ukuran maks 1 Mb.</small>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="foto">Foto Profil</label>
                <input type="file" name="foto" id="foto"
                    class="btn form-control form-control  @error('foto') is-invalid @enderror">
                <div>
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="sk_cpns">SK CPNS</label>
                <input type="file" name="sk_cpns" id="sk_cpns"
                    class="btn form-control @error('sk_cpns') is-invalid @enderror">
                <div>
                    @error('sk_cpns')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="sk_pns">SK PNS</label>
                <input type="file" name="sk_pns" id="sk_pns"
                    class="btn form-control @error('sk_pns') is-invalid @enderror">
                <div>
                    @error('sk_cpns')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="sk_pelantikan">SK Pelantikan</label>
                <input type="file" name="sk_pelantikan" id="sk_pelantikan"
                    class="btn form-control @error('sk_pelantikan') is-invalid @enderror">
                <div>
                    @error('sk_pelantikan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="sk_penempatan">SK Penempatan</label>
                <input type="file" name="sk_penempatan" id="sk_penempatan"
                    class="btn form-control @error('sk_penempatan') is-invalid @enderror">
                <div>
                    @error('sk_penempatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sk_jabatan">SK Jabatan</label>
                <input type="file" name="sk_jabatan" id="sk_jabatan"
                    class="btn form-control @error('sk_jabatan') is-invalid @enderror">
                <div>
                    @error('sk_jabatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="npwp">NPWP</label>
                <input type="file" name="npwp" id="npwp"
                    class="btn form-control @error('npwp') is-invalid @enderror">
                <div>
                    @error('npwp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="kgb">KGB</label>
                <input type="file" name="kgb" id="kgb"
                    class="btn form-control @error('kgb') is-invalid @enderror">
                <div>
                    @error('kgb')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="kp">KP</label>
                <input type="file" name="kp" id="kp"
                    class="btn form-control @error('kp') is-invalid @enderror">
                <div>
                    @error('kp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="bpjs">BPJS</label>
                <input type="file" name="bpjs" id="bpjs"
                    class="btn form-control @error('bpjs') is-invalid @enderror">
                <div>
                    @error('bpjs')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="kk">KK</label>
                <input type="file" name="kk" id="kk"
                    class="btn form-control @error('kk') is-invalid @enderror">
                <div>
                    @error('kk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="skp">SKP</label>
                <input type="file" name="skp" id="skp"
                    class="btn form-control @error('skp') is-invalid @enderror">
                <div>
                    @error('skp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="ijazah">Ijazah</label>
                <input type="file" name="ijazah" id="ijazah"
                    class="btn form-control @error('ijazah') is-invalid @enderror">
                <div>
                    @error('ijazah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="dpl">DPL</label>
                <input type="file" name="dpl" id="dpl"
                    class="btn form-control @error('dpl') is-invalid @enderror">
                <div>
                    @error('dpl')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="float-right">
        <a href="{{ url('list-pegawai') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
</div>
