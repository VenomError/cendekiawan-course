<div class="">
    <div class="card">
        <div class="card-header">
                <div class="card-title">
                    <h4 class="text-capitalize">List Jadwal</h4>
                </div>
            </div>
        <div class="card-body">
            <x-table :order="[[2, 'desc']]" id="datatable-list-jadwal" >
                <x-slot:head>
                    <tr>
                        <th>Pendaftar</th>
                        <th>Kursus</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </x-slot:head>
                <x-slot:body>
                    @foreach ($jadwals as $jadwal)
                        <tr>
                            <td>{{ $jadwal?->pendaftar?->phone }}</td>
                            <td>{{ $jadwal?->kursus?->name }}</td>
                            <td>{{ $jadwal->start_datetime }}</td>
                            <td>{{ $jadwal->end_datetime }}</td>
                            <td>{{ $jadwal->location }}</td>
                            <td>
                                <span
                                    class="badge bg-{{ pendaftarStatusColor($jadwal->pendaftar->status) }}"
                                >
                                    {{ $jadwal->pendaftar->status }}
                                </span>
                            </td>
                            <td>
                                <x-button-action
                                    :action="route('dashboard.jadwal.edit' , ['id' => $jadwal->id])"
                                    color="warning"
                                    icon="ri-edit-2-line"
                                    type="a"
                                />
                                <x-button-action
                                    action="delete()"
                                    color="danger"
                                    icon=" ri-delete-bin-line "
                                />
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-table>
        </div>
    </div>
</div>
