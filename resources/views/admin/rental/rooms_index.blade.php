@extends('layouts.backend')

@section('content')

    <div class="nk-content " style="width: 100%;">
        <div class="">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview">

                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">All Rooms
                                        <a href="{{route('room.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Room</span></a>

                                    </h4>
                                    <div class="nk-block-des">
                                        <!-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card card-preview">

                                <div class="card-inner">
                                    <table style="width: 100%;" class="datatable-init-export nk-tb-list nk-tb-ulist" data-export-title="Export" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">

                                            <th class="nk-tb-col"><span class="sub-text">Room Number</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Dimension</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Price Type</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Hourly Price</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Daily Price</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Special Request</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Tags</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($rooms as $room)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <span>{{$room->number}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$room->name}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$room->dimension}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$room->price_type}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>${{$room->price_hourly}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>${{$room->price_daily}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    {!! $room->special_request ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>' !!}
                                                </td>
                                                <td class="nk-tb-col">
                                                    {!! $room->top_bar ? '<span class="badge badge-success">Top Bar</span>' : '' !!}
                                                    {!! $room->featured ? '<span class="badge badge-success">Featured</span>' : '' !!}
                                                    {!! $room->new_arrival ? '<span class="badge badge-success">New Arrival</span>' : '' !!}
                                                    {!! $room->best_selling ? '<span class="badge badge-success">Best Selling</span>' : '' !!}
                                                    {!! $room->top_rated ? '<span class="badge badge-success">Top Rated</span>' : '' !!}
                                                </td>
                                                <td class="nk-tb-col">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('view_booking')
                                                            <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$room->id}}">
                                                                    View Booking
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal{{$room->id}}" tabindex="-1" >
                                                                    <div class="modal-dialog modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Room Bookings</h5>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-bordered">
                                                                                    <tr>
                                                                                        <th>Date</th>
                                                                                        <th>Booking Type</th>
                                                                                        <th>Booking By</th>
                                                                                        <th>Status</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    @if(count($room->bookings) > 0)
                                                                                    @foreach($room->bookings as $booking)
                                                                                        <tr>
                                                                                            <td>
                                                                                                {{$booking->date}}
                                                                                            </td>
                                                                                            <td>
                                                                                                @if($booking->slot == 'whole day')
                                                                                                    Whole Day
                                                                                                @elseif (json_decode($booking->slot))
                                                                                                    @php
                                                                                                        $slots = json_decode($booking->slot)
                                                                                                    @endphp
                                                                                                    <ul>
                                                                                                        @foreach($slots as $slot)
                                                                                                            <li>
                                                                                                                {{$slot}}
                                                                                                            </li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                @elseif (preg_match('/\d+\s*months/i', $booking->slot))
                                                                                                    {{$booking->slot}}
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>
                                                                                                {{$booking->user->name}} || {{$booking->user->email}}
                                                                                            </td>
                                                                                            <td>
                                                                                                @if($booking->status == 'pending')
                                                                                                    <span class="badge badge-warning">Pending</span>
                                                                                                @else
                                                                                                    <span class="badge badge-success">Completed</span>
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>
                                                                                                <a href="{{route('rental.delete_booking', $booking->id)}}">Delete</a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    @else
                                                                                        <tr>
                                                                                            <td colspan="4" class="text-center">No bookings</td>
                                                                                        </tr>
                                                                                    @endif
                                                                                </table>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        @endcan
                                                        @can('edit_room')
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="{{route('room.edit', $room->id)}}" class="btn btn-sm btn-outline-success d-inline-flex"><em class="icon ni ni-expand"></em><span>Edit</span></a>
                                                            </li>
                                                        @endcan
                                                        @can('delete_room')
                                                            <li class="nk-tb-action-hidden">
                                                                <form action="{{ route('room.delete',$room->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-sm btn-outline-danger d-inline-flex" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <em class="icon ni ni-trash"></em>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endcan
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection
