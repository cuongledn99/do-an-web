let selectedIdCate=''
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function setIdCate(id){
    selectedIdCate=id;
}
function confirmDeleteCate(){
    console.log('test confirmDeleteUser')
    $.ajax({
        url:`/api/admin/cate/${selectedIdCate}`,
        type:'DELETE',
        success: function(result){
            location.reload();
        }
    });
}
const viewDetailCate=(cateid)=>{
    selectedIdCate1=cateid;
    $.get(`/api/cate/${selectedIdCate1}`,(data,status)=>{
        let{id,
            categoryName,
            created_at,
            updated_at,
         }
         = data[0] 
        // console.log( id,'id')
        $('#CateIDLablel').val(id)
        $('#cateid').val(id)
        $('#catename').val(categoryName)
        $('#createdatcate').val(created_at)
        $('#updatedatcate').val(updated_at)
    });
}