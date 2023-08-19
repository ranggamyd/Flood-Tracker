<?= $this->extend('admin/templates/main') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong><?= $title ?></strong></h1>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <div class="alert-message">
                    <h4 class="alert-heading fw-bold">Gagal!</h4>
                    <p><?php
                        echo "<pre>";
                        print_r(session()->getFlashdata('error'));
                        echo "</pre>";
                        ?></p>
                </div>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="col-12">
                <div class="card" style="height: 100%;">
                    <img class="card-img-top" src="<?= base_url('assets/images/') . $lokasi_banjir['gambar'] ?>" alt="<?= $lokasi_banjir['lokasi'] ?>" style="max-height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <!-- <form action="<?= base_url('admin/lokasi_banjir/create') ?>" method="post" enctype="multipart/form-data"> -->
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="lokasi" class="form-label">Nama Lokasi</label>
                                <input type="text" name="lokasi" value="<?= old('lokasi', $lokasi_banjir['lokasi']) ?>" class="form-control" id="lokasi" required readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal" class="form-label">Waktu Kejadian</label>
                                <input type="datetime-local" name="tanggal" value="<?= old('tanggal', date('Y-m-d\TH:i:s', strtotime($lokasi_banjir['tanggal']))) ?>" class="form-control" id="tanggal" required readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="ketinggian" class="form-label">Ketinggian (cm)</label>
                                <input type="number" name="ketinggian" value="<?= old('ketinggian', $lokasi_banjir['ketinggian']) ?>" step="any" class="form-control" id="ketinggian" required readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" readonly></textarea>
                        </div>
                        <div class="float-start">
                            <a href="<?= base_url('admin/lokasi_banjir') ?>" class="btn btn-success"><i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle">Kembali</span></a>
                        </div>
                        <!-- <div class="float-end">
                                <button type="reset" class="btn btn-secondary"><i class="align-middle" data-feather="refresh-cw"></i> <span class="align-middle">Reset</span></button>
                                <button type="submit" class="btn btn-primary"><i class="align-middle" data-feather="save"></i> <span class="align-middle">Simpan</span></button>
                            </div> -->
                        <!-- </form> -->
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <form action="<?= base_url('admin/aset_terdampak/kelola_aset/') . $lokasi_banjir['id'] ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tabel-aset">
                                    <thead>
                                        <tr>
                                            <th>Gambar Aset</th>
                                            <th>Nama Aset</th>
                                            <th>Kategori</th>
                                            <th>Kondisi</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $numRows = max(3, count($aset_terdampak)); ?>
                                        <?php for ($i = 0; $i < $numRows; $i++) : ?>
                                            <?php $item = isset($aset_terdampak[$i]) ? $aset_terdampak[$i] : ['gambar_aset' => '', 'nama_aset' => '', 'kategori' => '', 'kondisi' => '', 'deskripsi' => '']; ?>
                                            <tr class="aset">
                                                <td>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <a class="img-popup" href="<?= base_url('assets/images/') . $item['gambar_aset'] ?>">
                                                                <img src="<?= base_url('assets/images/') . $item['gambar_aset'] ?>" class="img-thumbnail img-preview" accept="image/png, image/jpeg" style="width: 100px; height: 100px; object-fit: cover;">
                                                            </a>
                                                        </div>
                                                        <div class="col-8 d-flex align-items-center">
                                                            <div class="w-100">
                                                                <input type="file" name="gambar_aset[]" value="<?= old('gambar_aset', $item['gambar_aset']) ?>" oninput="updatePreview(this)" class="form-control add-image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><input type="text" class="form-control" name="nama_aset[]" value="<?= old('nama_aset', $item['nama_aset']) ?>" required></td>
                                                <td><input type="text" class="form-control" name="kategori[]" value="<?= old('kategori', $item['kategori']) ?>" required></td>
                                                <td><input type="text" class="form-control" name="kondisi[]" value="<?= old('kondisi', $item['kondisi']) ?>" required></td>
                                                <td><textarea class="form-control" name="deskripsi[]" rows="1"><?= old('deskripsi', $item['deskripsi']) ?></textarea></td>
                                                <td><button type="button" class="btn btn-danger hapus-aset"><i class="align-middle" data-feather="delete"></i></button></td>
                                            </tr>
                                        <?php
                                        endfor;
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <button type="button" class="btn btn-info float-start" id="tambah-aset"><i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Tambah Aset</span></button>
                            <button type="submit" class="btn btn-primary float-end"><i class="align-middle" data-feather="save"></i> <span class="align-middle">Simpan</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Event delegation untuk menangani perubahan pada elemen baru
    document.querySelector('#tabel-aset').addEventListener('change', function(event) {
        if (event.target.classList.contains('add-image')) {
            updatePreview(event.target);
        }
    });

    function updatePreview(input) {
        var preview = input.parentNode.parentNode.parentNode.querySelector('.img-preview');
        var link = input.parentNode.parentNode.parentNode.querySelector('.img-popup');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            link.href = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            link.href = "";
        }
    }

    document.getElementById('tambah-aset').addEventListener('click', function() {
        var tabelAset = document.getElementById('tabel-aset');
        var row = document.querySelector('.aset').cloneNode(true);
        tabelAset.querySelector('tbody').appendChild(row);

        updateHapusAsetButton();
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('hapus-aset')) {
            var rows = document.querySelectorAll('.aset');
            if (rows.length > 1) {
                event.target.closest('tr').remove();
            }
            updateHapusAsetButton();
        }
    });

    function updateHapusAsetButton() {
        var rows = document.querySelectorAll('.aset');
        var hapusButtons = document.querySelectorAll('.hapus-aset');

        if (rows.length === 1) {
            hapusButtons[0].disabled = true;
        } else {
            hapusButtons.forEach(function(button) {
                button.disabled = false;
            });
        }
    }
</script>






<script type="text/javascript">
</script>
<?php $this->endSection(); ?>