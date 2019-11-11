@extends('layouts.adminpage')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">User Management</h4>


            <table id="tableStaffs" class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>UserName</th>
                        <th>FullName</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->fullname}}</td>
                        <td>{{$user->email}}</td>

                        <td>
                            <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5"
                            type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                            onclick="setIdUser({{$user->id}})">
                                <i class="fa fa-trash"></i>
                            </button>

                            

                            <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure to want delete ?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                    

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onclick="confirmDeleteUser()" data-dismiss="modal">Yes</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a id='btn-view-{{$user->id}}' onclick="viewDetailUser({{$user->id}})" href="#custom-modal" class="btn btn-icon waves-effect waves-light btn-success m-b-5 " data-animation="door" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Detail information User</h4>
    <div class="custom-modal-text">
        <div class="bg-picture card-box">
            <form enctype="multipart/form-data" action="/api/admin/updateUser"  method="POST" id="fileUploadForm">
            {{ csrf_field() }}
                <div class="profile-info-name row">
                    <div class='col-sm-3'>
                        <img id='product-avatar' src='{{asset("/images/avatar.png")}}' class="img-thumbnail" alt="Product_Image">
                        <div>
                            <label for="imageUser" class="btn">Change image</label>
                            <input id="imageUser" name="imageUser" style="display:none" type="file">
                        </div>
                    </div>
                    <div class='col-sm-9'>
                        <div class="profile-info-detail">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">ID</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" id="UserIDLablel" disabled> 
                                            <input type="text" name="UserID" id="UserID" style="display:none"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">UserName</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="username" id="username">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">PassWord</td>
                                        <td width="65%">
                                            <input class="form-control" id="password" name="password">
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td style="text-align:center;vertical-align: middle;">Role</td>
                                        <td>
                                            <select class="form-control" name="role" id="role">
                                                <option value="#" id="selectedRole"></option>
                                                @foreach($users as $user)
                                                <option value="{{$user->role}}">{{$user->role}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">Address</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="address" id="address">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">Email</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="email" id="email">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">Day Of Birth</td>
                                        <td width="65%">
                                            <input type="date" id="dob" name="dob" data-date="" class="form-control" data-date-format="yyyy mm dd"> 
                                            <!-- <input type="text" class="form-control" name="dob" id="dob"> -->
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Created_at</td>
                                        <td>
                                            <input type="text" name="createdat" id="createdat">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Updated_at</td>
                                        <td>
                                            <input type="text" name="updatedat" id="updatedat">
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Date of birth</td>
                                        <td><a href="#" id="inline-dob" data-type="combodate" data-value="1984-05-15"
                                                data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY"
                                                data-pk="1" data-title="Select Date of birth" class="editable editable-click"></a></td>
                                    </tr> -->
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" onclick="Custombox.close()">Cancel</button>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" id='btnUpdateUser'>Save</button>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection