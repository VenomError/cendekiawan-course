<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <x-form action="update()">

                    <x-input label="name" model="name" />
                    <x-input label="email" model="email" />
                    <x-input
                        label="current password"
                        model="currentPassword"
                        type="password"
                    />
                    <x-input
                        label="new password"
                        model="password"
                        type="password"
                    />

                    <x-slot:button>Update</x-slot:button>

                </x-form>
            </div>
        </div>
    </div>
</div>
