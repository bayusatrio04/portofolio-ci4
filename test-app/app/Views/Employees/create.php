<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <?= ($validation->listErrors()); ?>
    <h2 class="text-center mb-4">Tambah Data Karyawan</h2>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <!-- Form dimodifikasi untuk mendukung upload file -->
                    <form action="<?= base_url('employees/store'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="row">
                            <!-- Kolom Kiri: Form -->
                            <div class="col-md-8">
                                <!-- Nama -->
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama Karyawan</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= old('name') ?>" required placeholder="Masukkan nama karyawan" autofocus>
                                </div>

                                <!-- Posisi -->
                                <div class="form-group mb-3">
                                    <label for="position" class="form-label">Posisi</label>
                                    <input type="text" name="position" class="form-control" id="position" value="<?= old('position') ?>" required placeholder="Masukkan posisi">
                                </div>

                                <!-- Departemen -->
                                <div class="form-group mb-3">
                                    <label for="departement" class="form-label">Departemen</label>
                                    <input type="text" name="departement" class="form-control" id="departement" value="<?= old('departement') ?>" required placeholder="Masukkan departemen">
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?= old('email') ?>" required placeholder="Masukkan email">
                                    <?php if ($validation->hasError('email')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- No Telepon -->
                                <div class="form-group mb-3">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="text" name="no_telp" class="form-control" id="no_telp" value="<?= old('no_telp') ?>" required placeholder="Masukkan no telepon">

                                </div>

                                <!-- Tanggal Bergabung -->
                                <div class="form-group mb-3">
                                    <label for="join_date" class="form-label">Tanggal Bergabung</label>
                                    <input type="date" name="join_date" class="form-control" id="join_date" value="<?= old('join_date') ?>" required>
                                </div>

                                <!-- Status -->
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="Actived" <?= (old('status') == 'Actived') ? 'selected' : ''; ?>>Aktif</option>
                                        <option value="Inactive" <?= (old('status') == 'Inactive') ? 'selected' : ''; ?>>Tidak Aktif</option>
                                        <option value="Leave" <?= (old('status') == 'Leave') ? 'selected' : ''; ?>>Cuti</option>
                                    </select>

                                </div>
                            </div>

                            <!-- Kolom Kanan: Upload Foto -->
                            <div class="col-md-4 text-center">
                                <label for="photo" class="form-label">Foto Profil</label>
                                <div class="mb-3">
                                    <!-- Pratinjau gambar yang di-upload -->
                                    <img id="img-preview" src="https://placehold.jp/200x200.png" alt="Preview Image" class="img-thumbnail" style="width: 200px; height: 200px;">
                                </div>

                                <!-- Input untuk mengunggah file -->
                                <input type="file" name="photo" class="form-control <?= ($validation->hasError('photo')) ? 'is-invalid' : ''; ?>" id="photo" accept="image/*" onchange="previewImage()" required>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="<?= base_url('employees'); ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Pratinjau Gambar -->
<script>
    function previewImage() {
        const file = document.querySelector('#photo').files[0];
        const imgPreview = document.querySelector('#img-preview');

        const reader = new FileReader();
        reader.onload = function(e) {
            imgPreview.src = e.target.result;
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

<?= $this->endSection('content'); ?>