<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Edit Kursus</h3>
                    </div>
                </div>
                <div class="card-body">
                    <x-form action="update()">


                        <x-input label="Kursus Name" model="form.name" type="text" />
                        <x-input label="Price (Rp)" model="form.price" type="number" />
                        <x-input label="Duration (Hour)" model="form.hour_duration" type="number" />

                        <x-textarea label="Description" model="form.description" rows="10" />

                        <x-slot:button >
                            Update
                        </x-slot:button>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
