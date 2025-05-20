<div>

    <div class="row">
        <div class="col-12">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-graduation-cap-line widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0">
                        Total Kursus
                    </h5>
                    <h3 class="mb-3 mt-3">{{ $kursuses->count() }}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>List Kurus</h3>
                    </div>
                    @hasrole(['admin'])
                        <div class="">
                            <a href="{{ route('dashboard.kursus.create') }}" class="btn btn-primary">Add
                                Kursus</a>
                        </div>
                    @endhasrole
                </div>
                <div class="card-body">
                    <x-table>

                        <x-slot:head>
                            <tr>
                                <th>Kursus Name</th>
                                <th>Teacher</th>
                                <th>Duration (Hour)</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Total Pendaftar</th>
                                <th>Total Jadwal</th>
                                <th>Created At</th>
                                <th></th>
                            </tr>
                        </x-slot:head>
                        <x-slot:body>
                            @foreach ($kursuses as $kursus)
                                <tr>
                                    <td>
                                        <img
                                            src="{{ Storage::url($kursus->thumbnail) }}"
                                            alt=""
                                            class="avatar-md me-2"
                                        >
                                        <span>{{ $kursus->name }}</span>
                                    </td>
                                    <td>
                                        <img
                                            src="{{ Storage::url($kursus->teacher_foto) }}"
                                            alt=""
                                            class="avatar-md me-2"
                                        >
                                        <span>{{ $kursus->teacher_name ?? '-' }}</span>
                                    </td>

                                    <td>{{ $kursus->hour_duration }} </td>
                                    <td>{{ convertHoursToDaysAndHours($kursus->hour_duration) }}
                                        </th>

                                    <td>{{ Number::currency($kursus->price, 'IDR', 'ID', 2) }}</td>

                                    <td>{{ $kursus->pendaftars_count }}</td>
                                    <td>{{ $kursus->jadwals_count }}</td>
                                    <td>{{ $kursus->created_at->format('d M Y, h:ia') }}</td>
                                    <td class="text-center">
                                        <x-button-action
                                            type="a"
                                            action="{{ route('dashboard.kursus.detail', ['kursus_id' => $kursus->id]) }}"
                                            color="info"
                                            icon="ri-eye-line"
                                        />
                                        @hasrole(['admin'])
                                        <x-button-action
                                            type="a"
                                            action="{{ route('dashboard.kursus.edit', ['kursus_id' => $kursus->id]) }}"
                                            color="warning"
                                            icon="ri-edit-2-line"
                                        />
                                        <x-button-action
                                            action="delete({{ $kursus->id }})"
                                            color="danger"
                                            icon="ri-delete-bin-2-line"
                                        />
                                        @endhasrole
                                    </td>
                                </tr>
                            @endforeach
                        </x-slot:body>

                    </x-table>
                </div>
            </div>
        </div>
    </div>

</div>
