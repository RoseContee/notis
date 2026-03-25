<div style="padding: 50px">
    <h1><b>AGREEMENT AND RISK DISCLOSURE (Prop Firm Masters)</b></h1>

    @include('terms')

    <div class="row">
        <div class="col-md-12">
            <h1>{{$user->name}}</h1>
            <img src="{{ url('/').'/upload/'. $user->signature}}" alt="">
        </div>
    </div>
</div>
