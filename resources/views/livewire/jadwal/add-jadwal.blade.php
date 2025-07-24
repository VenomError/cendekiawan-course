<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <x-form action="submit()">

                    <div class="mb-3">
                        <label class="form-label" for="kursus">Kursus</label>
                        <select
                            id="kursus"
                            class="form-select"
                            wire:model='form.kursus_id'
                        >
                            <option value="">Select Kursus</option>
                            @foreach ($kursuses as $kursus)
                                <option wire:key='{{ $kursus->slug }}' value="{{ $kursus->id }}">
                                    {{ $kursus->name }}</option>
                            @endforeach
                        </select>
                        @error('form.kursus_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">

                        <x-input
                            label="Start Datetime"
                            model="form.start_datetime"
                            type="datetime-local"
                        />
                        <x-input
                            label="Quota"
                            model="form.quota"
                            type="number"
                        />
                        <x-input
                            label="Location"
                            model="form.location"
                            type="text"
                        />

                    </div>

                </x-form>
            </div>
        </div>
    </div>
</div>
