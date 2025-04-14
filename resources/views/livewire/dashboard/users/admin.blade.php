<div>

    <div class="row">
        <div class="col-12">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-shield-user-line widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Number of Customers">
                        Total Admin
                    </h5>
                    <h3 class="mt-3 mb-3">{{ $admins->count() }}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class=" card-header ">
                    <div class=" card-title ">
                        <h3>List Admin</h3>
                    </div>
                </div>
                <div class="card-body">
                    <x-table>

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
                            @foreach ($admins as $admin)
                                <tr>
                                    <th>{{ Str::title($admin->name) }}</th>
                                    <th>{{ $admin->email }}</th>
                                    <th>
                                        <span class="badge bg-info">{{ $admin->getRoleNames()->first() }}</span>
                                    </th>
                                    <th>{{ $admin->created_at->format('d M Y, h:ia') }}</th>
                                    <th class="text-center">
                                        @if ($admin->id == auth()->id())
                                            <x-button-action action="edit()" color="warning" icon="ri-edit-2-line" />
                                        @endif
                                        @if ($admin->id != auth()->id())
                                            <x-button-action action="delete({{ $admin->id }})" color="danger"
                                                icon="ri-delete-bin-2-line" />
                                        @endif
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
