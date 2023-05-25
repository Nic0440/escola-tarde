<?php
    $this->layout("_theme",["categories" => $categories]);
?>


<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pricing</h2>
            <p>Bem-vindo à nossa instituição de ensino online de referência. Oferecemos uma ampla variedade de cursos nas áreas de tecnologia, humanas, exatas e ciências, ministrados por especialistas renomados. Nossos cursos são flexíveis e convenientes, permitindo que você aprenda no seu próprio ritmo, de qualquer lugar. Com um compromisso com a excelência acadêmica e parcerias com profissionais e empresas de destaque, garantimos que você obtenha um conhecimento atualizado e relevante para impulsionar sua carreira. Junte-se a nós e embarque em uma jornada de aprendizado transformador, expandindo seus horizontes e alcançando seus objetivos.</p>
        </div>

        <div class="row">

            <?php
            foreach ($courses as $course) {
            ?>
            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="box featured">
                    <h3><?= $course->name; ?></h3>
                    <h4><sup>R$</sup><?= moneyFormat($course->price); ?><span> / mês</span></h4>
                    <ul>
                        <li><?= $course->abstract; ?></li>
                    </ul>
                    <!--<img src="<?/*= $course->image; */?>" alt="">-->
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Matricule-se!</a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>

    </div>
</section><!-- End Pricing Section -->
