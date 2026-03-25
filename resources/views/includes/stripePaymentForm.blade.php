<form action="{{route('order-post')}}" method="POST" class="subscribe-form">
    @csrf
    @php
        $string = '';
    @endphp
    <div class="card flq-card-pricing">
        <div class="card-head">
            @if($subscription->recurring)
                @if($subscription->onet_time_price > 0)
                    @php
                        $string = "One Time Admin Fee: $". $subscription->onet_time_price;
                    @endphp
                @endif
                @php
                    $text = $subscription->days . ' days';
                    if($subscription->days == 30){
                        $text = '1 Month';
                    }elseif($subscription->days == 180){
                        $text = '6 Months';
                    }elseif ($subscription->days == 365) {
                        $text = '1 Year';
                    }
                @endphp
                <div class="card-subtitle h1">{{$string}}</div>
                <div class="card-subtitle h5">{{$text}}: ${{$subscription->recurring_price}}</div>
            @else
                @php
                    $string = "One Time Payment: $". $subscription->onet_time_price
                @endphp
                <div class="card-subtitle h1">{{$string}}</div>
            @endif
            <input type="hidden" class="planId" name="plan" value="{{$subscription->id}}">
        </div>
        <div class="form-group">
            <div class="custom-control custom-control-xs custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkbox_refund{{$subscription->id}}" required>
                <label class="custom-control-label text-black" for="checkbox_refund{{$subscription->id}}" style="color:white !important;">I agree there is no refund after purchase</label>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-control-xs custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkbox{{$subscription->id}}" required>
                <label class="custom-control-label text-black" for="checkbox{{$subscription->id}}" style="color:white !important;">I agree to the <a class="text-primary" href="{{route('terms')}}"> Terms and Conditions </a></label>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-block btn-outline btn-brand-hover">
                Pay Now
            </button>
        </div>
    </div>
</form>