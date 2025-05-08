<div class="">

    <div class="card">
        <div class="card-body">
            <x-table>
                <x-slot:head>
                    <tr>
                        <th>Pendaftar</th>
                        <th>Kursus</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Location</th>
                        <th>Quota</th>
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
                            <td>{{ $jadwal->quota }}</td>
                            <td>
                                <x-button-action
                                    action="cancel({{ $jadwal }})"
                                    color="danger"
                                    icon="ri-close-line"
                                >
                                    Cancel
                                </x-button-action>
                                <x-button-action
                                    action="edit()"
                                    color="warning"
                                    icon="ri-edit-2-line"
                                />

                                <x-button-action
                                    action="cancel({{ $jadwal }})"
                                    color="danger"
                                    icon="ri-close-line"
                                >
                                    Cancel
                                </x-button-action>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-table>
        </div>
    </div>

</div>
