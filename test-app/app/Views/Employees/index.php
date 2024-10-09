<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="text-right mt-4">
        <a href="<?= base_url('employees/create'); ?>" class="btn btn-primary">Tambah Data Karyawan</a>
    </div>
    <h2 class="text-center mb-4">Daftar Karyawan</h2>
    <?php if (session()->getFlashdata('Status')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('Status'); ?>
        </div>
    <?php endif; ?>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Posisi</th>
                <th>Departemen</th>
                <th>Tanggal Bergabung</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employeesData as $k) : ?>
                <tr>
                    <td><?= $k['id'] ?></td>
                    <td><?= $k['name']; ?></td>
                    <td><?= $k['position']; ?></td>
                    <td><?= $k['departement']; ?></td>
                    <td><?= date('d-m-Y', strtotime($k['join_date'])); ?></td>

                    <!-- Status badge -->
                    <td>
                        <?php if ($k['status'] == "Actived" || $k['status'] == "Aktif") : ?>
                            <span class="badge text-bg-success">Aktif</span>
                        <?php elseif ($k['status'] == "Leave" || $k['status'] == "Cuti") : ?>
                            <span class="badge text-bg-warning">Cuti</span>
                        <?php else : ?>
                            <span class="badge text-bg-danger">Tidak Aktif</span>
                        <?php endif; ?>
                    </td>


                    <td>
                        <a href="/employees/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
<?= $this->endSection('content'); ?>