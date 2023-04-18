<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tabel Peserta Seleksi Mandiri</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <p><?= anchor('Peserta/input', 'Tambah Data Peserta', 'class="btn btn-primary"') ?></p>
            <?php
            $table = new \CodeIgniter\View\Table();
            $template = [
                'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">',
                'thead_open' => '<thead class="table-dark text-center">',
            ];
            $table->setTemplate($template);
            $table->setHeading('No.', 'Nama', 'Nomor Peserta', 'Email', 'Password', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Ujian', 'Status', 'Aksi');
            $no = 1;
            foreach ($peserta as $p) :
                $table->addRow([
                    $no++,
                    $p['nama'],
                    $p['no_peserta'],
                    $p['email'],
                    $p['password'],
                    $p['tmp_lahir'],
                    $p['ttl'],  $p['prodi'],
                    $p['status'],
                    anchor('peserta/detail/' . $p['no_peserta'], 'detail', 'class="btn btn-info text-center"') .
                        anchor('peserta/edit/' . $p['no_peserta'], 'update', 'class="btn btn-warning mt-1 text-center", style="inline"') .
                        anchor('peserta/delete/' . $p['no_peserta'], 'delete', 'class="btn btn-danger mt-1 text-center", style="inline"')
                ]);
            endforeach;
            echo $table->generate();
            ?>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>