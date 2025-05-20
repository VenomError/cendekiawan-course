<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Edit Jadwal</h3>
                    </div>
                </div>
                <div class="card-body">
                    <x-form action="submit()">

                        <x-input
                            label="Start Datetime"
                            model="form.start_datetime"
                            type="datetime-local"
                            value="{{ $form->start_datetime }}"
                        />
                        <x-input
                            label="Location"
                            model="form.location"
                            type="text"
                        />
                        <x-input
                            label="Quota"
                            model="form.quota"
                            type="number"
                        />
                        
                        <x-slot:button>
                            Update
                        </x-slot:button>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
