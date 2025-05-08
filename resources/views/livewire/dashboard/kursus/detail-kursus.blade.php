<div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Kursus Information</h4>
                    <p class="text-muted font-13">
                        {{ $kursus->description }}
                    </p>

                    <hr>

                    <div class="text-start">

                        <p class="text-muted">
                            <strong>Name :</strong>
                            <span class="ms-2">{{ $kursus->name }}</span>
                        </p>
                        <p class="text-muted">
                            <strong>Price :</strong>
                            <span class="ms-2">{{ Number::currency($kursus->price, 'IDR', 'ID') }}</span>
                        </p>
                        <p class="text-muted">
                            <strong>Duration (Hour) :</strong>
                            <span class="ms-2">{{ $kursus->hour_duration }} Jam</span>
                        </p>
                        <p class="text-muted">
                            <strong>Duration:</strong>
                            <span class="ms-2">{{ convertHoursToDaysAndHours($kursus->hour_duration) }}</span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">

                {{-- Total Pendaftar --}}
                <div class="col-sm-6">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="  ri-user-line float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Total Pendaftar</h6>
                            <h2 class="m-b-20">{{ $kursus->pendaftars_count }}</h2>

                        </div>
                    </div>
                </div>

                {{-- Total Jadwal --}}
                <div class="col-sm-6">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class=" ri-calendar-event-line float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Total Jadwal</h6>
                            <h2 class="m-b-20">{{ $kursus->jadwals_count }}</h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pendaftar Kursus</h4>
                        </div>
                        <div class="card-body">
                            <x-table id="table-kursus-pendaftar">
                                <x-slot:head>
                                    <tr>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </x-slot:head>
                                <x-slot:body>
                                    @foreach ($pendaftars as $pendaftar)
                                        <tr>
                                            <td>{{ $pendaftar->user->name }}</td>
                                            <td>{{ $pendaftar->user->email }}</td>
                                            <td>{{ $pendaftar->phone }}</td>
                                            <td class="text-center">
                                                <span class="badge bg-{{ pendaftarStatusColor($pendaftar->status) }}">
                                                    {{ $pendaftar->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </x-slot:body>
                            </x-table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jadwal Kursus</h4>
                        </div>
                        <div class="card-body">
                            <x-table id="table-kursus-jadwal">
                                <x-slot:head>
                                    <tr>
                                        <th>Pendaftar</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Quota</th>
                                        <th>Location</th>
                                        <th>Created At</th>
                                    </tr>
                                </x-slot:head>
                                <x-slot:body>
                                    @foreach ($jadwals as $jadwal)
                                        <tr>
                                            <td>{{ $jadwal->pendaftar?->user?->name }}</td>
                                            <td>{{ $jadwal->start_datetime }}</td>
                                            <td>{{ $jadwal->end_datetime }}</td>
                                            <td>{{ $jadwal->quota }}</td>
                                            <td>{{ $jadwal->location }}</td>
                                            <td>{{ $jadwal->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </x-slot:body>
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
