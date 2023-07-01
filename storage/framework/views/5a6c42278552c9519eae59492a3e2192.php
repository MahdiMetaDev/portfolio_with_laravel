<!--===== HEADER =====-->
<header class="l-header">
    <nav class="nav bd-grid">
        <div>
            <a href="#" class="nav__logo"></a>
        </div>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="<?php echo e(route('site.root')); ?>" class="nav__link active">Home</a></li>
                <li class="nav__item"><a href="<?php echo e(route('site.blog.index')); ?>" class="nav__link">Blog</a></li>
                <li class="nav__item"><a href="<?php echo e(route('site.portfolio.index')); ?>" class="nav__link">Portfolio</a></li>
                <li class="nav__item"><a href="#contact" class="nav__link">Contact</a></li>
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>
<?php /**PATH D:\PROJECTS\portfolio\resources\views/web/layout/header.blade.php ENDPATH**/ ?>