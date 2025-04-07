@props([
    'id' => 'table-datatable',
])
@pushOnce('head')
    <x-link href="dashboard/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <x-link href="dashboard/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <x-link href="dashboard/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <x-link href="dashboard/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <x-link href="dashboard/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <x-link href="dashboard/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endPushOnce

@pushOnce('script')
    <!-- Datatables js -->
    <x-script src="dashboard/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></x-script>
    <x-script src="dashboard/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></x-script>
@endPushOnce

<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
    <thead>
        {{ $head }}
    </thead>


    <tbody>
        {{ $body }}
    </tbody>
</table>

@push('script')
    <script>
        $(document).ready(function() {
            "use strict";

            var a = $("#datatable-buttons").DataTable({
                lengthChange: !1,
                buttons: ["print"],
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
            $("#selection-datatable").DataTable({
                select: {
                    style: "multi"
                },
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            }), a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(
                "#alternative-page-datatable").DataTable({
                pagingType: "full_numbers",
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            }), $("#scroll-vertical-datatable").DataTable({
                scrollY: "350px",
                scrollCollapse: !0,
                paging: !1,
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            }), $("#scroll-horizontal-datatable").DataTable({
                scrollX: !0,
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            }), $("#complex-header-datatable").DataTable({
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                },
                columnDefs: [{
                    visible: !1,
                    targets: -1
                }]
            }), $("#row-callback-datatable").DataTable({
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                },
                createdRow: function(a, e, t) {
                    15e4 < +e[5].replace(/[\$,]/g, "") && $("td", a).eq(5).addClass("text-danger")
                }
            }), $("#state-saving-datatable").DataTable({
                stateSave: !0,
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            }), $("#fixed-columns-datatable").DataTable({
                scrollY: 300,
                scrollX: !0,
                scrollCollapse: !0,
                paging: !1,
                fixedColumns: !0
            }), $(".dataTables_length select").addClass("form-select form-select-sm"), $(
                ".dataTables_length label").addClass("form-label")
        }), $(document).ready(function() {
            var a = $("#fixed-header-datatable").DataTable({
                responsive: !0,
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
            new $.fn.dataTable.FixedHeader(a)
        });
    </script>
@endpush
