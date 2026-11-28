<?php $__env->startSection('title', 'Profile & security'); ?>
<?php $__env->startSection('crumb', 'Profile & security'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-heading"><div><span class="eyebrow">YOUR ACCOUNT</span><h1>Profile & security <span class="heading-flower">♡</span></h1><p>Keep your account details current and your password safe.</p></div></div><div class="profile-grid"><form action="<?php echo e(route('profile.update')); ?>" method="post" class="form-card profile-card"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?><div class="profile-card-heading"><span class="profile-large-avatar"><?php echo e(mb_substr($person->name, 0, 1)); ?></span><div><h2>Personal details</h2><p>Joined <?php echo e($person->created_at->format('F j, Y')); ?> · <?php echo e(ucfirst($person->role)); ?> account</p></div></div><div class="field"><label for="name">Full name <span>*</span></label><input id="name" name="name" value="<?php echo e(old('name', $person->name)); ?>" required><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="field-error"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div><div class="field"><label for="email">Email address <span>*</span></label><input type="email" id="email" name="email" value="<?php echo e(old('email', $person->email)); ?>" required><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="field-error"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div><div class="form-actions"><button class="button" type="submit">Save profile</button></div></form><form action="<?php echo e(route('profile.password')); ?>" method="post" class="form-card profile-card"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?><div class="profile-card-heading"><span class="security-icon">🔒</span><div><h2>Change password</h2><p>Choose a password with at least 8 characters, letters, and numbers.</p></div></div><div class="field"><label for="current_password">Current password <span>*</span></label><input type="password" id="current_password" name="current_password" autocomplete="current-password" required><?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="field-error"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div><div class="field"><label for="password">New password <span>*</span></label><input type="password" id="password" name="password" autocomplete="new-password" required><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="field-error"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div><div class="field"><label for="password_confirmation">Confirm new password <span>*</span></label><input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" required></div><div class="form-actions"><button class="button" type="submit">Update password</button></div></form></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\laragon\www\DomainManagementSystem\resources\views/profile/edit.blade.php ENDPATH**/ ?>