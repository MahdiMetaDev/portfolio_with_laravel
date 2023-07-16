<input type="{{ $type }}" placeholder="{{ $placeholder }}" name="{{ $name }}"
       class="{{ $input_class }}"
       value="{{ $value }}">
@error("{{ $name }}")
    <span class="{{ $span_class }}">{{ $message }}</span>
@enderror
