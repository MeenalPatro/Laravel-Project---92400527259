<?php $__env->startSection('title', 'Log in'); ?>
<?php $__env->startSection('content'); ?>
<section class="auth-section"><div class="auth-art"><span class="auth-art-flower">✿</span><div class="auth-orbit"><span>✧</span><span>♡</span><span>✿</span><div class="auth-globe">•ᴗ•</div></div><p>Welcome back to your<br><strong>digital garden.</strong></p><small>Everything has a place here.</small></div><div class="auth-card-wrap"><span class="auth-sticker auth-sticker-star" aria-hidden="true">✦</span><span class="auth-sticker auth-sticker-heart" aria-hidden="true">♡</span><form class="auth-card" method="post" action="<?php echo e(route('login.store')); ?>"><?php echo csrf_field(); ?><span class="eyebrow">Lovely to see you again</span><h1>Welcome back</h1><p class="auth-intro">Sign in to pick up right where you left off.</p><div class="field"><label for="email">Email address <span>*</span></label><input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" required autofocus><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="field-error"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div><div class="field"><label for="password">Password <span>*</span></label><input type="password" id="password" name="password" autocomplete="current-password" required><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="field-error"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div><label class="check-field"><input type="checkbox" name="remember" value="1" <?php if(old('remember')): echo 'checked'; endif; ?>><span>Keep me signed in</span></label><button class="button button-wide" type="submit">Log in to DomainBloom <span>→</span></button><p class="auth-switch">New here? <a href="<?php echo e(route('register')); ?>">Create your account</a></p><div class="auth-secure">🔒 Your account is protected with secure sign-in.</div></form></div></section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\laragon\www\DomainManagementSystem\resources\views/auth/login.blade.php ENDPATH**/ ?>