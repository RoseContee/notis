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
                                    <h4 class="nk-block-title">Top Categories
                                        <a href="{{route('top_category.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Category</span></a>
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


                                            <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr class="nk-tb-item">
                                                {{-- <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <span><img src="{{$category->getFirstMediaUrl('image')}}" height="100" width="100" alt=""></span>
                                                    </div>
                                                </td> --}}
                                                <td class="nk-tb-col">
                                                    <span>{{$category->name}}</span>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit_category')
                                                            <li class="nk-tb-action-hidden">
                                                                <a href="{{ route('top_category.edit',['category'=>$category->id]) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <em class="icon ni ni-edit-fill text-success"></em>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('delete_category')
                                                            <li class="nk-tb-action-hidden">
                                                                <form action="{{ route('category.delete',['category'=>$category->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <em class="icon ni ni-trash-fill text-danger"></em>
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
