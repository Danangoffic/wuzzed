@isset($label)
    <label for="{{ $nama }}">{{ $label }}</label>
@endisset

<input type="{{ $type }}" value="{{ $value ?? old($nama) }}" name="{{ $nama }}" id="{{ $nama }}"
    placeholder="{{ $placeholder }}" @isset($required) required @endisset
    class="{{ $classInput ?? 'form-control' }}" @isset($action) {{ $action }} @endisset />

@error($nama)
    <div class="invalid-feedback" role="alert">
        <p>{{ $message }}</p>
    </div>
@enderror
