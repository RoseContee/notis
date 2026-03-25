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
                                    <h4 class="nk-block-title">All Contribute Videos
                                        @can('add_contribute')
                                        <a href="{{route('contribute.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Contribute Video</span></a>
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

                                            <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                                            @if($hasRole)
                                            <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                                            @endif
                                            <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Video</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($contribute_list as $contribute)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <span>{{$contribute->id}}</span>
                                                </td>
                                                @if($hasRole)
                                                <td class="nk-tb-col">
                                                    <span>{{$contribute->user->email}}</span>
                                                </td>
                                                @endif
                                                <td class="nk-tb-col">
                                                    <span>{{$contribute->title}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <a href="{{$contribute->link}}" target="_blank">
                                                        <img src="{{url('/')}}/video_thumb.png" width="200px" alt="">
                                                    </a>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit_contribute')
                                                        <li class="nk-tb-action-hidden">
                                                            <a href="{{route('contribute.edit', $contribute->id)}}" class="btn btn-sm btn-outline-success d-inline-flex"><em class="icon ni ni-expand"></em><span>Edit</span></a>
                                                        </li>
                                                        @endcan
                                                        @can('delete_genre')
                                                            <li class="nk-tb-action-hidden">
                                                                <form action="{{ route('contribute.delete',$contribute->id) }}" method="POST">
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
