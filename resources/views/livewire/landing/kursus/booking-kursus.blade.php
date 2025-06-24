<div class="">
    <x-section.header-overlay title="Booking Kursus" />
    <section class="course-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout-page__billing-address">
                        <form class="checkout-page__form" wire:submit='submit()'>
                            <h2 class="checkout-page__billing-address__title">Personal Info</h2>
                            <div class="row bs-gutter-x-20">
                                {{-- Phone --}}
                                <div class="col-xl-6">
                                    <code class="px-2">
                                        @error('pendaftarForm.phone')
                                            {{ $message }}
                                        @enderror
                                    </code>
                                    <div class="checkout-page__input-box">
                                        <label for="" class="form-label">
                                            Phone Number
                                        </label>
                                        <input
                                            type="tel"
                                            @error('pendaftarForm.phone')
                                            class=" border border-danger "
                                            @enderror
                                            placeholder="Input Phone Number"
                                            wire:model='pendaftarForm.phone'
                                        >
                                    </div>
                                </div>
                                {{-- Institute --}}
                                <div class="col-xl-6">
                                    <code class="px-2">
                                        @error('pendaftarForm.institute')
                                            {{ $message }}
                                        @enderror
                                    </code>
                                    <div class="checkout-page__input-box">
                                         <label for="" class="form-label">
                                            Institute
                                        </label>
                                        <input
                                            type="text"
                                            @error('pendaftarForm.institute')
                                                class=" border border-danger "
                                            @enderror
                                            placeholder="Input Institute"
                                            wire:model='pendaftarForm.institute'
                                        >
                                    </div>
                                </div>
                                {{-- Pekerjaan --}}
                                <div class="col-xl-6">
                                    <code class="px-2">
                                        @error('pendaftarForm.pekerjaan')
                                            {{ $message }}
                                        @enderror
                                    </code>
                                    <div class="checkout-page__input-box">
                                         <label for="" class="form-label">
                                            Pekerjaan
                                        </label>
                                        <input
                                            type="text"
                                            @error('pendaftarForm.pekerjaan')
                                                class=" border border-danger "
                                            @enderror
                                            placeholder="Input Pekerjaan"
                                            wire:model='pendaftarForm.pekerjaan'
                                        >
                                    </div>
                                </div>
                                {{-- Jabatan --}}
                                <div class="col-xl-6">
                                    <code class="px-2">
                                        @error('pendaftarForm.jabatan')
                                            {{ $message }}
                                        @enderror
                                    </code>
                                    <div class="checkout-page__input-box">
                                         <label for="" class="form-label">
                                            Jabatan
                                        </label>
                                        <input
                                            type="text"
                                            @error('pendaftarForm.jabatan')
                                                class=" border border-danger "
                                            @enderror
                                            placeholder="Input Jabatan"
                                            wire:model='pendaftarForm.jabatan'
                                        >
                                    </div>
                                </div>

                                {{-- JADWAL FORM --}}

                                {{-- Start Date --}}
                                <div class="col-xl-6">
                                    <code class="px-2">
                                        @error('jadwalForm.start_datetime')
                                            {{ $message }}
                                        @enderror
                                    </code>
                                    <div class="checkout-page__input-box">
                                         <label for="" class="form-label">
                                            Booking Date
                                        </label>
                                        <input
                                            type="datetime-local"
                                            @error('jadwalForm.start_datetime')
                                            class=" border border-danger "
                                            @enderror
                                            placeholder="Input Booking Date"
                                            wire:model='jadwalForm.start_datetime'
                                        >
                                    </div>
                                </div>
                                {{-- Location --}}
                                <div class="col-xl-6">
                                    <code class="px-2">
                                        @error('jadwalForm.location')
                                            {{ $message }}
                                        @enderror
                                    </code>
                                    <div class="checkout-page__input-box">
                                         <label for="" class="form-label">
                                            Location
                                        </label>
                                        <input
                                            type="text"
                                            @error('jadwalForm.location')
                                            class=" border border-danger "
                                            @enderror
                                            placeholder="Input Location"
                                            wire:model='jadwalForm.location'
                                        >
                                    </div>
                                </div>
                                {{-- Quota --}}
                                {{-- <div class="col-xl-6">
                                    <code class="px-2">
                                        @error('jadwalForm.quota')
                                            {{ $message }}
                                        @enderror
                                    </code>
                                    <div class="checkout-page__input-box">
                                         <label for="" class="form-label">
                                            Total Quota
                                        </label>
                                        <input
                                            type="number"
                                            @error('jadwalForm.quota')
                                            class=" border border-danger "
                                            @enderror
                                            placeholder="Input Total Quota"
                                            wire:model='jadwalForm.quota'
                                        >
                                    </div>
                                </div> --}}

                                <div class="row bs-gutter-x-20">
                                    <div class="col-md-4">
                                        <button
                                            type="submit"
                                            class="eduact-btn eduact-btn-second"
                                            wire:loading.attr='disabled'
                                        >
                                            <span class="eduact-btn__curve">
                                            </span>

                                            <span wire:loading.remove>
                                                Booking
                                            </span>
                                            <span wire:loading>
                                                Loading..
                                            </span>
                                        </button>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
