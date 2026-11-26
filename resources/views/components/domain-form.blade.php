@php
    $isAdmin = $isAdmin ?? false;
    $record = $record ?? new \App\Models\DomainRecord();
    $submitLabel = $submitLabel ?? 'Save domain';
@endphp
<form action="{{ $action }}" method="post" class="form-card domain-form">
    @csrf
    @if($method ?? null) @method($method) @endif
    @if($isAdmin)
        <div class="field field-full"><label for="user_id">Owner <span>*</span></label><select id="user_id" name="user_id" required><option value="">Choose an account</option>@foreach($users as $owner)<option value="{{ $owner->id }}" @selected((string) old('user_id', $record->user_id) === (string) $owner->id)>{{ $owner->name }} · {{ $owner->email }}</option>@endforeach</select>@error('user_id')<small class="field-error">{{ $message }}</small>@enderror</div>
    @endif
    <div class="field"><label for="domain_name">Domain name <span>*</span></label><div class="input-affix"><input id="domain_name" name="domain_name" value="{{ old('domain_name', $record->domain_name) }}" placeholder="mycreativecorner" maxlength="63" required><input aria-label="Domain extension" id="domain_extension" name="domain_extension" value="{{ old('domain_extension', $record->domain_extension) }}" placeholder=".com" maxlength="64" required></div>@error('domain_name')<small class="field-error">{{ $message }}</small>@enderror @error('domain_extension')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="registrar">Registrar <span>*</span></label><input id="registrar" name="registrar" value="{{ old('registrar', $record->registrar) }}" placeholder="Namecheap, Cloudflare…" maxlength="120" required>@error('registrar')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="registration_date">Registration date <span>*</span></label><input type="date" id="registration_date" name="registration_date" value="{{ old('registration_date', $record->registration_date?->format('Y-m-d')) }}" required>@error('registration_date')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="expiry_date">Expiry date <span>*</span></label><input type="date" id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $record->expiry_date?->format('Y-m-d')) }}" required>@error('expiry_date')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="status">Record status <span>*</span></label><select id="status" name="status" required>@foreach(['active' => 'Active', 'pending' => 'Pending', 'inactive' => 'Inactive'] as $value => $label)<option value="{{ $value }}" @selected(old('status', $record->status ?? 'active') === $value)>{{ $label }}</option>@endforeach</select>@error('status')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="auto_renewal">Auto-renewal <span>*</span></label><select id="auto_renewal" name="auto_renewal" required><option value="0" @selected((string) old('auto_renewal', $record->auto_renewal ? '1' : '0') === '0')>Off</option><option value="1" @selected((string) old('auto_renewal', $record->auto_renewal ? '1' : '0') === '1')>On</option></select>@error('auto_renewal')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="price">Annual cost <small>(optional)</small></label><div class="money-input"><span>$</span><input type="number" id="price" name="price" min="0" step="0.01" value="{{ old('price', $record->price) }}" placeholder="0.00"></div>@error('price')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="field field-full"><label for="notes">Notes <small>(optional)</small></label><textarea id="notes" name="notes" rows="4" maxlength="3000" placeholder="Add a little context for future you…">{{ old('notes', $record->notes) }}</textarea>@error('notes')<small class="field-error">{{ $message }}</small>@enderror</div>
    <div class="form-actions field-full"><a class="button button-quiet" href="{{ $isAdmin ? route('admin.domains.index') : route('user.domains.index') }}">Cancel</a><button class="button" type="submit">{{ $submitLabel }} <span>→</span></button></div>
</form>
