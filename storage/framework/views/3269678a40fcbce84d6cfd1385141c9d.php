<?php $__env->startSection('title', 'home'); ?>

<?php $__env->startSection('content'); ?>
    <!--===== HOME =====-->
    <section class="home" id="home">
        <div class="home__container bd-grid">
            <h1 class="home__title"><span>Welcome</span></h1>

            <div class="home__scroll">
                <a href="#about" class="home__scroll-link"><i class='bx bx-up-arrow-alt'></i>Scroll down</a>
            </div>

            
        </div>
    </section>

    <!--===== ABOUT =====-->
    <section class="about section" id="about">
        <h2 class="section-title">About</h2>

        <div class="about__container bd-grid">
            <div class="about__img">
                <img src="<?php echo e(asset('assets/img/profile.jpg')); ?>" alt="">
            </div>

            <div>
                <h2 class="about__subtitle">about heading</h2>
                <span class="about__profession">about career</span>
                <p class="about__text">about description</p>

                <div class="about__social">
                    <a href="#" class="about__social-icon"><i class='bx bxl-linkedin'></i></a>
                    <a href="https:github.com/PythonmahdiDjango" class="about__social-icon"><i
                            class='bx bxl-github'></i></a>
                    <a href="#" class="about__social-icon"><i class='bx bxl-dribbble'></i></a>
                </div>
            </div>
        </div>
    </section>

    <!--===== SKILLS =====-->
    <section class="skills section" id="skills">
        <h2 class="section-title">Skills</h2>

        <div class="skills__container bd-grid">
            <div class="skills__box">
                <h3 class="skills__subtitle">category name</h3>
                <span class="skills__name">skill name</span>
            </div>

            <div class="skills__img">
                <img src="<?php echo e(asset('assets/img/skill.jpg')); ?>" alt="">
            </div>
        </div>
    </section>

    <!--===== PORTFOLIO =====-->
    <section class="portfolio section" id="portfolio">
        <h2 class="section-title">Portfolio</h2>

        <div class="portfolio__container bd-grid">
            <div class="portfolio__img">
                <img src="<?php echo e(asset('assets/img/perfil.png')); ?>" alt="">

                <div class="portfolio__link">
                    <a href="<?php echo e(route('site.portfolio.index')); ?>" class="portfolio__link-name">View details</a>
                </div>
            </div>
        </div>
    </section>

    <!--===== CONTACT =====-->
    <section class="contact section" id="contact">
        <h2 class="section-title">Contact</h2>

        <div class="contact__container bd-grid">
            <div class="contact__info">
                <h3 class="contact__subtitle">EMAIL</h3>
                <span class="contact__text">info.mail.com</span>

                <h3 class="contact__subtitle">PHONE</h3>
                <span class="contact__text">+20 999-999</span>

                <h3 class="contact__subtitle">ADRESS</h3>
                <span class="contact__text">My contry</span>
            </div>

            <form action="" class="contact__form">
                <div class="contact__inputs">
                    <input type="text" placeholder="Name" class="contact__input">
                    <input type="mail" placeholder="Email" class="contact__input">
                </div>

                <textarea name="" id="" cols="0" rows="10" class="contact__input"></textarea>

                <input type="submit" value="Enviar" class="contact__button">
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECTS\portfolio\resources\views/web/home/index.blade.php ENDPATH**/ ?>