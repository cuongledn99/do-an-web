@extends('layouts.adminpage')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Product Management</h4>
            

            <table id="tableStaffs" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product_ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>amount</th>
                        <th>action</th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <td>1</td>
                        <td>SP001</td>
                        <td>Giày 01</td>
                        <td>Cate01</td>
                        <td>12</td>
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