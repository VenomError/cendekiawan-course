@props([
    'color' => 'danger' ,
    'icon' => 'ri-delete-bin-2-line',
    'action'
])
<button
    type="button"
    class="btn btn-sm btn-{{ $color }}"
    wire:click="{{ $action }}"
    wire:loading.attr='disabled'
    >
    <i
        class="{{ $icon }}"
        wire:loading.remove
        wire:target="{{ $action }}">
    </i>
    <span
        wire:loading
        wire:target="{{ $action }}"
        class="spinner-border spinner-border-sm"
        role="status"
        aria-hidden="true"
        >
    </span>
</button>
