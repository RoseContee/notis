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
                                    <h4 class="nk-block-title">All Advertisements 
                                        @can('add_advertisement')
                                        <a href="{{route('advertisement.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Advertisement</span></a>
                                        @endcan
                                    </h4>
                                    <div>
                                        (<span>Name: {{ Auth::user()->name }}</span>,
                                        <span>Email: {{ Auth::user()->email }}</span>,
                                        <span style="color: red;">Balance: ${{ Auth::user()->balance }}</span>)
                                    </div>
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

                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Type</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Advertisement</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($advertisements as $advertisement)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <span>{{$advertisement->name}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$advertisement->type}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($advertisement->type == 'image')
                                                        <img src="{{$advertisement->getFirstMediaUrl('file')}}" width="200px" alt="">
                                                    @else
                                                        <a href="{{$advertisement->getFirstMediaUrl('file')}}" target="_blank">
                                                            <img src="{{url('/')}}/video_thumb.png" width="200px" alt="">
                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($advertisement->status == 1)
                                                    <span class="text-success">Active</span>
                                                    @elseif($advertisement->status == 2)
                                                    <span class="text-danger">Inactive</span>
                                                    @else
                                                    <span class="text-warning">Ready</span>
                                                    @endif
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($advertisement->type == 'image')
                                                    <span>${{$ad_image_price}}</span>
                                                    @elseif($advertisement->use_target == 0 && $advertisement->ad_length !== null)
                                                    <span>${{ $ad_price[$advertisement->ad_length] }} / {{ $ad_length[$advertisement->ad_length] }}s</span>
                                                    @elseif($advertisement->use_target == 1 && $advertisement->ad_length !== null)
                                                    <span>${{ $ad_special_price[$advertisement->ad_length] }} / {{ $ad_length[$advertisement->ad_length] }}s</span>
                                                    @endif
                                                </td>
                                                <td class="nk-tb-col">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit_advertisement')
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="{{route('advertisement.edit', $advertisement->id)}}" class="btn btn-sm btn-outline-success d-inline-flex"><em class="icon ni ni-expand"></em><span>Edit</span></a>
                                                            </li>
                                                        @endcan
                                                        @can('delete_advertisement')
                                                            <li class="nk-tb-action-hidden">
                                                                <form action="{{ route('advertisement.delete',$advertisement->id) }}" method="POST">
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
