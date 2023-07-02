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
                <li class="nav__item"><a href="<?php echo e(route('admin.dashboard.index')); ?>" class="nav__link">Admin</a></li>
                <?php if(auth()->user()): ?>
                    <li class="nav__item"><a href="#profile.html" class="nav__item__orange">Hello <?php echo e(auth()->user()->name); ?></a></li>
                    <form method="post" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <li class="nav__item__far"><input type="submit" value="Logout"></li>
                    </form>

                <?php else: ?>
                    <li class="nav__item__far">
                        <a href="<?php echo e(route('register')); ?>" class="nav__item__orange">Register</a>
                        <span>|</span>
                        <a href="<?php echo e(route('login')); ?>" class="nav__item__orange">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>
<?php /**PATH D:\PROJECTS\portfolio\resources\views/web/layout/header.blade.php ENDPATH**/ ?>