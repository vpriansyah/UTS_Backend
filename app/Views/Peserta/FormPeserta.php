<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <caption>
                        <h2 style="text-align: center;"><b>FORM PENDAFTARAN SELEKSI MANDIRI UNIVERSITAS</b></h2>
                    </caption>
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
                    <?= $validation->listErrors() ?>
                    <?= form_open('Peserta/input') ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <p><b>Perhatikan !</b></p>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Nama Peserta', 'nama'); ?></h5>
                            <?= form_input('nama', '', 'class="form-control" ', 'text'); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Nomor Peserta', 'no_peserta'); ?></h5>
                            <?= form_input('no_peserta', '', 'class="form-control"', 'text'); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Email', 'email'); ?></h5>
                            <?= form_input('email', '', 'class="form-control"', 'text'); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Password', 'password'); ?></h5>
                            <?= form_password('password', '', 'class="form-control"'); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Konfirmasi Password', 'passconf'); ?></h5>
                            <?= form_password('passconf', '', 'class="form-control"'); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Asal Sekolah', 'sekolah'); ?></h5>
                            <?= form_input('sekolah', '', 'class="form-control"', 'text'); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Tempat Lahir', 'sekolah'); ?></h5>
                            <?= form_input('tmp_lahir', '', 'class="form-control"', 'text'); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Tanggal Lahir', 'ttl'); ?></h5>
                            <?= form_input('ttl', '', 'class="form-control"', 'date'); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Alamat', 'alamat'); ?></h5>
                            <?= form_textarea('alamat', '', 'placeholder="Silahkan masukkan alamat Anda secara detail...", class="form-control"',); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('No. Handphone', 'nomor'); ?></h5>
                            <?= form_input('nomor', '', 'class="form-control"', 'text'); ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Jenis Ujian', 'prodi'); ?></h5>
                            <?php
                            $options = [
                                ''  => '',
                                'SAINTEK'  => 'SAINTEK',
                                'SOSHUM'    => 'SOSHUM',
                                'CAMPURAN)'  => 'CAMPURAN)',
                            ];
                            echo form_dropdown('prodi', $options, '', 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Jenis Kelamin', 'gender'); ?></h5>
                            <h6>
                                Laki-Laki <?= form_radio('gender', 'Laki-Laki', false); ?>
                                Perempuan <?= form_radio('gender', 'Perempuan ', false); ?>
                            </h6>
                        </div>
                        <div class="form-group">
                            <h5><?= form_label('Status Peserta', 'status'); ?></h5>
                            <?= form_hidden('status', 'Tidak Aktif'); ?>
                            <h6> <?= form_checkbox('status', 'Aktif', false); ?>Aktif</h6>
                        </div>
                        <div class="form-group">
                            <?= form_hidden('ujian', 'Seleksi Mandiri'); ?>
                        </div>
                        <h5><input type="submit" value="Submit" class="btn btn-success" /></h5>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</div>
<?= $this->endSection('content'); ?>