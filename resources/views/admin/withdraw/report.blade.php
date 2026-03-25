<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <u><h1>Tax Report for year {{$year}}</h1></u>

            <table class="table table-bordered">
                <tr>
                    <td><b>Calendar Year:</b> {{$year}}</td>
                    <td><b>Payer's TIN:</b> {{$tax->payer_tin}}</td>
                    <td><b>Recipient's TIN:</b> {{$recipient_tin}}</td>
                    <td><b>Account Number:</b> {{$tax->account_number}}</td>
                </tr>
                <tr>
                    <td colspan="2"><b>Payer's name</b>
                        <br>
                        {{$tax->payer_name}}
                    </td>
                    <td><b>Recipient's Name: </b><br>
                        {{$user->full_name}}, {{$address}}
                    </td>
                    <td>This is important tax information and is being furnished to the internal Revenue Service. <br> If you are required to file a return, a negligence penalty or other sanction may be imposed<br> on you if this income is taxable and the IRS determines that it has not been reported.</td>
                </tr>
                <tr>
                    <td colspan="2">
                        @php
                            $total_amount = 0;
                        @endphp
                        @foreach($withdraws as $withdraw)
                            @php
                                $total_amount = $total_amount + $withdraw->amount;
                            @endphp
                        @endforeach
                        <b>Nonemployee Compensation:</b><br>
                        ${{$total_amount}}
                    </td>
                    <td><b>State/Payer's state no.</b><br>
                        {{$tax->payer_state}}
                    </td>
                    <td><b>State income</b><br>
                        ${{$total_amount}}
                    </td>
                </tr>
            </table>
{{--            <table class="table">--}}
{{--                <tr>--}}
{{--                    <th>Amount</th>--}}
{{--                    <th>Type</th>--}}
{{--                    <th>Date</th>--}}
{{--                </tr>--}}
{{--                @php--}}
{{--                    $total_amount = 0;--}}
{{--                @endphp--}}
{{--                @foreach($withdraws as $withdraw)--}}
{{--                    <tr>--}}
{{--                        <td>${{$withdraw->amount}}</td>--}}
{{--                        <td>{{$withdraw->type}}</td>--}}
{{--                        <td>{{$withdraw->created_at}}</td>--}}
{{--                    </tr>--}}
{{--                    @php--}}
{{--                        $total_amount = $total_amount + $withdraw->amount;--}}
{{--                    @endphp--}}
{{--                @endforeach--}}
{{--                <tr>--}}
{{--                    <th>Total</th>--}}
{{--                    <th>${{$total_amount}}</th>--}}
{{--                </tr>--}}
{{--            </table>--}}
        </div>
    </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>

