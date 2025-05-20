<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <x-form action="save()">
                    @foreach ($metadatas as $metadata)
                        <x-input :label="Str::replace('_', ' ', $metadata->key)" model="keys.{{ $metadata->key }}" />

                        <x-slot:button>
                            Update
                        </x-slot:button>
                    @endforeach
                </x-form>
            </div>
        </div>
    </div>

</div>
