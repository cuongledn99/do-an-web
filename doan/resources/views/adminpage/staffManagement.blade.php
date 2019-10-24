@extends('layouts.adminpage')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Quản lý nhân viên</h4>
            

            <table id="tableStaffs" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã nhân viên</th>
                        <th>Họ tên</th>
                        <th>Chức vụ</th>
                        <th>Email</th>
                        <th>Hành động</th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>
                               <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5">
                                    <i class="fa fa-trash"></i>
                                </button>
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