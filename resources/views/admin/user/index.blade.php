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
                                <h4 class="nk-block-title">All Users
                                    <a href="{{route('user.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add User</span></a>

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
                                        <th class="nk-tb-col"><span class="sub-text">Full Name</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Sign up Date</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Interested in</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Roles</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Subscription</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <span>{{$user->id}}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>{{$user->name}}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>{{$user->email}}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>{{ date_format($user->created_at,"d M Y H:i:s") }}</span>
                                            </td>

{{--                                            <td class="nk-tb-col">--}}
{{--                                                @php--}}
{{--                                                    if (!empty($user->ref_by)){--}}

{{--                                                        $a_user = \App\Models\User::where('id', $user->ref_by)->first();--}}
{{--                                                        echo $a_user->name ?? '';--}}
{{--                                                    }--}}
{{--                                                @endphp--}}
{{--                                            </td>--}}
                                            <td class="nk-tb-col">
                                                @php
                                                    if (!empty($user->interest_id)){
    $movie = \App\Models\Movie::find($user->interest_id);
                                                        echo $movie->title ?? '';
                                                    }
                                                @endphp
                                            </td>
                                            <td class="nk-tb-col">
                                                @foreach($user->getRoleNames() as $role)
                                                    <span class="badge badge-success">{{$role}}</span>
                                                @endforeach
                                            </td>
                                            <td class="nk-tb-col">
                                                @php
                                                    $userSubscriptions = $user->p_subscriptions;
                                                @endphp
                                                @if(count($userSubscriptions) > 0)
                                                    @foreach($userSubscriptions as $userSubscriptions)
                                                        <span class="badge badge-success">{{$userSubscriptions->name}}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="nk-tb-col">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{route('user.detail', $user->id)}}" class="btn btn-sm btn-outline-success d-inline-flex"><em class="icon ni ni-expand"></em><span>View</span></a>
                                                    </li>
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{route('user.delete', $user->id)}}" class="btn btn-sm btn-outline-danger d-inline-flex"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                    </li>
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
