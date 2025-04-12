<div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class=" card-header ">
                    <div class=" card-title ">
                        <h3>List Peserta</h3>
                    </div>
                </div>
                <div class="card-body" >
                    <x-table >

                        <x-slot:head>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Created At</th>
                                <th></th>
                            </tr>
                        </x-slot:head>
                        <x-slot:body>
                            @foreach ($pesertas as $peserta)
                                <tr>
                                    <th>{{ Str::title($peserta->name) }}</th>
                                    <th>{{ $peserta->email }}</th>
                                    <th>
                                        <span class="badge bg-info">{{ $peserta->getRoleNames()->first() }}</span>
                                    </th>
                                    <th>{{ $peserta->created_at->format('d M Y, h:ia') }}</th>
                                    <th class="text-center">
                                        <x-button-action action="view({{ $peserta->id }})" color="info" icon=" ri-eye-line" />
                                        <x-button-action action="delete({{ $peserta->id }})" color="danger" icon="ri-delete-bin-2-line"

                                            />
                                    </th>
                                </tr>
                            @endforeach
                        </x-slot:body>

                    </x-table>
                </div>
            </div>
        </div>
    </div>

</div>
