@props([
    'color' => 'danger' ,
    'icon' => 'ri-delete-bin-2-line',
    'action' => 'submit()'
])
<button
    type="submit"
    class="btn  btn-md btn-outline-{{ $color }}"
    wire:loading.attr='disabled'
    >
    <i
    class="{{ $icon }} me-2"
    wire:loading.remove
    wire:target="{{ $action }}">
    </i>
    <span
        wire:loading
        wire:target="{{ $action }}"
        class="spinner-border spinner-border-sm me-2"
        role="status"
        aria-hidden="true"
        >
    </span>
    {{ $slot }}
</button>
