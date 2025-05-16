<div>
    <div class="row">
        <div class="col-lg-6">
            <x-widget.count title="Total Admin" :count="$totalAdmin" icon=" ri-shield-user-line " />
        </div>
        <div class="col-lg-6">
            <x-widget.count title="Total Peserta" :count="$totalPeserta" icon=" ri-user-fill " />
        </div>

        <div class="col-lg-6">
            <x-widget.count title="Total Kursus" :count="$totalKursus" icon=" ri-book-line " />
        </div>
        <div class="col-lg-6">
            <x-widget.count title="Total Jadwal" :count="$totalJadwal" icon=" ri-calendar-line " />
        </div>
        
        <div class="col-lg-12">
            <x-widget.count title="Total Pendaftar" :count="$totalPendaftar" icon=" ri-contacts-line " />
        </div>
        <div class="col-lg-4">
            <x-widget.count title="New Pendaftar" :count="$totalPendaftarNew" icon="ri-arrow-up-fill" color="success" />
        </div>
        <div class="col-lg-4">
            <x-widget.count title="Cancel Pendaftar" :count="$totalPendaftarCancel" icon="ri-close-circle-line" color="danger" />
        </div>
        <div class="col-lg-4">
            <x-widget.count title="Active Pendaftar" :count="$totalPendaftarActive" icon="ri-check-line" color="info" />
        </div>

        <livewire:dashboard.pendaftar.new-pendaftar />
        <livewire:jadwal.list-jadwal  />
    </div>
</div>
