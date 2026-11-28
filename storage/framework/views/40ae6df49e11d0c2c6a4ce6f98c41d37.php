<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'DomainBloom'); ?> · DomainBloom</title>
    <meta name="description" content="DomainBloom keeps your digital world organized, beautifully.">
    <link rel="stylesheet" href="<?php echo e(asset('css/domainbloom.css')); ?>">
    <script src="<?php echo e(asset('js/domainbloom.js')); ?>" defer></script>
</head>
<body class="public-body">
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="<?php echo e(route('home')); ?>" aria-label="DomainBloom home"><span class="brand-mark">✿</span><span>Domain<span class="brand-soft">Bloom</span><small>Manage your digital world, beautifully.</small></span></a>
            <button class="nav-toggle" type="button" aria-label="Open navigation" aria-expanded="false" data-nav-toggle>☰</button>
            <nav class="main-nav" data-nav-menu>
                <a href="<?php echo e(route('home')); ?>">Home</a><a href="<?php echo e(route('about')); ?>">About</a><a href="<?php echo e(route('features')); ?>">Features</a><a href="<?php echo e(route('home')); ?>#contact">Contact</a>
                <?php if(auth()->guard()->check()): ?>
                    <a class="nav-dashboard" href="<?php echo e(route(auth()->user()->isAdmin() ? 'admin.dashboard' : 'user.dashboard')); ?>">My dashboard <span>↗</span></a>
                    <form action="<?php echo e(route('logout')); ?>" method="post" class="nav-logout"><?php echo csrf_field(); ?><button class="nav-link-button" type="submit">Log out</button></form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>">Log in</a><a class="button button-small" href="<?php echo e(route('register')); ?>">Get started</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main>
        <?php if (isset($component)) { $__componentOriginal5168fdb0c14fd91c6598264bc4be63f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5168fdb0c14fd91c6598264bc4be63f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flash','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5168fdb0c14fd91c6598264bc4be63f2)): ?>
<?php $attributes = $__attributesOriginal5168fdb0c14fd91c6598264bc4be63f2; ?>
<?php unset($__attributesOriginal5168fdb0c14fd91c6598264bc4be63f2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5168fdb0c14fd91c6598264bc4be63f2)): ?>
<?php $component = $__componentOriginal5168fdb0c14fd91c6598264bc4be63f2; ?>
<?php unset($__componentOriginal5168fdb0c14fd91c6598264bc4be63f2); ?>
<?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand"><a class="brand" href="<?php echo e(route('home')); ?>"><span class="brand-mark">✿</span><span>Domain<span class="brand-soft">Bloom</span><small>Manage your digital world, beautifully.</small></span></a><p>Keep your domain details together, so you can focus on what you’re building.</p></div>
            <div><h3>Explore</h3><a href="<?php echo e(route('about')); ?>">About us</a><a href="<?php echo e(route('features')); ?>">Features</a><a href="<?php echo e(route('home')); ?>#contact">Contact</a></div>
            <div><h3>Your space</h3><a href="<?php echo e(route('login')); ?>">Log in</a><a href="<?php echo e(route('register')); ?>">Create an account</a></div>
            <div><h3>A gentle reminder</h3><p>Your domains are part of your story. Keep them close and cared for.</p><a href="<?php echo e(route('home')); ?>#contact">Send us a note through the contact form →</a></div>
        </div>
        <div class="container footer-bottom"><span>© <?php echo e(now()->year); ?> DomainBloom. Made for your digital garden.</span><span>Organized with care <span class="heart">♥</span></span></div>
        <div class="container credit-wrap"><div class="developer-credit"><span class="credit-sparkle sparkle-one" aria-hidden="true">✦</span><span class="credit-flower" aria-hidden="true">✿</span><strong>Developed by - Meenal Patro</strong><span class="credit-sparkle sparkle-two" aria-hidden="true">✧</span><span class="credit-sparkle sparkle-three" aria-hidden="true">✦</span></div></div>
    </footer>
</body>
</html>
<?php /**PATH A:\laragon\www\DomainManagementSystem\resources\views/layouts/app.blade.php ENDPATH**/ ?>