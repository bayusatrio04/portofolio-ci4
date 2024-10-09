<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Employee Card -->
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Detail Employees</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Employee Photo -->
                        <div class="col-md-4 text-center mb-4">
                            <img src="<?= base_url('uploads/photos/' . $employeesData['photo']); ?>" class="rounded-circle img-fluid" alt="<?= $employeesData['name']; ?>" style="width: 150px; height: 150px;">
                        </div>
                        <!-- Employee Info -->
                        <div class="col-md-8">
                            <h4 class="card-title"><?= $employeesData['name']; ?></h4>
                            <p class="card-text"><strong>Posisi:</strong> <?= $employeesData['position']; ?></p>
                            <p class="card-text"><strong>Departemen:</strong> <?= $employeesData['departement']; ?></p>
                            <p class="card-text"><strong>Email:</strong> <?= $employeesData['email']; ?></p>
                            <p class="card-text"><strong>No Telepon:</strong> <?= $employeesData['no_telp']; ?></p>
                            <p class="card-text"><strong>Tanggal Bergabung:</strong> <?= date('d-m-Y', strtotime($employeesData['join_date'])); ?></p>
                            <p class="card-text"><strong>Status:</strong>
                                <?php if ($employeesData['status'] == "Actived") : ?>
                                    <span class="badge text-bg-success"><?= $employeesData['status']; ?></span>
                                <?php else : ?>
                                    <span class="badge text-bg-danger"><?= $employeesData['status']; ?></span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Button Section -->
                <div class="card-footer text-center">
                    <!-- Edit Button -->
                    <a href="<?= base_url('employees/edit/' . $employeesData['slug']); ?>" class="btn btn-warning">Edit</a>

                    <!-- Delete Button -->
                    <form action="<?= base_url('employees/delete/' . $employeesData['id']); ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            <!-- Button Back to List -->
            <div class="text-center">
                <a href="<?= base_url('employees'); ?>" class="btn btn-secondary">Kembali ke Daftar Karyawan</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>