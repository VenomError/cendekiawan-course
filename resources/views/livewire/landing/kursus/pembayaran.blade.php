<section class="checkout-page">
    <div class="container">
        <div class="checkout-page__your-order mt-0">
            <h2 class="checkout-page__your-order__title">Pembayaran</h2>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <table class="checkout-page__order-table">
                        <thead class="order_table_head">
                            <tr>
                                <th>Product</th>
                                <th class="right">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pro__title">Kursus Name</td>
                                <td class="pro__price">{{ $kursus->name }}</td>
                            </tr>
                            <tr>
                                <td class="pro__title">Price</td>
                                <td class="pro__price">
                                    {{ Number::currency($kursus->price, 'IDR', 'ID') }}</td>
                            </tr>
                            <tr>
                                <td class="pro__title">Total</td>
                                <td class="pro__price">
                                    {{ Number::currency($kursus->price, 'IDR', 'ID') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-12">
                            <span>Silahkan Lakukan Pembayaran Ke Rekening Di Bawah? </span>
                            <div class="checkout-page__notice mb-3">
                                <h2 class="text-primary">BCA : 38921731</h2>
                                <div></div>
                            </div>
                            {{-- Pekerjaan --}}

                            <div class="checkout-page__input-box">
                                <label for="" class="form-label">
                                    Bukti Pembayaran
                                </label>
                                <input
                                    type="file"
                                    @error('form.receipt')
                            class=" border border-danger "
                            @enderror
                                    wire:model='form.receipt'
                                    accept="image/*"
                                >
                                <code class="px-2">
                                    @error('form.receipt')
                                        {{ $message }}
                                    @enderror
                                </code>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex">
                        <button wire:click='submit()' class="eduact-btn btn-success"><span
                                class="eduact-btn__curve"
                            ></span>Konfirmasi Pembayaran<i class="icon-arrow"></i></button>
                    </div><!-- /.text-right -->

                </div><!-- /.col-lg-6 -->
            </div>
        </div>
    </div>
</section>
