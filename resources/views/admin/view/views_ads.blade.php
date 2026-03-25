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
                                        <th>User</th>
                                        <th>Ads Name</th>
                                        <th>Ads Type</th>
                                        <th>Ads</th>
                                        <th>Ads Amount</th>
                                        <th>Advertisor</th>
                                        <th>Movie Name</th>
                                        <th>Episode Name</th>
                                        <th>Contributor</th>
                                        <th>Date Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($views as $view)
                                        @php
                                        $movie = $view->movies->first();
                                        $episode = $view->episodes->first();
                                        $advertisement = $view->ads;
                                        $contributor = '';
                                        if(isset($movie) && isset($movie->contribute))
                                            $contributor = $movie->contribute->user->email;

                                        if(isset($episode) && isset($episode->contribute))
                                            $contributor = $episode->contribute->user->email
                                        @endphp
                                        <tr>
                                            <td>{{ $view->user->email }}</td>
                                            <td>{{ $view->ads->name }}</td>
                                            <td>{{ $view->ads->type }}</td>
                                            <td>
                                                @if($advertisement->type == 'image')
                                                    <img src="{{$advertisement->getFirstMediaUrl('file')}}" width="200px" alt="">
                                                @else
                                                    <a href="{{$advertisement->getFirstMediaUrl('file')}}" target="_blank">
                                                        <img src="{{url('/')}}/video_thumb.png" width="200px" alt="">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($advertisement->type == 'image')
                                                <span>${{$ad_image_price}}</span>
                                                @elseif($advertisement->use_target == 0 && $advertisement->ad_length !== null)
                                                <span>${{ $ad_price[$advertisement->ad_length] }} / {{ $ad_length[$advertisement->ad_length] }}s</span>
                                                @elseif($advertisement->use_target == 1 && $advertisement->ad_length !== null)
                                                <span>${{ $ad_special_price[$advertisement->ad_length] }} / {{ $ad_length[$advertisement->ad_length] }}s</span>
                                                @endif
                                            </td>
                                            <td>{{$advertisement->user->email}}</td>
                                            <td>
                                                {{isset($movie) ? $movie->title : ''}}
                                            </td>
                                            <td>
                                                {{isset($episode) ? $episode->title : ''}}
                                            </td>
                                            <td>
                                                {{$contributor}}
                                            </td>
                                            <td>{{$view->created_at}}</td>
                                        </tr>

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
