<div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Add New Admin</h3>
                    </div>
                </div>
                <div class="card-body">
                    <x-form action="submit()">
                        <x-input model="form.name" label="nama" />
                        <x-input model="form.email" label="email" type="email" />
                        <x-input model="form.password" label="password" type="password" />
                    </x-form>
                </div>
            </div>
        </div>
    </div>

</div>
