<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Your dashboard'); ?> · DomainBloom</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/domainbloom.css')); ?>"><script src="<?php echo e(asset('js/domainbloom.js')); ?>" defer></script>
</head>
<body class="panel-body">
    <div class="panel-shell">
        <aside class="sidebar" data-sidebar>
            <a class="brand panel-brand" href="<?php echo e(route('home')); ?>"><span class="brand-mark">✿</span><span>Domain<span class="brand-soft">Bloom</span><small><?php echo e(auth()->user()->isAdmin() ? 'Admin studio' : 'Your domain garden'); ?></small></span></a>
            <div class="sidebar-profile"><span class="avatar"><?php echo e(mb_substr(auth()->user()->name, 0, 1)); ?></span><span><strong><?php echo e(auth()->user()->name); ?></strong><small><?php echo e(auth()->user()->isAdmin() ? 'Administrator' : 'Member'); ?></small></span></div>
            <div class="sidebar-navigation">
            <?php if(auth()->user()->isAdmin()): ?>
                <p class="sidebar-label">WORKSPACE</p><nav class="side-nav">
                    <a class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>"><span>⌂</span> Dashboard</a>
                    <a class="<?php echo e(request()->routeIs('admin.domains.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.domains.index')); ?>"><span>◎</span> Manage domains</a>
                    <a class="<?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users.index')); ?>"><span>♧</span> Manage users</a>
                </nav>
            <?php else: ?>
                <p class="sidebar-label">MY SPACE</p><nav class="side-nav">
                    <a class="<?php echo e(request()->routeIs('user.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('user.dashboard')); ?>"><span>⌂</span> Dashboard</a>
                    <a class="<?php echo e(request()->routeIs('user.domains.index', 'user.domains.show', 'user.domains.edit') ? 'active' : ''); ?>" href="<?php echo e(route('user.domains.index')); ?>"><span>◎</span> My domains</a>
                    <a class="<?php echo e(request()->routeIs('user.domains.create') ? 'active' : ''); ?>" href="<?php echo e(route('user.domains.create')); ?>"><span>＋</span> Add a domain</a>
                </nav>
            <?php endif; ?>
            <p class="sidebar-label sidebar-label-account">ACCOUNT</p><nav class="side-nav"><a class="<?php echo e(request()->routeIs('profile.*') ? 'active' : ''); ?>" href="<?php echo e(route('profile.edit')); ?>"><span>♡</span> Profile & security</a><a href="<?php echo e(route('home')); ?>"><span>↗</span> Visit homepage</a></nav>
            <div class="sidebar-note"><span>✧</span><p>Small steps make a beautifully organized digital world.</p></div>
            </div>
            <form action="<?php echo e(route('logout')); ?>" method="post" class="sidebar-logout"><?php echo csrf_field(); ?><button type="submit"><span>⇥</span> Sign out</button></form>
        </aside>
        <div class="panel-main">
            <header class="panel-topbar"><button class="sidebar-toggle" type="button" aria-label="Toggle sidebar" aria-expanded="false" data-sidebar-toggle>☰</button><div class="topbar-breadcrumb"><?php echo e(auth()->user()->isAdmin() ? 'Admin studio' : 'My workspace'); ?> <span>/</span> <?php echo $__env->yieldContent('crumb', 'Overview'); ?></div><div class="topbar-user"><span class="topbar-greeting">A lovely day to stay organized</span><span class="avatar avatar-small"><?php echo e(mb_substr(auth()->user()->name, 0, 1)); ?></span></div></header>
            <main class="panel-content"><?php if (isset($component)) { $__componentOriginal5168fdb0c14fd91c6598264bc4be63f2 = $component; } ?>
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
<?php endif; ?><?php echo $__env->yieldContent('content'); ?></main>
            <footer class="panel-footer">DomainBloom <span>·</span> Your digital world, in bloom.</footer>
        </div>
    </div>
</body>
</html>
<?php /**PATH A:\laragon\www\DomainManagementSystem\resources\views/layouts/panel.blade.php ENDPATH**/ ?>