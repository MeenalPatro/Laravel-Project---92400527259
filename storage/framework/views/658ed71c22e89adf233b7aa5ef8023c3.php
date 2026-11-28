<?php ($admin = $admin ?? false); ?>
<?php ($prefix = $admin ? 'admin' : 'user'); ?>
<div class="table-wrap"><table class="data-table <?php echo e($admin ? 'data-table-admin' : 'data-table-user'); ?>"><colgroup><col class="column-domain"><?php if($admin): ?><col class="column-owner"><?php endif; ?><col class="column-registrar"><col class="column-expiry"><col class="column-status"><col class="column-renewal"><col class="column-actions"></colgroup><thead><tr><th>Domain</th><?php if($admin): ?><th>Owner</th><?php endif; ?><th>Registrar</th><th>Expiry</th><th>Status</th><th>Auto-renew</th><th class="table-actions-head">Actions</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><a class="domain-name" href="<?php echo e(route($prefix.'.domains.show', $record)); ?>"><span class="domain-mini-icon">✿</span><span><?php echo e($record->domain_name); ?><span class="domain-extension"><?php echo e($record->domain_extension); ?></span></span></a></td><?php if($admin): ?><td><a class="owner-link" href="<?php echo e(route('admin.users.show', $record->user)); ?>"><?php echo e($record->user->name); ?></a><small class="cell-subline"><?php echo e($record->user->email); ?></small></td><?php endif; ?><td><?php echo e($record->registrar); ?></td><td><strong><?php echo e($record->expiry_date->format('M j, Y')); ?></strong><?php if($record->display_status === 'expiring'): ?><small class="expiry-hint"><?php echo e(max(0, $record->days_until_expiry)); ?> days left</small><?php elseif($record->display_status === 'expired'): ?><small class="expiry-hint">Expired</small><?php endif; ?></td><td><?php if (isset($component)) { $__componentOriginal8c81617a70e11bcf247c4db924ab1b62 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-badge','data' => ['status' => $record->display_status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($record->display_status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $attributes = $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $component = $__componentOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?></td><td><span class="renewal-chip <?php echo e($record->auto_renewal ? 'renewal-on' : ''); ?>"><?php echo e($record->auto_renewal ? 'On' : 'Off'); ?></span></td><td class="table-actions-cell"><div class="row-actions"><a href="<?php echo e(route($prefix.'.domains.show', $record)); ?>" aria-label="View <?php echo e($record->domain_name); ?>">View</a><a href="<?php echo e(route($prefix.'.domains.edit', $record)); ?>" aria-label="Edit <?php echo e($record->domain_name); ?>">Edit</a><form method="post" action="<?php echo e(route($prefix.'.domains.destroy', $record)); ?>" data-confirm="Delete <?php echo e($record->domain_name); ?><?php echo e($record->domain_extension); ?>? This cannot be undone."><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit">Delete</button></form></div></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="<?php echo e($admin ? 7 : 6); ?>"><?php if (isset($component)) { $__componentOriginal074a021b9d42f490272b5eefda63257c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal074a021b9d42f490272b5eefda63257c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-state','data' => ['title' => 'Your list is ready to bloom','description' => 'Add your first domain record to keep its important details close.','action' => route($prefix.'.domains.create'),'actionLabel' => 'Add a domain','icon' => '🌱']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Your list is ready to bloom','description' => 'Add your first domain record to keep its important details close.','action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route($prefix.'.domains.create')),'action-label' => 'Add a domain','icon' => '🌱']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $attributes = $__attributesOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__attributesOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $component = $__componentOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__componentOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?></td></tr><?php endif; ?>
</tbody></table></div>
<div class="mobile-domain-list"><?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><article class="mobile-domain-card"><div class="mobile-domain-head"><span class="domain-mini-icon">✿</span><span><strong><?php echo e($record->domain_name); ?><?php echo e($record->domain_extension); ?></strong><?php if($admin): ?><small><?php echo e($record->user->name); ?></small><?php endif; ?></span><?php if (isset($component)) { $__componentOriginal8c81617a70e11bcf247c4db924ab1b62 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-badge','data' => ['status' => $record->display_status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($record->display_status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $attributes = $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $component = $__componentOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?></div><div class="mobile-domain-meta"><span><?php echo e($record->registrar); ?></span><span>Expires <?php echo e($record->expiry_date->format('M j, Y')); ?></span><span>Auto-renew <?php echo e($record->auto_renewal ? 'on' : 'off'); ?></span></div><div class="mobile-domain-actions"><a href="<?php echo e(route($prefix.'.domains.show', $record)); ?>">View</a><a href="<?php echo e(route($prefix.'.domains.edit', $record)); ?>">Edit</a><form method="post" action="<?php echo e(route($prefix.'.domains.destroy', $record)); ?>" data-confirm="Delete <?php echo e($record->domain_name); ?><?php echo e($record->domain_extension); ?>? This cannot be undone."><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit">Delete</button></form></div></article><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><div class="mobile-empty"><?php if (isset($component)) { $__componentOriginal074a021b9d42f490272b5eefda63257c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal074a021b9d42f490272b5eefda63257c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-state','data' => ['title' => 'Your list is ready to bloom','description' => 'Add your first domain record to keep its important details close.','action' => route($prefix.'.domains.create'),'actionLabel' => 'Add a domain','icon' => '🌱']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Your list is ready to bloom','description' => 'Add your first domain record to keep its important details close.','action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route($prefix.'.domains.create')),'action-label' => 'Add a domain','icon' => '🌱']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $attributes = $__attributesOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__attributesOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $component = $__componentOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__componentOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?></div><?php endif; ?></div>
<?php /**PATH A:\laragon\www\DomainManagementSystem\resources\views/components/domain-table.blade.php ENDPATH**/ ?>