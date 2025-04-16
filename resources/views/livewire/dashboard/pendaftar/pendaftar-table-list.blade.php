<div>

    <div class="row"></div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4 class=" text-capitalize ">List {{ $status ?? 'All' }} Pendaftar</h4>
                </div>
            </div>
            <div class="card-body">
                <x-table>

                    <x-slot:head>
                        <tr>
                            <th>User</th>
                            <th>Phone</th>
                            <th>Institute</th>
                            <th>Pekerjaan</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </x-slot:head>

                    <x-slot:body>

                        @foreach ($pendaftars as $pendaftar)
                            <tr>
                                <td>{{ $pendaftar?->user?->name }}</td>
                                <td>{{ $pendaftar->phone }}</td>
                                <td>{{ $pendaftar->institute }}</td>
                                <td>{{ $pendaftar->pekerjaan }}</td>
                                <td>{{ $pendaftar->jabatan }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ pendaftarStatusColor($pendaftar->status) }}">
                                        {{ $pendaftar->status }}
                                    </span>
                                </td>
                                <td>
                                    {{ $pendaftar->created_at }}
                                </td>
                                <td class="text-center">

                                    @if ($status == \App\Enum\PendaftarStatus::NEW || $status == \App\Enum\PendaftarStatus::ACTIVE)
                                        <x-button-action action="cancel({{ $pendaftar->id }})" color="danger"
                                            icon="ri-close-line">
                                            Cancel
                                        </x-button-action>
                                    @endif
                                    @if ($status == \App\Enum\PendaftarStatus::CANCEL)
                                        <x-button-action action="active({{ $pendaftar->id }})" color="info"
                                            icon="ri-check-line">
                                            Active
                                        </x-button-action>
                                    @endif
                                    <x-button-action action="delete({{ $pendaftar->id }})" color="danger"
                                        icon="ri-delete-bin-2-line" />
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
