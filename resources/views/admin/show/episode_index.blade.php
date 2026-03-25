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
                                    <h4 class="nk-block-title">All Episodes
                                        <a href="{{route('episode.create', $media_category->id)}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Episode</span></a>

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
                                            <th class="nk-tb-col"><span class="sub-text">Show Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Season Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Episode Title</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Thumbnail</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Duration</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($episodes as $episode)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <p>{{$episode->season->show->title}}</p>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <p>{{$episode->season->title}}</p>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$episode->title}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <img src="{{$episode->getFirstMediaUrl('thumbnail')}}" width="200px" alt="">
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$episode->duration}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($episode->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td class="nk-tb-col">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit_episode')
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="{{route('episode.edit', $episode->id)}}" class="btn btn-sm btn-outline-success d-inline-flex"><em class="icon ni ni-expand"></em><span>Edit</span></a>
                                                            </li>
                                                        @endcan
                                                        @can('delete_episode')
                                                            <li class="nk-tb-action-hidden">
                                                                <form action="{{ route('episode.delete',$episode->id) }}" method="POST">
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
