@props([
    'label' => 'input',
    'model',
])
<div class="mb-3">
    <label for="{{ Str::snake($model) }}" class="form-label">
        {{ Str::title($label) }}

    </label>
    <input {{ $attributes->merge([
        'type' => 'text',
    ]) }} wire:model='{{ $model }}'
        id="{{ Str::snake($model) }}" class="form-control" placeholder="Input {{ Str::title($label) }}">
    @error($model)
        <code class="text-danger ">
            {{ $message }}
        </code>
    @enderror
</div>
