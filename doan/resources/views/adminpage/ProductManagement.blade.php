@extends('layouts.adminpage')
@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Product Management</h4>
           
            <!-- Button trigger modal -->
            <button class="btn btn-primary waves-effect waves-light" 
                    data-toggle="modal" 
                    data-target="#myModal1">Add Product
            </button>
            <table id="tableStaffs" class="table table-bordered">
                   
                <thead>
                    <tr>
                      
                        <th>Product_ID</th>
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>in stock</th>
                        <th>action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach($shoes as $shoe)
                    <tr>
                        <td>{{$shoe->id}}</td>
                        <td>{{$shoe->name}}</td>
                        <td>{{$shoe->categoryName}}</td>
                        <td>{{$shoe->inStock}}</td>
                       
                        <td>
                                <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5"
                                type="button" class="btn btn-primary"
                                 data-toggle="modal" 
                                 data-target="#myModal"
                                 onclick="setIdProduct({{$shoe->id}})"
                                 >
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
                                            <button type="button" 
                                            class="btn btn-success" 
                                            onclick="confirmDeleteProduct()"
                                            data-dismiss="modal">Yes</button>
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
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div> <!-- end row -->
 <!-- sample modal content -->
 <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                        <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title">Add Product</h4>
                                        
    
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-20">
                                                    @if(count($errors)>0)
                                                        <ul>
                                                            @foreach($errors->all() as $error)
                                                                <li>{{$error}}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                    @if(\Session::has('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{\Session::get('success')}}</p>

                                                    </div>
                                                    @endif
                                                    <form class="form-horizontal" role="form" method="POST" action="{{url('shoes')}}">
                                                            {{ csrf_field() }}
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Name</label>
                                                            <div class="col-10">
                                                                <input type="text" name="name" class="form-control" placeholder="Name product...">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label class="col-2 col-form-label">Decription </label>
                                                                <div class="col-10">
                                                                    <input type="text" name="description" class="form-control" placeholder="Decription">
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">CategoryID</label>
                                                            <div class="col-10">
                                                                <input type="text" name="categoryid" class="form-control"
                                                                  >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">image</label>
                                                            <div class="col-10">
                                                                <input type="text" name="image" class="form-control"
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">inPrice</label>
                                                            <div class="col-10">
                                                                <input type="text" name="inprice" class="form-control"
                                                                    >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">outPrice</label>
                                                            <div class="col-10">
                                                                <input type="text" name="outprice" class="form-control"
                                                                   >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">inStock</label>
                                                            <div class="col-10">
                                                                <input type="text" name="instock" class="form-control"
                                                                    >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">created_at</label>
                                                            <div class="col-10">
                                                                <input type="text" name="created_at" class="form-control"
                                                                    >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label class="col-2 col-form-label">updated_at</label>
                                                                <div class="col-10">
                                                                    <input type="text" name="updated_at" class="form-control"
                                                                        >
                                                                </div>
                                                            </div>
                                                        
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn -primary" value="add">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
    
                                        </div>
                                        <!-- end row -->
    
                                    </div> <!-- end card-box -->
                                </div><!-- end col -->
                            </div>
                </div>
               
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<script>
    var selected='';
    function getID(id){
        selected=id;
  
    }
    function confirmDelete(){
        $.ajax({
            url: `/api/admin/product/${selected}`,
            type: 'DELETE',
            success: function(result) {
                if(result==true)
                    alert('Deleted')
                    else
                    alert('Delete Fail')
                console.log(result);
                location.reload();
            }
        });

        console.log(selected)
    }
</script>
@endsection