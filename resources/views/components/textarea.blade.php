@props([
    'label' => 'input',
    'model',
])
<div class="mb-3">
     <label
        for="{{ Str::snake($model) }}"
        class="form-label">
        {{ Str::title($label) }}
    </label>
    <textarea
        class="form-control"
        wire:model='{{ $model }}'
        id="{{ Str::snake($model) }}"
        {{ $attributes->merge([
            'rows' => 5
        ]) }}
        placeholder="Enter {{ Str::title($label) }}"
        ></textarea>
    @error($model)
    <code class="text-danger ">
        {{ $message }}
    </code>
    @enderror
</div>
