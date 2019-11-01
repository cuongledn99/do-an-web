@extends('layouts.adminpage')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">User Management</h4>


            <table id="tableStaffs" class="table table-bordered">
                <thead>
                    <tr>
                        <th>User_ID</th>
                        <th>Full_Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>

                        <td>
                            <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5"
                            type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
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
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-icon waves-effect waves-light btn-success m-b-5">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

@endsection