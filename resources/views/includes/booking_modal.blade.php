    <div class="booking_type">
        <h5>Booking Type</h5>
        <div class="form-group">
            <select id="booking_type" class="form-select">

            </select>
        </div>
    </div>
    <div id="hourly_dateType" class="d-none">
        <h5 >Date</h5>
        <input class="form-control custom-date-input" type="date" id="date">
        <p class="booked_date_html"></p>
        <div class="slots_table">
            <h5 >Available Slots </h5>
            <table class="table table-bordered" id="slots_table">
            </table>
        </div>
    </div>
    <div id="date_ranger" class="d-none">
        <h5 >Date Range</h5>
        <input class="form-control" type="text" id="daterange" name="daterange" />
    </div>
    <div id="special_dates" class="d-none">
        <div id="special_dates_calendar"></div>
    </div>
    <div id="special_request" class="d-none">
    </div>
    <div class="monthly_booking d-none">
        <h5>Book For</h5>
        <div class="form-group">
            <select id="monthly_booking_select" name="monthly_booking_months" class="form-select">
                <option value="3 Months">3 Months</option>
                <option value="6 Months">6 Months</option>
                <option value="9 Months">9 Months</option>
                <option value="12 Months">12 Months</option>
            </select>
        </div>
        <h5>Starting Date</h5>
        <div class="form-control" id="monthly_booking_date"></div>
    </div>
    <div class="quantity d-none">
        <h5 >Quantity</h5>
        <input class="form-control" type="number" id="quantity" value="1" name="quantity" />
    </div>




<div class="modal-footer" id="rent_footer_buttons">
    <button type="button" class="btn btn-primary complete-booking-button" id="continue" disabled>Book and Continue Shopping</button>
    <button type="button" class="btn btn-primary complete-booking-button" id="checkout" disabled>Book and Continue to Checkout ></button>

</div>