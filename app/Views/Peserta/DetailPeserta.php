<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <caption>
                        <h2 style="text-align: center;"><b>DETAIL PESERTA UJIAN</b></h2>
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

                    <?php
                    $table = new \CodeIgniter\View\Table();
                    $template = [];
                    $table->setTemplate($template);
                    $table->setHeading('Detail', 'Keterangan');
                    $table->addRow(['Nama', $peserta['nama']]);
                    $table->addRow(['No Peserta', $peserta['no_peserta']]);
                    $table->addRow(['Password', $peserta['password']]);
                    $table->addRow(['Email', $peserta['email']]);
                    $table->addRow(['Sekolah', $peserta['sekolah']]);
                    $table->addRow(['Tempat Lahir', $peserta['tmp_lahir']]);
                    $table->addRow(['Tanggal Lahir', $peserta['ttl']]);
                    $table->addRow(['Alamat', $peserta['alamat']]);
                    $table->addRow(['No.Telepon', $peserta['nomor']]);
                    $table->addRow(['Jenis Ujian', $peserta['prodi']]);
                    $table->addRow(['Jenis Kelamin', $peserta['gender']]);
                    $table->addRow(['Status', $peserta['status']]);
                    $table->addRow(['Jalur Ujian', $peserta['ujian']]);
                    echo $table->generate();
                    ?>
                    <p><?= anchor('peserta', 'List Data Peserta', 'class="btn btn-info mt-3"'); ?></p>
                    <p><?= anchor('peserta/input', 'Input Data Peserta', 'class="btn btn-info"'); ?></p>
                </div>
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