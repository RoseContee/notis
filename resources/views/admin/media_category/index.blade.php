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
                                    <h4 class="nk-block-title">All Media Categories
                                        @can('add_media_category')
                                        <a href="{{route('media_category.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Media Category</span></a>
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
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Type</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($media_category_list as $media_category)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <span>{{$media_category->id}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$media_category->name}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$media_category->type == 1 ? 'Movie' : 'Show'}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($media_category->status == 0)
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @else
                                                    <span class="badge badge-success"> Active</span>
                                                    @endif
                                                </td>
                                                <td class="nk-tb-col">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit_media_category')
                                                        <li class="nk-tb-action-hidden">
                                                            <a href="{{route('media_category.edit', $media_category->id)}}" class="btn btn-sm btn-outline-success d-inline-flex"><em class="icon ni ni-expand"></em><span>Edit</span></a>
                                                        </li>
                                                        @endcan
                                                        @can('delete_media_category')
                                                            <li class="nk-tb-action-hidden">
                                                                <form action="{{ route('media_category.delete',$media_category->id) }}" method="POST">
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
