<div>

    <div class="row">
        <div class="col-12">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-user-2-line widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Number of Customers">
                        Total Pimpinan
                    </h5>
                    <h3 class="mt-3 mb-3">{{ $pimpinans->count() }}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class=" card-header ">
                    <div class=" card-title ">
                        <h3>List Pimpinan</h3>
                    </div>
                    <div class="">
                        <a href="{{ route('dashboard.user.add-pimpinan') }}" class="btn btn-primary" >Add New Pimpinan</a>
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
                            @foreach ($pimpinans as $pimpinan)
                                <tr>
                                    <th>{{ Str::title($pimpinan->name) }}</th>
                                    <th>{{ $pimpinan->email }}</th>
                                    <th>
                                        <span class="badge bg-info">{{ $pimpinan->getRoleNames()->first() }}</span>
                                    </th>
                                    <th>{{ $pimpinan->created_at->format('d M Y, h:ia') }}</th>
                                    <th class="text-center">
                                        @if ($pimpinan->id == auth()->id())
                                        <x-button-action type="a" action="{{ route('dashboard.user.edit-pimpinan' , ['id' => $pimpinan->id]) }}" color="warning" icon="ri-edit-2-line" />
                                        @endif
                                        @if ($pimpinan->id != auth()->id())
                                        <x-button-action action="delete({{ $pimpinan->id }})" color="danger" icon="ri-delete-bin-2-line" />
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
