<div>

     <div class="row">
        <div class="col-12">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-graduation-cap-line widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" >
                        Total Kursus
                    </h5>
                    <h3 class="mt-3 mb-3">{{ $kursuses->count() }}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class=" card-header ">
                    <div class=" card-title ">
                        <h3>List Kurus</h3>
                    </div>
                </div>
                <div class="card-body">
                    <x-table>

                        <x-slot:head>
                            <tr>
                                <th>Kursus Name</th>
                                <th>Duration (Hour)</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th></th>
                            </tr>
                        </x-slot:head>
                        <x-slot:body>
                            @foreach ($kursuses as $kursus)
                                <tr>
                                    <th>{{ $kursus->name }}</th>

                                    <th>{{ $kursus->hour_duration }} </th>
                                    <th>{{ convertHoursToDaysAndHours($kursus->hour_duration) }}</th>

                                    <th>{{ Number::currency($kursus->price , 'IDR' , 'ID' , 2) }}</th>

                                    <th>{{ $kursus->created_at->format('d M Y, h:ia') }}</th>
                                    <th class="text-center">
                                        <x-button-action type="a" action="{{ route('dashboard.kursus.detail' , ['kursus_id' => $kursus->id]) }}" color="info" icon="ri-eye-line" />
                                        <x-button-action  type="a" action="{{ route('dashboard.kursus.edit' , ['kursus_id' => $kursus->id]) }}" color="warning" icon="ri-edit-2-line" />
                                        <x-button-action action="delete({{ $kursus->id }})" color="danger"
                                            icon="ri-delete-bin-2-line" />
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
