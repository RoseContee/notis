@extends('layouts.backend')

@section("content")


    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">

                            <div class="table-responsive table-striped">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>TV Show Name</th>
                                        <th>Total Views</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $episodes = App\Models\Episode::where('status',1)->get();
                                    @endphp

                                    @foreach($episodes as $episdoe)
                                        <tr>
                                            <td>{{$episdoe->season->show->title}}</td>
                                            <td>
                                                @php
                                                    echo $total_views = $episdoe->views()->count();
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <form action="{{route('views.shows.all')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <select class="form-control select2" name="profile_id" id="profile_id">
                                            <option value="">Filter by Profiles</option>
                                            @foreach($profiles as $profile)
                                                <option value="{{$profile->id}}" @if(isset($req_data['profile_id']) && $req_data['profile_id'] == $profile->id) selected @endif>{{$profile->name}} | {{$profile->user->email}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <select class="form-control select2" name="episode_id" id="episode_id">
                                            <option value="">Filter by Episode</option>
                                            @foreach($episodes as $episode)
                                                <option value="{{$episode->id}}"  @if(isset($req_data['episode_id']) && $req_data['episode_id'] == $episode->id) selected @endif>{{$episode->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <select class="form-control select2" name="gender" id="gender">
                                            <option value="">Filter by Gender</option>
                                            <option value="Male" @if(isset($req_data['gender']) && $req_data['gender'] == 'Male') selected @endif> Male</option>
                                            <option value="Female" @if(isset($req_data['gender']) && $req_data['gender'] == 'Female') selected @endif> Female</option>
                                            <option value="Other" @if(isset($req_data['gender']) && $req_data['gender'] == 'Other') selected @endif> Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <a href="{{route('views.shows.all')}}" class="btn btn-danger">Clear Filter</a>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <select class="form-control select2" name="age" id="age">
                                            <option value="">Filter by Age</option>
                                            <option value="0-10" @if(isset($req_data['age']) && $req_data['age'] == '0-10') selected @endif>0-10 years</option>
                                            <option value="11-14" @if(isset($req_data['age']) && $req_data['age'] == '11-14') selected @endif>11-14 years</option>
                                            <option value="15-21" @if(isset($req_data['age']) && $req_data['age'] == '15-21') selected @endif>15-21 years</option>
                                            <option value="22-35" @if(isset($req_data['age']) && $req_data['age'] == '22-35') selected @endif>22-35 years</option>
                                            <option value="36+" @if(isset($req_data['age']) && $req_data['age'] == '36+') selected @endif>36+ years</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <input type="number" class="form-control" name="zipcode" value="{{ $req_data['zipcode'] ?? '' }}"                                               placeholder="Filter by Zip Code" />
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <input type="text" class="form-control" name="daterange"  placeholder="Filter by Date" />
                                        @if(isset($req_data['from'])){{$req_data['from']}} - {{$req_data['to']}}@endif

                                        <input type="hidden" name="from">
                                        <input type="hidden" name="to">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <button type="submit" href="{{route('views.movies.all')}}" class="btn btn-success">Search</button>
                                    </div>

                                </div>
                            </form>
{{--                            @if($type == 'user')--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xl-3 col-md-6">--}}
{{--                                        <div class="card-box widget-user">--}}
{{--                                            <div class="text-center">--}}
{{--                                                <h2 class="text-pink" data-plugin="counterup">--}}
{{--                                                    @php--}}
{{--                                                        $user = \App\Models\User::find($id);--}}
{{--                                                        $movies = $user->watchtimes()->where('watchable_type', 'App\Models\Episode')->pluck('watchable_id')->unique()->count();--}}
{{--                                                    @endphp--}}
{{--                                                    {{$movies}}--}}
{{--                                                </h2>--}}
{{--                                                <h5 style="color: #343a40;">Unique Movies Watched</h5>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-3 col-md-6">--}}
{{--                                        <div class="card-box widget-user">--}}
{{--                                            <div class="text-center">--}}
{{--                                                <h2 class="text-pink" data-plugin="counterup">--}}
{{--                                                    @php--}}
{{--                                                        $user = \App\Models\User::find($id);--}}
{{--                                                        $minutes = $user->watchtimes()->pluck('time')->sum();--}}
{{--                                                        $minutes = gmdate("i", $minutes)--}}
{{--                                                    @endphp--}}
{{--                                                    {{$minutes}}--}}
{{--                                                </h2>--}}
{{--                                                <h5 style="color: #343a40;">Total Minutes Watched</h5>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
                            @if(isset($req_data['episode_id']))
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card-box widget-user">
                                            <div class="text-center">
                                                <h2 class="text-pink" data-plugin="counterup">
                                                    @php
                                                        $episode = App\Models\Episode::find($req_data['episode_id']);
                                                        $minutes = $episode->watchtimes()->pluck('time')->sum();
                                                        $minutes = gmdate("i", $minutes)
                                                    @endphp
                                                    {{$minutes}}
                                                </h2>
                                                <h5 style="color: #343a40;">Total Minutes Watched</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card-box widget-user">
                                            <div class="text-center">
                                                <h2 class="text-pink" data-plugin="counterup">
                                                    {{count($views)}}
                                                </h2>
                                                <h5 style="color: #343a40;">Total Views</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

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
                                        <th>Profile</th>
                                        <th>Tv Show</th>
                                        <th>Season</th>
                                        <th>Episode</th>
{{--                                        <th>Minutes</th>--}}
                                        <th>Date Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $g_views = $views->groupBy('profile_id');
                                    @endphp

                                    @foreach($g_views as $profile_id => $records)
                                        @php
                                            $rowspan = count($records) + 1;
                                            $profile = \App\Models\Profile::find($profile_id);
                                        @endphp
                                        @if($profile)
                                            <tr>
                                                <td rowspan="{{$rowspan}}">{{$profile->name}} || {{$profile->user->email}}</td>
                                            </tr>
                                            @foreach($records as $view)
                                                @php
                                                    $episode = $view->episodes->first();
                                                @endphp
                                                <tr>
                                                    <td>{{$episode->season->show->title}}</td>
                                                    <td>{{$episode->season->title}}</td>
                                                    <td>{{$episode->title}}</td>
{{--                                                    <td>--}}
{{--                                                        @php--}}
{{--                                                            $seconds = $user->watchtimes()->where('watchable_type', 'App\Models\Episode')->where('watchable_id', $movie->id)->first()->time;--}}
{{--                                                            echo gmdate("H:i:s", $seconds)--}}
{{--                                                        @endphp--}}
{{--                                                    </td>--}}

                                                    <td>{{$view->created_at}}</td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <nav class="paging_simple_numbers">
                                @if ($views->lastPage() > 1)
                                    <?php
                                        $currentPage = $views->currentPage();
                                        $lastPage = $views->lastPage();
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
                                        <li class="{{ ($views->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $views->url($prevPage) }}" data-toggle="tooltip" title="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>

                                        @if($lastPage >= 6)
                                            @if($currentPage>=5)
                                                <li class="page-item {{ ($views->currentPage() == 1) ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $views->url(1) }}">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $views->url($prevFive) }}">...</a>
                                                </li>
                                            @endif
                                            @for ($i = $from; $i <= $to; $i++)
                                                <li class="page-item {{ ($views->currentPage() == $i) ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $views->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            @if($currentPage<$lastPage-3)
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $views->url($nextFive) }}">...</a>
                                                </li>
                                                <li class="page-item {{ ($views->currentPage() == $lastPage) ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $views->url($lastPage) }}">{{ $lastPage }}</a>
                                                </li>
                                            @endif
                                        @else
                                            @for ($i = $from; $i <= $to; $i++)
                                                <li class="page-item {{ ($views->currentPage() == $i) ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $views->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                        @endif
                                        <li class="{{ ($views->currentPage() == $views->lastPage()) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $views->url($nextPage) }}" data-toggle="tooltip" title="Next">
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
                url = url + '/views/shows/'+from+'/'+to

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
            url = url + '/views/shows/'+type+'/'+value

            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        }

    </script>
@endsection
