@props([
    'type' => 'button',
    'color' => 'danger' ,
    'icon' => 'ri-delete-bin-2-line',
    'action'
])
@if ($type == 'button')
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

    <span>{{ $slot }}</span>
</button>
@elseif ($type == 'a')
<a
    href="{{ $action }}"
    class="btn btn-sm btn-{{ $color }}"
>
    <i
        class="{{ $icon }}"
        wire:loading.remove
    >
    </i>
    <span
        wire:loading
        class="spinner-border spinner-border-sm"
        role="status"
        aria-hidden="true"
        >
    </span>
    <span>{{ $slot }}</span>

</a>
@endif
