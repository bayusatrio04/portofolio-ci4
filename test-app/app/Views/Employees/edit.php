<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Data Karyawan</h2>


    <?=
    // dd($employeesData['name']);
    ($validation->listErrors()); ?>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <form action="<?= base_url('employees/update/' . $employeesData['id']); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <!-- Kolom Kiri: Form -->
                            <div class="col-md-8">
                                <!-- Nama -->
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama Karyawan</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= $employeesData['name'] ?>" required placeholder="Masukkan nama karyawan" autofocus>
                                </div>
                                <input type="hidden" name="slug" value="<?= $employeesData['slug'] ?>">
                                <input type="hidden" name="photoLama" value="<?= $employeesData['photo'] ?>">
                                <!-- Posisi -->
                                <div class="form-group mb-3">
                                    <label for="position" class="form-label">Posisi</label>
                                    <input type="text" name="position" class="form-control" id="position" value="<?= $employeesData['position'] ?>" required placeholder=" Masukkan posisi">
                                </div>

                                <!-- Departemen -->
                                <div class="form-group mb-3">
                                    <label for="departement" class="form-label">Departemen</label>
                                    <input type="text" name="departement" class="form-control" id="departement" value="<?= $employeesData['departement'] ?>" required placeholder="Masukkan departemen">
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?= $employeesData['email'] ?>" required placeholder="Masukkan email">

                                    <!-- Pesan Error -->
                                    <?php if ($validation->hasError('email')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>


                                <!-- No Telepon -->
                                <div class="form-group mb-3">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="int" name="no_telp" class="form-control" id="no_telp" value="<?= $employeesData['no_telp'] ?>" required placeholder="Masukkan no telepon">
                                </div>

                                <!-- Tanggal Bergabung -->
                                <div class="form-group mb-3">
                                    <label for="join_date" class="form-label">Tanggal Bergabung</label>
                                    <input type="date" name="join_date" class="form-control" id="join_date" value="<?= date('Y-m-d', strtotime($employeesData['join_date'])) ?>" required>
                                </div>

                                <!-- Status -->
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="Actived" <?= ($employeesData['status'] == 'Actived') ? 'selected' : ''; ?>>Aktif</option>
                                        <option value="Inactive" <?= ($employeesData['status'] == 'Inactive') ? 'selected' : ''; ?>>Tidak Aktif</option>
                                        <option value="Leave" <?= ($employeesData['status'] == 'Leave') ? 'selected' : ''; ?>>Cuti</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Kolom Kanan: Upload Foto -->
                            <div class="col-md-4 text-center">
                                <label for="photo" class="form-label">Foto Profil</label>
                                <div class="mb-3">
                                    <!-- Pratinjau gambar yang di-upload -->
                                    <img id="img-preview" src="<?= base_url('uploads/photos/' . $employeesData['photo']); ?>" alt="Preview Image" class="img-thumbnail" style="width: 200px; height: 200px;">
                                </div>

                                <!-- Label Kustom untuk Input File -->
                                <div class="mb-3">
                                    <label for="photo" class="btn btn-outline-primary">Pilih Foto</label>
                                    <span id="file-chosen" class="text-muted"><?= $employeesData['photo'] ?></span>
                                    <input type="file" name="photo" class="form-control d-none <?= ($validation->hasError('photo')) ? 'is-invalid' : ''; ?>" id="photo" accept="image/*" onchange="previewImage()">
                                </div>
                            </div>
                        </div>
                        <!-- Tombol Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="<?= base_url('employees'); ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        // Ambil file yang dipilih dari input file
        const file = document.querySelector('#photo').files[0];
        const imgPreview = document.querySelector('#img-preview'); // Gambar pratinjau
        const fileChosen = document.getElementById('file-chosen'); // Elemen untuk menampilkan nama file

        // Periksa apakah file dipilih
        if (file) {
            // Menampilkan nama file di elemen <span> dengan id 'file-chosen'
            fileChosen.textContent = file.name;

            // Membaca file dan menampilkannya sebagai gambar pratinjau
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result; // Setel sumber gambar pratinjau dengan hasil file yang dipilih
            }
            reader.readAsDataURL(file); // Membaca file sebagai URL data base64
        }
    }
</script>

<?= $this->endSection('content'); ?>