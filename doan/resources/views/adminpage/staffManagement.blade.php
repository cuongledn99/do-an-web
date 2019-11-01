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
                               <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a
                                id='btn-view-{{$user->id}}'
                                onclick="viewDetail({{$user->id}})" 
                                href="#custom-modal"
                                class="btn btn-icon waves-effect waves-light btn-success m-b-5 "
                                data-animation="door" 
                                data-plugin="custommodal"
                                data-overlayspeed="100" 
                                data-overlaycolor="#36404a"
                                >
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
<!-- Modal -->
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Detail information</h4>
    <div class="custom-modal-text">
            <div class="bg-picture card-box">
                    <div class="profile-info-name row">
                        <div class='col-sm-3'>
                                <img src="{{asset('assets/images/profile.jpg')}}" class="img-thumbnail" alt="profile-image">
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
                                                    <td width="35%" >Username</td>
                                                    <td width="65%"><a href="#" id='inline-username' data-type="text" data-pk="1" data-title="Enter username"
                                                            class="editable editable-click" style=""></a></td>
                                                </tr>
                                                <tr>
                                                    <td width="35%">Full name</td>
                                                    <td width="65%"><a href="#" id="inline-fullname" data-type="text" data-pk="2" data-title="Enter username"
                                                            class="editable editable-click" style=""></a></td>
                                                </tr>
                                                <tr>
                                                    <td width="35%">Address</td>
                                                    <td width="65%"><a href="#" id="inline-address" data-type="text" data-pk="3" data-title="Enter username"
                                                            class="editable editable-click" style=""></a></td>
                                                </tr>
                                                <tr>
                                                    <td width="35%">Email</td>
                                                    <td width="65%"><a href="#" id="inline-email" data-type="text" data-pk="4" data-title="Enter username"
                                                            class="editable editable-click" style=""></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Role</td>
                                                    <td><a href="#" id="inline-role" data-type="select" data-pk="1" data-value="" data-title="Select sex"
                                                            class="editable editable-click" style="color: gray;">not selected</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of birth</td>
                                                    <td><a href="#" id="inline-dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD"
                                                            data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"
                                                            data-title="Select Date of birth" class="editable editable-click"></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button"  class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" onclick="Custombox.close()">Cancel</button>
                                        <button type="button" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" onclick="updateUserInfo()">Save</button>

                                </div>
                        </div>
                        
                        

                        <div class="clearfix"></div>
                    </div>
                </div>
    </div>
</div>

<script>
let selectedId=''
</script>
<script>
    const viewDetail = (userid) => {
        selectedId = userid
        $.get(`/api/user/${userid}`, (data, status) => {

            let { username, fullname, address, email, role, dob } = data[0]

            $('#inline-username').text(username)
            $('#inline-fullname').text(fullname)
            $('#inline-address').text(address)
            $('#inline-email').text(email)
            $('#inline-role').text(role)
            $('#inline-dob').text(dob)
        });
    }
    const updateUserInfo = () => {
        let username=$('#inline-username').text()
        let fullname =$('#inline-fullname').text()
        let address = $('#inline-address').text()
        let email =$('#inline-email').text()
        let role = $('#inline-role').text()
        let dob =$('#inline-dob').text()
        
        // format date before submit to server
        let arrDOB=dob.split('/')
        let arrDOBFormat1=dob.split('-')
        if(arrDOB.length>1){
            dob=`${arrDOB[1]}/${arrDOB[0]}/${arrDOB[2]}`
        }
        if(arrDOBFormat1.length>1){
            dob=`${arrDOBFormat1[1]}/${arrDOBFormat1[2]}/${arrDOBFormat1[0]}`
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.post(
            `/api/user/${selectedId}`,
            {
                username,
                fullname,
                address,
                email,
                role,
                dob
            },
            function(data,status){
                location.reload()
            }
        )
    }
</script>
@endsection