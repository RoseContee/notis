@extends('layouts.backend')

@section("content")


    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">

                            <div class="row">
                                <div class="col-sm-3">
                                    <select class="form-control select2" onchange="filter_change(this)" name="user" id="user">
                                        <option value="">Filter by Users</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" @if($id == $user->id) selected @endif>{{$user->name}} | {{$user->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control select2" onchange="filter_change(this)" name="device" id="device">
                                        <option value="">Filter by Device</option>
                                        @foreach($devices as $device)
                                            <option value="{{$device}}"  @if($id == $device) selected @endif>{{$device}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control select2" onchange="filter_change(this)" name="browser" id="browser">
                                        <option value="">Filter by Browser</option>
                                        @foreach($browsers as $browser)
                                            <option value="{{$browser}}" @if($id == $browser) selected @endif>{{$browser}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="daterange"  placeholder="Filter by Date" />
                                    @if($from){{$from}} - {{$to_date}}@endif
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('visits.all')}}" class="btn btn-danger">Clear Filter</a>
                                </div>

                                {{--                                <div class="col-md-3">--}}
                                {{--                                    {!! Form::open(array('url' => 'admin/movies','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')) !!}--}}
                                {{--                                    <input type="text" name="s" placeholder="{{trans('words.search_by_title')}}" class="form-control">--}}
                                {{--                                    <button type="submit"><i class="fa fa-search"></i></button>--}}
                                {{--                                    {!! Form::close() !!}--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col-md-3">--}}
                                {{--                                    <a href="{{URL::to('admin/movies/add_movie')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20" data-toggle="tooltip" title="{{trans('words.add_movie')}}"><i class="fa fa-plus"></i> {{trans('words.add_movie')}}</a>--}}
                                {{--                                </div>--}}
                            </div>
                            {{--                            @if($type)--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="col-xl-2 col-md-6">--}}
                            {{--                                            <div class="card-box widget-user">--}}
                            {{--                                                <div class="text-center">--}}
                            {{--                                                    <h2 class="text-pink" data-plugin="counterup">{{count($visits)}}</h2>--}}
                            {{--                                                    <h5 style="color: #343a40;">Total Visits</h5>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            @endif--}}

                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            <div class="table-responsive table-striped">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        {{--                                        @if ($type == 'user')--}}
                                        {{--                                            <th>User</th>--}}
                                        {{--                                        @else--}}
                                        {{--                                            <th>IP</th>--}}
                                        {{--                                        @endif--}}
                                        <th>Location</th>
                                        <th>Device</th>
                                        <th>Browser</th>
                                        @if ($type == 'user')
                                            <th>IP</th>
                                        @else
                                            <th>User</th>
                                        @endif
                                        <th>Last Page</th>
{{--                                        <th>Duration</th>--}}
                                        <th>Total Visits</th>
                                        <th>From - To</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        if ($type == 'user'){
                                            $g_visits = $visits->groupBy('user_id');
                                        }else{
                                            $g_visits = $visits->groupBy('ip');
                                        }
                                    @endphp
                                    @foreach($g_visits as $ip => $records)
                                        @php
                                            $rowspan = 1;
                                            $last_visit = null;
                                            $first_visit = null;
                                            $count =0;
                                            $minutes = 1;
                                            $duration = 1;
                                            $difference = 0;
                                            $i = 0;
                                            $numItems = count($records);
                                            $total_duration = 0;
                                            $total_views = 0;
                                        @endphp
                                        <tr class="text-center">
                                            @if ($type == 'user')
                                                @php
                                                    $user = \App\Models\User::find($ip);
                                                @endphp
                                                <td rowspan="{{$rowspan}}" colspan="8"> @if($user) {{$user->name}}  @endif</td>

                                            @else
                                                <td rowspan="{{$rowspan}}" colspan="8">{{$ip}}</td>
                                            @endif
                                        </tr>
                                        @foreach($records as $visit)

                                            @php
                                                $last = ++$i === $numItems;

                                                $current_visit = $visit;
                                                if ($last_visit){
                                                    $count++;
                                                    $difference = $current_visit->created_at->diffInMinutes($last_visit->created_at);
                                                }else{
                                                    $first_visit = $visit;
                                                }
                                            @endphp

{{--                                            @if($difference > 5 || $last)--}}
                                                @php
                                                    if ($last_visit == null){
    $last_visit = $visit;
}
                                                @endphp
                                                <tr>
                                                    <td>{{$last_visit->location}}</td>
                                                    <td>{{$last_visit->device}}</td>
                                                    <td>{{$last_visit->browser}}</td>
                                                    @if ($type == 'user')
                                                        <td>{{$last_visit->ip}}</td>
                                                    @else
                                                        <td> @if($last_visit->user) {{$last_visit->user->name}} | {{$last_visit->user->email}} @else <span style="color: red">Unregistered</span> @endif</td>
                                                    @endif
                                                    @if($last)
                                                        <td><a href="{{url('/').'/'.$visit->page}}">{{url('/').'/'.$visit->page}}</a></td>
                                                    @else
                                                        <td><a href="{{url('/').'/'.$last_visit->page}}">{{url('/').'/'.$last_visit->page}}</a></td>
                                                    @endif
{{--                                                    <td>{{$duration + $first_visit->created_at->diffInMinutes($visit->created_at)}} minutes</td>--}}
                                                    @if($last)
                                                        <td>{{$count += 1}} </td>
                                                    @else
                                                        <td>{{$count}} </td>
                                                    @endif
                                                    <td> {{$first_visit->created_at}} - {{$visit->created_at}}</td>
                                                </tr>
                                                @php
                                                    $total_duration += $duration + $first_visit->created_at->diffInMinutes($last_visit->created_at);
                                                    $total_views += $count;
                                                    $duration =1;
                                                    $count =0;
                                                    $last_visit = null;
                                                    $difference = 0;
                                                    $first_visit = $visit;
                                                @endphp
{{--                                            @endif--}}

                                            @php
                                                $last_visit = $visit;
                                            @endphp
                                        @endforeach
                                        <tr style="background-color: lightgray">
                                            <td colspan="5" class="text-center">Total</td>
{{--                                            <td>{{$total_duration}}</td>--}}
                                            <td>{{$total_views}}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <nav class="paging_simple_numbers">
                                @if ($visits->lastPage() > 1)
                                    <?php
                                        $currentPage = $visits->currentPage();
                                        $lastPage = $visits->lastPage();
                                        $from = 1; $to = 1;
                                        if ($lastPage <= 5) {
                                            $from = 1;
                                            $to = $lastPage;
                                        } else {
                                            if ($currentPage <= 3) {
                                                $from = 1; $to = 5;
                                            }
                                            else if ($currentPage == 4) {
                                                $from = 1; $to = 6;
                                            }
                                            else if ($currentPage <= $lastPage - 4) {
                                                $from = $currentPage - 2; $to = $currentPage + 2;
                                            }
                                            else if ($currentPage == $lastPage - 3) {
                                                $from = $lastPage - 5;
                                                $to = $lastPage;
                                            }
                                            else if ($currentPage >= $lastPage - 2) {
                                                $from = $lastPage - 4;
                                                $to = $lastPage;
                                            }
                                        }
                                        $prevPage = $currentPage > 1 ? $currentPage - 1 : 1;
                                        $prevFive = $currentPage - 5 > 1 ? $currentPage - 5 : 1;
                                        $nextPage = $currentPage < $lastPage ? $currentPage + 1 : $lastPage;
                                        $nextFive = $currentPage + 5 < $lastPage ? $currentPage + 5 : $lastPage;
                                    ?>
                                    <ul class="pagination">
                                        <li class="{{ ($visits->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $visits->url($prevPage) }}" data-toggle="tooltip" title="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>

                                        @if($lastPage >= 6)
                                            @if($currentPage>=5)
                                                <li class="page-item {{ ($visits->currentPage() == 1) ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $visits->url(1) }}">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $visits->url($prevFive) }}">...</a>
                                                </li>
                                            @endif
                                            @for ($i = $from; $i <= $to; $i++)
                                                <li class="page-item {{ ($visits->currentPage() == $i) ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $visits->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            @if($currentPage<$lastPage-3)
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $visits->url($nextFive) }}">...</a>
                                                </li>
                                                <li class="page-item {{ ($visits->currentPage() == $lastPage) ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $visits->url($lastPage) }}">{{ $lastPage }}</a>
                                                </li>
                                            @endif
                                        @else
                                            @for ($i = $from; $i <= $to; $i++)
                                                <li class="page-item {{ ($visits->currentPage() == $i) ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $visits->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                        @endif
                                        <li class="{{ ($visits->currentPage() == $visits->lastPage()) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $visits->url($nextPage) }}" data-toggle="tooltip" title="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('script')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript">
        $(function() {

            $('input[name="daterange"]').daterangepicker({
                timePicker: true,
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
                var daterange = picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD')
                $(this).val(daterange);
                var from = picker.startDate.format('YYYY-MM-DD HH:mm')
                var to = picker.endDate.format('YYYY-MM-DD HH:mm')

                console.log(from)
                console.log(to)
                var url = {!! json_encode(url('/')) !!}; // get selected value
                url = url + '/visits/all/date/'+from+'/'+to

                if (url) { // require a URL
                    window.location = url; // redirect
                }


                // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                //     $.ajax({
                //         /* the route pointing to the post function */
                //         url: url+'/visits',
                //         type: 'POST',
                //         /* send the csrf-token and the input to the controller */
                //         data: {_token: CSRF_TOKEN, from: from, to: to},
                //         dataType: 'JSON',
                //         /* remind that 'data' is the response of the AjaxController */
                //         success: function (data) {
                //             console.log(data)
                //         }
                //     });

            });

            $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>

    <script>
        function filter_change(sel){
            var type = sel.id
            var value = sel.value
            var url = {!! json_encode(url('/')) !!}; // get selected value
            url = url + '/visits/all/'+type+'/'+value

            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        }

    </script>
@endsection
