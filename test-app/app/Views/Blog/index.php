<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">


    <?php if (session()->getFlashdata('Status')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('Status'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <h2 class="text-center mb-4">Daftar Blog Karyawan</h2>
            <form action="<?= base_url('blog'); ?>" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Blog Karyawan..." name="keyword">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>blog_title</th>
                <th>blog_description</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($Blog as $k) : ?>
                <tr>
                    <td><?= $k['blog_id'] ?></td>
                    <td><?= $k['blog_title']; ?></td>
                    <td><?= $k['blog_description']; ?></td>





                    <td>
                        <a href="/blog/<?= $k['blog_id']; ?>" class="btn btn-success">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <?= $pager->links('blog', 'blog_pagination'); ?>
</div>
<?= $this->endSection('content'); ?>