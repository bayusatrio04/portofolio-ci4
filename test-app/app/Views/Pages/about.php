<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="text-center mb-4">About Me</h1>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Bayu Satrio Trilaksono</h5>
                    <p class="card-text">
                        I am a fresh graduate with a strong interest in programming and experience in various programming languages such as PHP, Python, Java, React, and SQL. I am also accustomed to working with the Laravel framework. I am disciplined, able to work well in a team, and have practical experience through project participation, including mobile application development. Additionally, I actively contribute to laboratory activities, which have honed my technical and teamwork skills.
                    </p>

                    <h6 class="card-subtitle mb-2 text-muted">Skills</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Website Application Development (HTML, PHP, Python Flask)</li>
                        <li class="list-group-item">Mobile Application Development (React Native)</li>
                        <li class="list-group-item">Dashboard Application Development (PHP)</li>
                        <li class="list-group-item">Frameworks (Laravel, Yii2 Advanced)</li>
                        <li class="list-group-item">Support Tools (Figma, VSCode, Xampp, Laragon)</li>
                        <li class="list-group-item">Languages: Bahasa Indonesia (Active), English (Passive)</li>
                    </ul>

                    <h6 class="card-subtitle mt-4 mb-2 text-muted">Experience</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Web Developer Intern - PT Kanaka Hita Solvera (June 2019 – August 2019)</strong><br>
                            Redesigned one of the company's websites and logos.
                        </li>
                        <li class="list-group-item">
                            <strong>Front End Web Developer Intern - Telkom University (July 2023 – August 2023)</strong><br>
                            Developed a student survey website for the Information Systems program.
                        </li>
                        <li class="list-group-item">
                            <strong>Mobile Developer Intern - PT Pelangi Prima Mandiri (November 2023 – July 2024)</strong><br>
                            Developed an Android-based mobile payroll and personnel management system.
                        </li>
                    </ul>

                    <h6 class="card-subtitle mt-4 mb-2 text-muted">Education</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Telkom University (2020 - 2024)</strong><br>
                            Bachelor’s Degree in Information Systems with GPA 3.61.
                        </li>
                        <li class="list-group-item">
                            <strong>SMK Telkom Jakarta (2017 - 2020)</strong><br>
                            Vocational School in Software Engineering.
                        </li>
                    </ul>

                    <h6 class="card-subtitle mt-4 mb-2 text-muted">Certifications</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">BNSP Certified Web Developer</li>
                    </ul>

                    <h6 class="card-subtitle mt-4 mb-2 text-muted">Contact</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Email:</strong> <a href="mailto:">satriob484@gmail.com</a> </li>
                        <li class="list-group-item"><strong>LinkedIn:</strong> <a href="https://www.linkedin.com/in/bayu-satrio-trilaksono/" target="_blank">linkedin.com/in/bayu-satrio-trilaksono/</a></li>
                        <li class="list-group-item"><strong>GitHub:</strong> <a href="https://github.com/bayusatrio04" target="_blank">github.com/bayusatrio04</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-4 mb-4">
                <a href="/path/to/cv/Bayu_Satrio_Resume.pdf" class="btn btn-primary" download>
                    <i class="fas fa-download"></i> Download CV/Resume (PDF)
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>