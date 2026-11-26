@if(session('success'))<div class="flash flash-success" role="status"><span>✿</span><p>{{ session('success') }}</p><button type="button" aria-label="Dismiss" data-dismiss>×</button></div>@endif
@if(session('error'))<div class="flash flash-error" role="alert"><span>!</span><p>{{ session('error') }}</p><button type="button" aria-label="Dismiss" data-dismiss>×</button></div>@endif
@if($errors->any())<div class="flash flash-error" role="alert"><span>!</span><p>Please check the highlighted fields and try again.</p><button type="button" aria-label="Dismiss" data-dismiss>×</button></div>@endif
