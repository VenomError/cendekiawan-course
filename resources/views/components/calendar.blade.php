@props([
    'data' => [],
    'start' => now()->format('Y-m-d'),
])
@push('head')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap"
        rel="stylesheet">

    <x-link rel="stylesheet" href="fonts/icomoon/style.css" />

    <x-link href='calendar/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <x-link href='calendar/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />

    <!-- Bootstrap CSS -->
    <x-link rel="stylesheet" href="calendar/css/bootstrap.min.css" />

    <!-- Style -->
    <x-link rel="stylesheet" href="calendar/css/style.css" />
@endpush

<div id='calendar'></div>

@push('script')
    <x-script src="calendar/js/jquery-3.3.1.min.js"></x-script>
    <x-script src="calendar/js/popper.min.js"></x-script>
    <x-script src="calendar/js/bootstrap.min.js"></x-script>

    <x-script src='calendar/fullcalendar/packages/core/main.js'></x-script>
    <x-script src='calendar/fullcalendar/packages/interaction/main.js'></x-script>
    <x-script src='calendar/fullcalendar/packages/daygrid/main.js'></x-script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            let evens = [{
                    "title": "Kursus Bahasa Inggris",
                    "start": "2025-07-25T08:00:00",
                    "end": "2025-07-25T10:00:00",
                    "color": "#28a745"
                },
                {
                    "title": "Kursus Matematika",
                    "start": "2025-07-26T13:00:00",
                    "end": "2025-07-26T15:00:00",
                    "color": "#007bff"
                }
            ];

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid'],
                defaultDate: @json($start),
                editable: false,
                eventLimit: false,
                events: @json($data)
            });

            calendar.render();
        });
    </script>

    <x-script src="calendar/js/main.js"></x-script>
@endpush
