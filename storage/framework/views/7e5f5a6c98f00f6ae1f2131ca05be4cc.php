<?php $__env->startSection('title', 'My domains'); ?>
<?php $__env->startSection('crumb', 'My domains'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-heading"><div><span class="eyebrow">YOUR DOMAIN GARDEN</span><h1>My domains <span class="heading-flower">✿</span></h1><p>All the names, dates, and little details you’ve gathered.</p></div><a class="button" href="<?php echo e(route('user.domains.create')); ?>">＋ Add a domain</a></div>
<section class="panel-card list-card"><form class="filter-bar" method="get"><div class="search-field"><span>⌕</span><input name="q" value="<?php echo e(request('q')); ?>" placeholder="Search domains or registrars…" aria-label="Search domains or registrars"></div><select name="status" aria-label="Filter by status"><option value="">Any status</option><?php $__currentLoopData = ['active'=>'Active','pending'=>'Pending','inactive'=>'Inactive']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($value); ?>" <?php if(request('status')===$value): echo 'selected'; endif; ?>><?php echo e($label); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><select name="registrar" aria-label="Filter by registrar"><option value="">Any registrar</option><?php $__currentLoopData = $registrars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registrar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($registrar); ?>" <?php if(request('registrar')===$registrar): echo 'selected'; endif; ?>><?php echo e($registrar); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><select name="expiry" aria-label="Filter by expiry"><option value="">Any expiry</option><option value="soon" <?php if(request('expiry')==='soon'): echo 'selected'; endif; ?>>Expiring in 30 days</option><option value="expired" <?php if(request('expiry')==='expired'): echo 'selected'; endif; ?>>Expired</option><option value="upcoming" <?php if(request('expiry')==='upcoming'): echo 'selected'; endif; ?>>More than 30 days</option></select><select name="sort" aria-label="Sort records"><option value="created" <?php if(request('sort','created')==='created'): echo 'selected'; endif; ?>>Recently added</option><option value="name" <?php if(request('sort')==='name'): echo 'selected'; endif; ?>>Domain name</option><option value="expiry" <?php if(request('sort')==='expiry'): echo 'selected'; endif; ?>>Expiry date</option></select><select name="direction" aria-label="Sort direction"><option value="asc" <?php if($direction==='asc'): echo 'selected'; endif; ?>>Ascending</option><option value="desc" <?php if($direction==='desc'): echo 'selected'; endif; ?>>Descending</option></select><button class="button button-filter" type="submit">Apply</button></form>
<div class="list-summary"><span><?php echo e($records->total()); ?> <?php echo e(Str::plural('record', $records->total())); ?></span><?php if($hasFilters): ?><a href="<?php echo e(route('user.domains.index')); ?>">Clear filters</a><?php endif; ?></div><?php if($records->total()===0 && $hasFilters): ?><?php if (isset($component)) { $__componentOriginal074a021b9d42f490272b5eefda63257c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal074a021b9d42f490272b5eefda63257c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-state','data' => ['title' => 'No domains match your search','description' => 'Try a different search or clear your filters to see your full collection.','action' => route('user.domains.index'),'actionLabel' => 'Clear filters','icon' => '⌕']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'No domains match your search','description' => 'Try a different search or clear your filters to see your full collection.','action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.domains.index')),'action-label' => 'Clear filters','icon' => '⌕']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $attributes = $__attributesOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__attributesOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $component = $__componentOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__componentOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?><?php else: ?><?php if (isset($component)) { $__componentOriginal634c572faa405ad1068fe7673915c0b7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal634c572faa405ad1068fe7673915c0b7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.domain-table','data' => ['records' => $records]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('domain-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['records' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($records)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal634c572faa405ad1068fe7673915c0b7)): ?>
<?php $attributes = $__attributesOriginal634c572faa405ad1068fe7673915c0b7; ?>
<?php unset($__attributesOriginal634c572faa405ad1068fe7673915c0b7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal634c572faa405ad1068fe7673915c0b7)): ?>
<?php $component = $__componentOriginal634c572faa405ad1068fe7673915c0b7; ?>
<?php unset($__componentOriginal634c572faa405ad1068fe7673915c0b7); ?>
<?php endif; ?><?php endif; ?> <?php if($records->hasPages()): ?><div class="pagination-wrap"><?php echo e($records->links()); ?></div><?php endif; ?></section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\laragon\www\DomainManagementSystem\resources\views/user/domains/index.blade.php ENDPATH**/ ?>