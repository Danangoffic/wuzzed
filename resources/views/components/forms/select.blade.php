@isset($label)
    <label for="{{ $nama }}">{{ $label }}</label>
@endisset

<select name="{{ $nama }}" id="{{ $nama }}" class="{{ $classInput ?? 'form-control' }}"
    @isset($required) required @endisset
    @isset($action) {{ $action }} @endisset>
    <?= $slot ?>
</select>

@error($nama)
    <div class="invalid-feedback" role="alert">
        <p>{{ $message }}</p>
    </div>
@enderror
