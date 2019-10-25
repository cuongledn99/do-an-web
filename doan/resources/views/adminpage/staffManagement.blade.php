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
                        
                    
                    <a href="#custom-modal" 
                    class="btn btn-primary waves-effect waves-light m-r-5 m-b-10" 
                    data-animation="door" 
                    data-plugin="custommodal" 
                    data-overlayspeed="100" 
                    data-overlaycolor="#36404a">Door
                    </a>
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
                    <div class="profile-info-name">
                        <img src="{{asset('assets/images/profile.jpg')}}" class="img-thumbnail" alt="profile-image">

                        <div class="profile-info-detail">
                            
                                <table class="table  ">
                                        <tbody>
                                        <tr>
                                            <td width="35%">Simple text field</td>
                                            <td width="65%"><a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="">superuser</a></td>
                                        </tr>
                                        <tr>
                                            <td>Empty text field, required</td>
                                            <td><a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">Empty</a></td>
                                        </tr>
                                        <tr>
                                            <td>Select, local array, custom display</td>
                                            <td><a href="#" id="inline-sex" data-type="select" data-pk="1" data-value="" data-title="Select sex" class="editable editable-click" style="color: gray;">not selected</a></td>
                                        </tr>
                                        <tr>
                                            <td>Select, remote array, no buttons</td>
                                            <td><a href="#" id="inline-group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group" class="editable editable-click">Admin</a></td>
                                        </tr>
                                        <tr>
                                            <td>Select, error while loading</td>
                                            <td><a href="#" id="inline-status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status" class="editable editable-click">Active</a></td>
                                        </tr>

                                        <tr>
                                            <td>Combodate (date)</td>
                                            <td><a href="#" id="inline-dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth" class="editable editable-click">15/05/1984</a></td>
                                        </tr>
                                        <tr>
                                            <td>Combodate (datetime)</td>
                                            <td><a href="#" id="inline-event" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1" data-title="Setup event date and time" class="editable editable-click editable-empty" style="">Empty</a></td>
                                        </tr>

                                        <tr>
                                            <td>Textarea, buttons below. Submit by <i>ctrl+enter</i></td>
                                            <td><a href="#" id="inline-comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments" class="editable editable-pre-wrapped editable-click">awesome user!</a></td>
                                        </tr>

                                        <tr>
                                            <td>Checklist</td>
                                            <td><a href="#" id="inline-fruits" data-type="checklist" data-value="2,3" data-title="Select fruits" class="editable editable-click">Peach<br>Apple</a></td>
                                        </tr>

                                        </tbody>
                                    </table>
                            
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
    </div>
</div>

@endsection