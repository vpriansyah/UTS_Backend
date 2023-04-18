<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update Data Mahasiswa</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form method="post" action="/peserta/update/<?= $peserta['no_peserta'] ?>">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $peserta['nama']; ?>">
                </div>
                <div class="form-group">
                    <label for="no_peserta">Nomor Peserta</label>
                    <input type="text" class="form-control" id="no_peserta" name="no_peserta" value="<?= $peserta['no_peserta']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $peserta['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?= $peserta['password']; ?>">
                </div>
                <div class="form-group">
                    <label for="sekolah">Sekolah</label>
                    <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= $peserta['sekolah'];  ?>" />
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input value="<?= $peserta['tmp_lahir']; ?>" type="text" class="form-control" id="tmp_lahir" name="tmp_lahir">
                </div>
                <div class="form-group">
                    <label for="ttl">Tanggal Lahir</label>
                    <input value="<?= $peserta['ttl']; ?>" type="date" class="form-control" id="ttl" name="ttl">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea name="alamat" id="" class="form-control" cols="30" rows="10"><?= $peserta['alamat']; ?>"</textarea>
                </div>
                <div class="form-group">
                    <label for="nomor">No. Handphone</label>
                    <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $peserta['nomor'];  ?>" />
                </div>
                <div class="form-group">
                    <label for="prodi">Jenis Ujian</label>
                    <select name="prodi" class="form-control" id="prodi">
                        <option value="SAINTEK" <?= ($peserta['prodi'] == "SAINTEK" ? "selected" : ""); ?>>SAINTEK</option>
                        <option value="SOSHUM" <?= ($peserta['prodi'] == "SOSHUM" ? "selected" : ""); ?>>SOSHUM</option>
                        <option value="CAMPURAN" <?= ($peserta['prodi'] == "CAMPURAN" ? "selected" : ""); ?>>CAMPURAN</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label> <br>
                    <input type="radio" name="gender" value="Laki - Laki" <?php if ($peserta['gender'] == 'Laki - Laki') echo 'checked' ?>> Laki - Laki
                    <input type="radio" name="gender" value="Perempuan" <?php if ($peserta['gender'] == 'Perempuan') echo 'checked' ?>> Perempuan
                </div>
                <div class="form-group">
                    <label for="status">Status</label> <br>
                    <input type="hidden" id="status" name="status" value="Non-Aktif">
                    <input type="checkbox" id="status" name="status" value="Aktif" <?php if ($peserta['status'] == 'Aktif') echo 'checked' ?>> Aktif
                </div>
                <input type="hidden" class="form-control" id="status" name="ujian" value="<?= $peserta['ujian'];  ?>" />
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-info" />
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>