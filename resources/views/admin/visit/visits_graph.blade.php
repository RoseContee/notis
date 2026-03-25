@extends('layouts.backend')

@section("content")

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Browsers
            var data = google.visualization.arrayToDataTable([
                ["Last 12 months", @foreach($countries as $data) '{{$data}}', @endforeach],

                    @if ($to == null)
                    <?php for ($i = 1; $i <= 12; $i++)
                    {
                    $date = \Carbon\Carbon::now();

                    ?>

                ['<?php echo $date->format('M');?>', @foreach($countries as $data)
                        @php
                            $count = \App\Models\Visit::where('location', $data)->whereMonth('created_at', $date->format('m'))->whereYear('created_at', $date->format('Y'))->count();

                        @endphp
                        {{$count}},@endforeach],

                    <?php  $date = \Carbon\Carbon::now()->subMonth($i);
                    }?>
                    @else
                    <?php
                    for ($i = $from[1]; $i <= $to[1]; $i++)
                    {
                    $date = \Carbon\Carbon::create()->month($i)

                    ?>

                ['<?php echo $date->format('M');?>', @foreach($countries as $data)
                        @php
                            $count = \App\Models\Visit::where('location', $data)->whereMonth('created_at', $date->format('m'))->whereYear('created_at', $to[0])->count();

                        @endphp
                        {{$count}},@endforeach],

                <?php  }?>
                @endif

            ]);
            var options = {
                chart: {
                    title: "Visits as per Countries",
                    subtitle: "Last 12 Months",
                }
            };
            var countries = new google.charts.Bar(document.getElementById('countries_chart'));
            countries.draw(data, google.charts.Bar.convertOptions(options));


            // Browsers
            var data = google.visualization.arrayToDataTable([
                ["Last 12 months", @foreach($browsers as $data) '{{$data}}', @endforeach],

                    @if ($to == null)
                    <?php for ($i = 1; $i <= 12; $i++)
                    {
                    $date = \Carbon\Carbon::now();

                    ?>

                ['<?php echo $date->format('M');?>', @foreach($browsers as $data)
                        @php
                            $count = \App\Models\Visit::where('browser', $data)->whereMonth('created_at', $date->format('m'))->whereYear('created_at', $date->format('Y'))->count();

                        @endphp
                        {{$count}},@endforeach],

                    <?php  $date = \Carbon\Carbon::now()->subMonth($i);
                    }?>
                    @else
                    <?php
                    for ($i = $from[1]; $i <= $to[1]; $i++)
                    {
                    $date = \Carbon\Carbon::create()->month($i)

                    ?>

                ['<?php echo $date->format('M');?>', @foreach($browsers as $data)
                        @php
                            $count = \App\Models\Visit::where('browser', $data)->whereMonth('created_at', $date->format('m'))->whereYear('created_at', $to[0])->count();

                        @endphp
                        {{$count}},@endforeach],

                <?php  }?>
                @endif

            ]);
            var options = {
                chart: {
                    title: "Visits as per Browsers",
                    subtitle: "Last 12 Months",
                }
            };
            var browsers = new google.charts.Bar(document.getElementById('browsers_chart'));
            browsers.draw(data, google.charts.Bar.convertOptions(options));


            // Devices
            var data = google.visualization.arrayToDataTable([
                ["Last 12 Months", @foreach($devices as $data) '{{$data}}', @endforeach],

                    @if ($to == null)
                    <?php for ($i = 1; $i <= 12; $i++)
                    {
                    $date = \Carbon\Carbon::now();

                    ?>

                ['<?php echo $date->format('M');?>', @foreach($devices as $data)
                        @php
                            $count = \App\Models\Visit::where('device', $data)->whereMonth('created_at', $date->format('m'))->whereYear('created_at', $date->format('Y'))->count();

                        @endphp
                        {{$count}},@endforeach],

                    <?php $date = \Carbon\Carbon::now()->subMonth($i);
                    }?>
                    @else
                    <?php
                    for ($i = $from[1]; $i <= $to[1]; $i++)
                    {
                    $date = \Carbon\Carbon::create()->month($i)

                    ?>

                ['<?php echo $date->format('M');?>', @foreach($devices as $data)
                        @php
                            $count = \App\Models\Visit::where('device', $data)->whereMonth('created_at', $date->format('m'))->whereYear('created_at', $to[0])->count();

                        @endphp
                        {{$count}},@endforeach],

                <?php  }?>
                @endif

            ]);
            var options = {
                chart: {
                    title: "Visits as per Devices",
                    subtitle: "Last 12 Months",
                }
            };
            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>



    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                    <div class="card-box table-responsive">
                        <form  action="{{route('visits_graph')}}" method="POST">
                            <div class="row">
                                @csrf
                                <div class="col-sm-3">
                                    From Month: <input type="month" class="form-control" name="from" required>
                                </div>
                                <div class="col-sm-3">
                                    To Month: <input type="month" class="form-control" name="to" required>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('visits_graph')}}" class="btn btn-danger">Clear Filter</a>
                                </div>
                            </div>
                        </form>
                        @if($to != null)
                            <div class="row">
                                <div class="col-12">
                                    Showing Records from {{$from['0']}}-{{$from['1']}}-01 to {{$to['0']}}-{{$to['1']}}-30
                                </div>
                            </div>
                        @endif

                        <div class="row mt-5">
                            <div class="col-xl-12" id="countries_chart" style="height: 400px;"></div>
                            <hr>
                            <div class="col-xl-12" id="columnchart_material" style="height: 400px;"></div>
                            <hr>
                            <div class="col-xl-12" id="browsers_chart" style="height: 400px;"></div>
                            <hr>
                        </div>
                    </div>


            </div>

        </div>
    </div>

@endsection
