@extends('layouts.backend')
@section('content')
<div class="nk-block">
    <div class="card">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">User KYC</h4>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                {{-- @if (session('update'))
                <div class="alert alert-success" role="alert" style="background-color: #d4edda; border-color:#c3e6cb; color:#155724; margin-bottom: 0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none;">&times;</a>
                    {{session()->get('update')}}
                </div> 
                @endif --}}
                @if ($user->kyc)
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Picture</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col" colspan="2">Action</th>
                            <th scope="col">Download</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                @php
                                $kyc = $user->kyc
                                @endphp
                                <img src="{{$kyc->getFirstMediaUrl('profile_pic')}}" height="100" width="100" alt="" style="border-radius: 20px">
                            </td>
                            <td>Profile Picture</td>
                            <td>
                                @if ($kyc->pic_status == "pending")
                                <span class="text-warning">Pending</span>
                                @elseif($kyc->pic_status == "approved")
                                <span class="text-success">Approved</span>
                                @else
                                <span class="text-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                                @if ($kyc->pic_status == 'pending')
                                    <form action="{{ route('user.kyc_status',$kyc->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="pic_status" value="approved" hidden>
                                        <button type="submit" class="btn btn-outline-success btn-sm">Approve</button>
                                    </form>
                                @endif
                                
                            </td>
                            <td>
                                @if ($kyc->pic_status == 'pending')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#pic_reject">
                                    Reject
                                </button>
                                @endif
                                <!-- Modal -->
                                <div class="modal fade" id="pic_reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Why are you Rejecting ?</h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('user.kyc_status',$kyc->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="pic_status" value="rejected" hidden>
                                            <label for="pic">Rejection Reason</label>
                                            <input type="text" name="pic_review" id="pic" class="form-control" placeholder="Enter One line rejection reason" required>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Reject</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                            </td>
                            <td>
                                <a href="{{$kyc->getFirstMediaUrl('profile_pic')}}" target="_blank" class="btn btn-outline-success btn-sm">download</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @php
                                $kyc = $user->kyc
                                @endphp
                                <img src="{{$kyc->getFirstMediaUrl('nic_front')}}" height="100" width="100" alt="" style="border-radius: 20px">
                            </td>
                            <td>ID Card Front</td>
                            <td>
                                @if ($kyc->id_front_status == "pending")
                                <span class="text-warning">Pending</span>
                                @elseif($kyc->id_front_status == "approved")
                                <span class="text-success">Approved</span>
                                @else
                                <span class="text-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                                @if ($kyc->id_front_status == 'pending')
                                <form action="{{ route('user.kyc_status',$kyc->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id_front_status" value="approved" hidden>
                                    <button type="submit" class="btn btn-outline-success btn-sm">Approve</button>
                                </form>
                                @endif
                            </td>
                            <td>
                                @if ($kyc->id_front_status == 'pending')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#id_front">
                                    Reject
                                </button>
                                @endif
                                <!-- Modal -->
                                <div class="modal fade" id="id_front" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Why are you Rejecting ?</h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('user.kyc_status',$kyc->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="id_front_status" value="rejected" hidden>
                                            <label for="id_front_side">Rejection Reason</label>
                                            <input type="text" name="id_front_review" class="form-control" placeholder="Enter One line rejection reason" required>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Reject</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{$kyc->getFirstMediaUrl('nic_front')}}" target="_blank" class="btn btn-outline-success btn-sm">download</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @php
                                $kyc = $user->kyc
                                @endphp
                                <img src="{{$kyc->getFirstMediaUrl('nic_back')}}" height="100" width="100" alt="" style="border-radius: 20px">
                            </td>
                            <td>ID Card Back</td>
                            <td>
                                @if ($kyc->id_back_status == "pending")
                                <span class="text-warning">Pending</span>
                                @elseif($kyc->id_back_status == "approved")
                                <span class="text-success">Approved</span>
                                @else
                                <span class="text-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                                @if ($kyc->id_back_status == 'pending')
                                    <form action="{{ route('user.kyc_status',$kyc->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id_back_status" value="approved" hidden>
                                        <button type="submit" class="btn btn-outline-success btn-sm">Approve</button>
                                    </form>
                                @endif
                                
                            </td>
                            <td>
                                @if ($kyc->id_back_status == 'pending')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#id_back">
                                    Reject
                                </button>
                                @endif
                                <!-- Modal -->
                                <div class="modal fade" id="id_back" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Why are you Rejecting ?</h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('user.kyc_status',$kyc->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="id_back_status" value="rejected" hidden>
                                            <label for="id_back_side">Rejection Reason</label>
                                            <input type="text" id="id_back_side" name="id_back_review" class="form-control" placeholder="Enter One line Rejection Reason" required>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Reject</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{$kyc->getFirstMediaUrl('nic_back')}}" target="_blank" class="btn btn-outline-success btn-sm">download</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @php
                                $kyc = $user->kyc
                                @endphp
                                <img src="{{$kyc->getFirstMediaUrl('bill')}}" height="100" width="100" alt="" style="border-radius: 20px">
                            </td>
                            <td>Utality Bill</td>
                            <td>
                                @if ($kyc->bill_status == "pending")
                                <span class="text-warning">Pending</span>
                                @elseif($kyc->bill_status == "approved")
                                <span class="text-success">Approved</span>
                                @else
                                <span class="text-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                                @if ($kyc->bill_status == "pending")
                                <form action="{{ route('user.kyc_status',$kyc->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="bill_status" value="approved" hidden>
                                    <button type="submit" class="btn btn-outline-success btn-sm">Approve</button>
                                </form>
                                @endif
                            </td>
                            <td>
                                @if ($kyc->bill_status == 'pending')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#bill">
                                    Reject
                                </button>
                                @endif
                                <!-- Modal -->
                                <div class="modal fade" id="bill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Why are you Rejecting ?</h5>
                                        </div>
                                        <div class="modal-body">
                                <form action="{{ route('user.kyc_status',$kyc->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="bill_status" value="rejected" hidden>
                                    <label for="bi">Rejection Reason</label>
                                    <input type="text" id="bi" name="bill_review" class="form-control" placeholder="Enter One line Rejection Reason" required>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Reject</button>
                                    </div>
                                </form>
                        </div>
                        </div>
                        </div>
                    </div>
                            </td>
                            <td>
                                <a href="{{$kyc->getFirstMediaUrl('bill')}}" target="_blank" class="btn btn-outline-success btn-sm">download</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @else
                <h1 class="text-warning">KYC are not Uploaded</h1>

                    
                @endif
                
            </div>
            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group" data-simplebar>
                    <div class="card-inner">
                        <div class="user-card">
                            <div class="user-avatar bg-primary">
                                <span>{{  strtoupper(substr($user->name, 0, 2)) }}</span>
                            </div>
                            <div class="user-info">
                                <span class="lead-text">{{ $user->name }}</span>
                                <span class="sub-text">{{ $user->email }}</span>
                            </div>
                            
                        </div><!-- .user-card -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="user-account-info py-0">
                            <h6 class="overline-title-alt">Sign Up Date</h6>
                            <div class="user-balance">{{ date_format($user->created_at,"d M Y H:i:s") }}</div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner p-0">
                        <ul class="link-list-menu">
                            <li><a class="" href="{{ route('user.detail', $user->id) }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Information</span></a></li>
                            <li><a class="" href="{{ route('user.affiliation.admin', $user->id) }}"><em class="icon ni ni-user-fill-c"></em><span>Affiliation</span></a></li>
                            <li><a class="active" href="{{ route('user.kyc.admin',$user->id) }}"><em class="icon ni ni-user-fill-c"></em><span>KYC</span></a></li>
                
                        </ul>
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- card-aside -->
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
