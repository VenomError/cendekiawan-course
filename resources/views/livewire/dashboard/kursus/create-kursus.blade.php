<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Create New Kursus</h3>
                    </div>
                </div>
                <div class="card-body">
                    <x-form action="create()">

                        @if ($thumbnail && $thumbnail->temporaryUrl())
                            <div class="mb-3 text-center">
                                <img
                                    src="{{ $thumbnail->temporaryUrl() }}"
                                    alt="image"
                                    class="img-fluid img-thumbnail rounded"
                                    width="200"
                                />
                            </div>
                        @endif

                        <x-input
                            label="Upload Thumbnail"
                            model="thumbnail"
                            type="file"
                            accept="image/*"
                        />
                        <x-input
                            label="Kursus Name"
                            model="form.name"
                            type="text"
                        />
                        <x-input
                            label="Price (Rp)"
                            model="form.price"
                            type="number"
                        />
                        <x-input
                            label="Duration (Hour)"
                            model="form.hour_duration"
                            type="number"
                        />

                        <x-textarea
                            label="Description"
                            model="form.description"
                            rows="10"
                        />

                        @if ($teacherFoto && $teacherFoto->temporaryUrl())
                            <div class="mb-3 text-center">
                                <img
                                    src="{{ $teacherFoto->temporaryUrl() }}"
                                    alt="image"
                                    class="img-fluid img-thumbnail rounded"
                                    width="200"
                                />
                            </div>
                        @endif
                        <x-input
                            label="Upload Teacher Foto"
                            model="teacherFoto"
                            type="file"
                            accept="image/*"
                        />
                        <x-input
                            label="Teacher Name"
                            model="form.teacher_name"
                            type="text"
                        />

                        <x-slot:button>
                            Create
                        </x-slot:button>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
