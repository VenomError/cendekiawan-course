<div class="">
    <div class="card">
        <div class="card-header">
            <div class="card-title d-flex w-100 justify-content-between">
                <h4 class="text-capitalize">List Jadwal</h4>
                <a class="btn btn-primary" href="{{ route('dashboard.jadwal.add') }}">Add Jadwal</a>
            </div>
        </div>
        <div class="card-body">
            <x-table :order="[[3, 'desc']]" id="datatable-list-jadwal">
                <x-slot:head>
                    <tr>
                        <th>Kursus</th>
                        <th>Progress Quota</th>
                        <th>Quota</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>status</th>
                        <th>Location</th>
                        <th></th>
                    </tr>
                </x-slot:head>
                <x-slot:body>
                    @foreach ($jadwals as $jadwal)
                        @php
                            $status = $jadwal->status;
                            $total = $jadwal->quota;
                            $registered = $jadwal->pendaftars()->count();
                            $percent =  $total > 0 ? round(($registered / $total) * 100) : 0;

                            if ($percent < 50) {
                                $progressColor = 'success';
                            } elseif ($percent < 75) {
                                $progressColor = 'warning';
                            } else {
                                $progressColor = 'danger';
                            }
                        @endphp

                        <tr class="">
                            <td class="text-center">{{ $jadwal->kursus?->name }}</td>

                            <td class="text-center">
                                <div class="progress  " style="height: 20px;">
                                    <div
                                        class="progress-bar bg-{{ $progressColor }}  "
                                        role="progressbar"
                                        style="width: {{ $percent }}%;"
                                        aria-valuenow="{{ $percent }}"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    >
                                        {{ $registered }}/{{ $total }}
                                    </div>
                                </div>
                            </td>

                            <td class="text-center">{{ $total }}</td>
                            <td class="text-center">
                                {{ $jadwal->start_datetime->format('Y-m-d h:ia') }}</td>
                            <td class="text-center">
                                {{ $jadwal->end_datetime->format('Y-m-d h:ia') }}
                            </td>

                            <td class="text-center">
                                <span class="badge bg-{{ $status['color'] }}">
                                    {{ $status['label'] }}
                                </span>
                            </td>

                            <td class="text-center">{{ $jadwal->location }}</td>

                            <td class="text-center">
                                <x-button-action
                                    :action="route('dashboard.jadwal.edit', [
                                        'id' => $jadwal->id,
                                    ])"
                                    color="warning"
                                    icon="ri-edit-2-line"
                                    type="a"
                                />
                                <x-button-action
                                    action="delete({{ $jadwal->id }})"
                                    color="danger"
                                    icon="ri-delete-bin-line"
                                />
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-table>
        </div>
    </div>
</div>
