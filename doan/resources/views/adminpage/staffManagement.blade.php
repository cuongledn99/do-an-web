@extends('layouts.adminpage')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Staff Management</h4>


            <table id="tableStaffs" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Username</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <button type="button" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="setIdStaff({{$user->id}})" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-trash"></i>
                            </button>
                            <a id='btn-view-{{$user->id}}' onclick="viewDetailUser({{$user->id}})" href="#custom-modal" class="btn btn-icon waves-effect waves-light btn-success m-b-5 " data-animation="door" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Are you sure to want delete ?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>



                                    <!-- Modal footer -->
                                    <div class="modal-footer" style="justify-content:center;">
                                        <button type="button" class="btn btn-success" onclick="confirmDeleteStaff()" data-dismiss="modal">Yes</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
<!-- Modal -->
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Detail information</h4>
    <div class="custom-modal-text">
        <div class="bg-picture card-box">
            <form enctype="multipart/form-data" method="post" id="fileUploadForm">
                <div class="profile-info-name row">
                    <div class='col-sm-3'>
                        <img id='user-avatar' src='{{asset("/images/avatar.png")}}' class="img-thumbnail" alt="profile-image">
                        <div>
                            <label for="file" class="btn">Change image</label>
                            <input id="file" style="display:none" type="file">
                        </div>
                    </div>
                    <div class='col-sm-9'>
                        <div class="profile-info-detail">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="35%">Username</td>
                                        <td width="65%">
                                            <input type="text" id="username" name="username" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Full name</td>
                                        <td width="65%">
                                            <input type="text" id="fullname" name="fullname" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Address</td>
                                        <td width="65%">
                                            <input type="text" id="address" name="address" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Email</td>
                                        <td width="65%">
                                            <input type="text" id="email" name="email" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>
                                            <select class="form-control" name="role" id="role">
                                                <option value="#" id="selectedRole"></option>
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->role}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date of birth</td>
                                        <td>
                                            <input type="text" id="dob" name="dob" class="form-control">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" onclick="Custombox.close()">Cancel</button>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" id='btnSubmitUpdate'>Save</button>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection