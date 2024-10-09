<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Header Section -->
<header class="bg-dark text-white text-center py-5" style="background-color: #2C3E50;">
    <div class="container">
        <h1 class="display-4">Bayu Satrio Trilaksono</h1>
        <p class="lead">Fresh Graduate | Web & Mobile Developer</p>
        <a href="/contact" class="btn btn-outline-light btn-lg">Contact Me</a>
        <a href="/about" class="btn btn-light btn-lg ml-3">More about me</a>
    </div>
</header>

<!-- Portfolio Section -->
<section id="portfolio" class="py-5" style="background-color: #ECF0F1;">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #34495E;">My Experience</h2>
        <div class="row">
            <!-- Portfolio item 1 -->
            <div class="col-md-4">
                <div class="card mb-3" style="border: none;">
                    <img src="<?= base_url('assets/images/survey-portofolio.webp') ?>" class="card-img-top" alt="Project 1">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #2980B9;">Student Survey Website</h5>
                        <p class="card-text" style="color: #7F8C8D;">Developed during internship at Telkom University, a website for student surveys.</p>
                    </div>
                </div>
            </div>
            <!-- Portfolio item 2 -->
            <div class="col-md-4">
                <div class="card mb-3" style="border: none;">
                    <img src="<?= base_url('assets/images/compay-redesign.webp') ?>" class="card-img-top" alt="Project 2">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #2980B9;">Company Website Redesign</h5>
                        <p class="card-text" style="color: #7F8C8D;">Redesigned company website and logo during an internship at PT Kanaka Hita Solvera.</p>
                    </div>
                </div>
            </div>
            <!-- Portfolio item 3 -->
            <div class="col-md-4">
                <div class="card mb-3" style="border: none;">
                    <img src="<?= base_url('assets/images/payroll-system.webp') ?>" class="card-img-top" alt="Project 3">

                    <div class="card-body">

                        <h5 class="card-title" style="color: #2980B9;">
                            <a href="https://www.figma.com/proto/4KXBPaFySnzx5WkA1LU9TZ/Project-Based-Front-End-Mobile-System-Payroll?node-id=81-551&t=cEAIOMicrgYpjxki-1&starting-point-node-id=81%3A551">
                                Mobile Payroll System
                            </a>
                        </h5>
                        <p class="card-text" style="color: #7F8C8D;">Developed Android-based payroll system for PT Pelangi Prima Mandiri.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>