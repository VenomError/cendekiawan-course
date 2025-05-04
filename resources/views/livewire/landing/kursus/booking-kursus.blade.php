<div class="">
    <x-section.header-overlay title="Booking Kursus" />
    <section class="course-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="checkout-page__billing-address">
                        <h2 class="checkout-page__billing-address__title">Billing Details</h2>
                        <form class="checkout-page__form">
                            <div class="row bs-gutter-x-20">
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <input
                                            type="text"
                                            name="first_name"
                                            value=""
                                            placeholder="Frist Name"
                                            required=""
                                        >
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <input
                                            type="text"
                                            name="last_name"
                                            value=""
                                            placeholder="Last Name"
                                            required=""
                                        >
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <input
                                            type="email"
                                            name="email"
                                            value=""
                                            placeholder="Email Address"
                                            required=""
                                        >
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <input
                                            type="text"
                                            name="phone"
                                            value=""
                                            placeholder="Phone Number"
                                            required=""
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <input
                                            type="text"
                                            name="company_name"
                                            value=""
                                            placeholder="Company"
                                        >
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <input
                                            type="text"
                                            name="Address"
                                            value=""
                                            placeholder="Address"
                                        >
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <input
                                            type="text"
                                            name="company_name"
                                            value=""
                                            placeholder="Apartment, Unit, etc(optional)"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="row bs-gutter-x-20">
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <input
                                            type="text"
                                            name="Town/City"
                                            value=""
                                            placeholder="Town/City"
                                            required=""
                                        >
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <input
                                            type="text"
                                            name="State"
                                            value=""
                                            placeholder="State"
                                            required=""
                                        >
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <input
                                            name="form_zip"
                                            type="text"
                                            pattern="[0-9]*"
                                            placeholder="Zip code"
                                        >
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkout-page__input-box">
                                        <div class="dropdown bootstrap-select"><select
                                                class="selectpicker"
                                                aria-label="Default select example"
                                            >
                                                <option selected="">Country</option>
                                                <option value="1">Canada</option>
                                                <option value="2">England</option>
                                                <option value="3">Australia</option>
                                            </select><button
                                                type="button"
                                                tabindex="-1"
                                                class="btn dropdown-toggle btn-light"
                                                data-bs-toggle="dropdown"
                                                role="combobox"
                                                aria-owns="bs-select-1"
                                                aria-haspopup="listbox"
                                                aria-expanded="false"
                                                title="Country"
                                            >
                                                <div class="filter-option">
                                                    <div class="filter-option-inner">
                                                        <div class="filter-option-inner-inner">
                                                            Country
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div
                                                    class="inner show"
                                                    role="listbox"
                                                    id="bs-select-1"
                                                    tabindex="-1"
                                                >
                                                    <ul
                                                        class="dropdown-menu inner show"
                                                        role="presentation"
                                                    ></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <h2 class="checkout-page__billing-address__title">Shipping Details</h2>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="checkout-page__check-box">
                                    <input
                                        type="checkbox"
                                        name="skipper4"
                                        id="skipper4"
                                        checked=""
                                    >
                                    <label for="skipper4">Same as Billing
                                        Details<span></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="checkout-page__shipping-address">
                        <h2 class="checkout-page__shipping-address__title">Additional Information
                        </h2>
                        <form class="checkout-page__form">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <textarea
                                            placeholder="Write a Message"
                                            name="form_order_notes"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
