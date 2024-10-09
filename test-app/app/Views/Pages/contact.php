<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="text-center mb-4">Contact Us</h1>

            <?php foreach ($alamat as $show) : ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $show['tipe']; ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Kelurahan:</strong> <?= $show['kelurahan']; ?></li>
                            <li class="list-group-item"><strong>Kecamatan:</strong> <?= $show['kecamatan']; ?></li>
                            <li class="list-group-item"><strong>Kota:</strong> <?= $show['kota']; ?></li>
                            <li class="list-group-item"><strong>Alamat Lengkap:</strong> <?= $show['alamat_lengkap']; ?></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>