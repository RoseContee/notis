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
                                        <th>Movie Name</th>
                                        <th>Total Views</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $all_movies = \App\Models\Movie::where('status',1)->get();
                                    @endphp

                                    @foreach($all_movies as $single_movie)
                                        <tr>
                                            <td>{{$single_movie->title}}</td>
                                            <td>
                                                @php
                                                    echo $total_views = $single_movie->views()->count();
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <form action="{{route('views.movies.all')}}" method="POST">
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
                                        <select class="form-control select2" name="movie_id" id="movie_id">
                                            <option value="">Filter by Movies</option>
                                            @foreach($movies as $movie)
                                                <option value="{{$movie->id}}"  @if(isset($req_data['movie_id']) && $req_data['movie_id'] == $movie->id) selected @endif>{{$movie->title}}</option>
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
                                        <a href="{{route('views.movies.all')}}" class="btn btn-danger">Clear Filter</a>
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
{{--                                                        $movies = $user->watchtimes()->where('watchable_type', 'App\Models\Movie')->pluck('watchable_id')->unique()->count();--}}
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
{{--                                                        $minutes = gmdate("H:i:s", $seconds)--}}
{{--                                                    @endphp--}}
{{--                                                    {{$minutes}}--}}
{{--                                                </h2>--}}
{{--                                                <h5 style="color: #343a40;">Total Minutes Watched</h5>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
                            @if(isset($req_data['movie_id']))
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card-box widget-user">
                                            <div class="text-center">
                                                <h2 class="text-pink" data-plugin="counterup">
                                                    @php
                                                        $movie = \App\Models\Movie::find($req_data['movie_id']);
                                                        $minutes = $movie->watchtimes()->pluck('time')->sum();
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
                                @if(isset($req_data['movie_id']))
                                    @php
                                        $maleViews = 0;
                                        $femaleViews = 0;
                                        $zero = 0;
                                        $eleven = 0;
                                        $fifteen = 0;
                                        $twenty = 0;
                                        $thirty = 0;

                                        foreach ($views as $view) {
                                            if ($view->profile->gender == 'Male') {
                                                $maleViews++;
                                            } elseif ($view->profile->gender == 'Female') {
                                                $femaleViews++;
                                            }

                                            if ( $view->profile->age == '0-10'){
                                                $zero++;
                                            }elseif ($view->profile->age == '11-14'){
                                                $eleven++;
                                            }elseif ($view->profile->age == '15-21'){
                                                $fifteen++;
                                            }elseif ($view->profile->age == '22-35'){
                                                $twenty++;
                                            }elseif ($view->profile->age == '36+'){
                                                $thirty++;
                                            }
                                        }
                                    @endphp
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Total Male Views</td>
                                            <td>{{$maleViews}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Female Views</td>
                                            <td>{{$femaleViews}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age from 0-10 years</td>
                                            <td>{{$zero}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age from 11-14 years</td>
                                            <td>{{$eleven}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age from 15-21 years</td>
                                            <td>{{$fifteen}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age from 22-35 years</td>
                                            <td>{{$twenty}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age from 36+ years</td>
                                            <td>{{$thirty}}</td>
                                        </tr>
                                    </table>
                                @endif
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>Movie Name</th>
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
                                                <tr>
                                                    <td>{{$view->movies->first()->title}}</td>
{{--                                                    <td>--}}
{{--                                                        @php--}}
{{--                                                            $seconds = $user->watchtimes()->where('watchable_type', 'App\Models\Movie')->where('watchable_id', $movie->id)->first();--}}
{{--                                                            if ($seconds){--}}
{{--                                                                $time = $seconds->time;--}}
{{--                                                            }else{--}}
{{--                                                                $seconds = 0;--}}
{{--                                                            }--}}
{{--                                                            echo gmdate("i", $seconds)--}}
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

                $('input[name="from"]').val(from)
                $('input[name="to"]').val(to)


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
@endsection
