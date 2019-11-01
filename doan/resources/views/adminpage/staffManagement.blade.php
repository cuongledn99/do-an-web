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
                            <button type="button" class="btn btn-primary" 
                            onclick="setID({{$user->id}})" 
                            data-toggle="modal" 
                            data-target="#myModal">
                                <i class="fa fa-trash"></i>
                            </button>

                            <button class="btn btn-icon waves-effect waves-light btn-success m-b-5">
                                <i class="fa fa-eye"></i>
                            </button>
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
                                        <button type="button" class="btn btn-success" onclick="confirmDelete()" data-dismiss="modal">Yes</button>
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
<script>
    var selected = '';

    function setID(id) {
        selected = id;
        console.log(selected);
    }

    function confirmDelete() {
        $.ajax({
            url: `/api/admin/user/${selected}`,
            type: 'DELETE',
            success: function(result) {
                if(result==true)
                    alert('ok')
                    else
                    alert('not ok')
                console.log(result);
                location.reload();
            }
        });

    }
</script>

@endsection