<div>

    <div class="row"></div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4 class="text-capitalize">List {{ $status ?? 'All' }} Pendaftar</h4>
                </div>
            </div>
            <div class="card-body">
                <x-table>

                    <x-slot:head>
                        <tr>
                            <th>User</th>
                            <th>Kursus</th>
                            <th>Phone</th>
                            <th>Institute</th>
                            <th>Pekerjaan</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Payment Status</th>
                            <th>Created At</th>
                            @hasrole(['admin'])
                                <th></th>
                            @endhasrole
                        </tr>
                    </x-slot:head>

                    <x-slot:body>

                        @foreach ($pendaftars as $pendaftar)
                            <tr>
                                @php
                                    $pendaftar->load('kursuses');
                                @endphp
                                <td>{{ $pendaftar?->user?->name }}</td>
                                <td>{{ $pendaftar->kursuses->first()?->name }}</td>
                                <td>{{ $pendaftar->phone }}</td>
                                <td>{{ $pendaftar->institute }}</td>
                                <td>{{ $pendaftar->pekerjaan }}</td>
                                <td>{{ $pendaftar->jabatan }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge bg-{{ pendaftarStatusColor($pendaftar->status) }}"
                                    >
                                        {{ $pendaftar->status }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <x-button-action
                                        :action="$pendaftar->pembayaran?->receiptUrl"
                                        color="primary"
                                        icon="ri-file-line"
                                        type="a"
                                        title="dasda"
                                    >Receipt</x-button-action>
                                    <span
                                        class="btn  btn-sm btn-{{ pembayaranStatusColor($pendaftar?->pembayaran?->status) }}"
                                    >
                                        {{ $pendaftar?->pembayaran?->status }}
                                    </span>
                                </td>
                                <td>
                                    {{ $pendaftar->created_at }}
                                </td>
                                @hasrole(['admin'])
                                    <td class="text-center">
                                        @if ($status == \App\Enum\PendaftarStatus::NEW || $status == \App\Enum\PendaftarStatus::ACTIVE)
                                            <x-button-action
                                                action="cancel({{ $pendaftar->id }})"
                                                color="danger"
                                                icon="ri-close-line"
                                            >
                                                Cancel
                                            </x-button-action>
                                        @endif
                                        @if ($status == \App\Enum\PendaftarStatus::CANCEL || $status == \App\Enum\PendaftarStatus::NEW)
                                            <x-button-action
                                                action="active({{ $pendaftar->id }})"
                                                color="info"
                                                icon="ri-check-line"
                                            >
                                                Active
                                            </x-button-action>
                                        @endif
                                        <x-button-action
                                            action="delete({{ $pendaftar->id }})"
                                            color="danger"
                                            icon="ri-delete-bin-2-line"
                                        />

                                    </td>
                                @endhasrole
                            </tr>
                        @endforeach

                    </x-slot:body>

                </x-table>
            </div>
        </div>
    </div>
</div>

</div>
