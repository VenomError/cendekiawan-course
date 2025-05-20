@props(['action'])

<form wire:submit='{{ $action }}'>
    <div class="row">
        {{ $slot }}
    </div>
    <div class="col-12 text-start">
        <x-button-submit
            :action="$action"
            color="success"
            icon=" ri-checkbox-circle-line"
        >
            {{ $button ?? 'Submit' }}
        </x-button-submit>
    </div>

</form>
