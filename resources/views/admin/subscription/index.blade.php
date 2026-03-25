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
                                    <h4 class="nk-block-title">All Subscriptions
                                        @can('add_subscription')
                                        <a href="{{route('subscription.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Subscription</span></a>
                                        @endcan
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
                                            <th class="nk-tb-col nk-tb-col-check">
                                            </th>
                                            <th class="nk-tb-col"><span class="sub-text">Id</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Duration</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Recurring</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Recurring Price</span></th>
                                            {{--                                        
                                            <th class="nk-tb-col"><span class="sub-text">Affiliate</span></th>
                                            --}}
                                            <th class="nk-tb-col"><span class="sub-text">Price / Admin Fee $</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                            {{--                                        
                                            <th class="nk-tb-col"><span class="sub-text">Clone From</span></th>
                                            --}}
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Description</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subscriptions as $subscription)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col nk-tb-col-check">
                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input" id="{{$subscription->id}}">
                                                        <label class="custom-control-label" for="{{$subscription->id}}"></label>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$subscription->id}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$subscription->name}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($subscription->recurring == 1)
                                                        <span>{{$subscription->days }} Days</span>
                                                    @endif
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($subscription->recurring == 1)
                                                        <span class="badge badge-success"> Yes</span>
                                                    @else
                                                        <span class="badge badge-danger"> No</span>
                                                    @endif
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($subscription->recurring == 1)
                                                        <span>${{$subscription->recurring_price }} </span>
                                                    @else
                                                        $0
                                                    @endif
                                                </td>
{{--                                                <td class="nk-tb-col">--}}
{{--                                                    @if($subscription->affiliate == 1)--}}
{{--                                                        <span class="badge badge-success"> Yes</span>--}}
{{--                                                    @else--}}
{{--                                                        <span class="badge badge-danger"> No</span>--}}
{{--                                                    @endif--}}
{{--                                                </td>--}}
                                                <td class="nk-tb-col">
                                                    <span>${{$subscription->onet_time_price}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($subscription->status == 1)
                                                        <span class="badge badge-success"> Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
{{--                                                <td class="nk-tb-col">--}}
{{--                                                    <span>{{$subscription->cloned_from }}</span>--}}
{{--                                                </td>--}}
                                                <td class="nk-tb-col tb-col-md">
                                                    <span>{!!substr($subscription->description, 0, 100)!!}</span>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit_subscription')
                                                        <li class="nk-tb-action-hidden">
                                                            <a href="{{ route('subscription.edit',['subscription'=>$subscription->id]) }}" class="btn btn-warning" >
                                                                Edit
                                                            </a>
                                                        </li>
{{--                                                        @if($subscription->cloned_from != 1)--}}
{{--                                                            <li class="nk-tb-action-hidden">--}}
{{--                                                                <a href="{{ route('subscription.clone',['subscription'=>$subscription->id]) }}" class="btn btn-success" >--}}
{{--                                                                    Clone--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        @endif--}}
                                                        @endcan
                                                        @can('delete_subscription')
                                                        <li class="nk-tb-action-hidden">
                                                            <form action="{{ route('subscription.delete',['subscription'=>$subscription->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger" >
                                                                    Delete
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