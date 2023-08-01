<!--===== HEADER =====-->
<header class="l-header">
    <nav class="nav bd-grid">
        <div>
            <a href="#" class="nav__logo"></a>
        </div>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="<?php echo e(route('root')); ?>" class="nav__link active"><?php echo e(__('trans.home')); ?></a></li>
                <li class="nav__item"><a href="<?php echo e(route('blog.index')); ?>" class="nav__link"><?php echo e(__('trans.blog')); ?></a></li>
                <li class="nav__item"><a href="<?php echo e(route('portfolio.index')); ?>" class="nav__link"><?php echo e(__('trans.portfolio')); ?></a></li>
                <li class="nav__item"><a href="<?php echo e(route('admin.dashboard.index')); ?>" class="nav__link"><?php echo e(__('trans.admin')); ?></a></li>





                <?php if(auth()->user()): ?>
                    <li class="nav__item"><a href="<?php echo e(route('profile.edit')); ?>" class="nav__item__orange">Hello <?php echo e(auth()->user()->name); ?></a></li>
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