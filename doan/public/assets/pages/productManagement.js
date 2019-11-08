let selectedIdProduct=''
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function  setIdProduct(id){
    selectedIdProduct=id;
    console.log(selectedIdProduct,'selected product')
}
function confirmDeleteProduct(){
    
    $.ajax({
        url: `/api/admin/product/${selectedIdProduct}`,
        type: 'DELETE',
        success: function(result) {
            location.reload();
        }
    });
}

const viewDetailProduct = (productid) => {
    
    selectedIdProduct = productid;
    console.log(selectedIdProduct,'id1')
    
    $.get(`/api/product/${selectedIdProduct}`, (data, status) => {

        let { id, name, description,categoryName, image, inPrice, outPrice,inStock,created_at,updated_at} = data[0]
        console.log(id,'id')
        $('#ProductID').val(id)
        $('#ProductName').val(name)
        $('#ProductDescription').val(description)
        $('#selectedCate').text(categoryName)
        $('#inprice').val(inPrice)
        $('#outprice').val(outPrice)
        $('#instock').val(inStock)
        $('#createdat').val(created_at)
        $('#updatedat').val(updated_at)
        if (image) {
            $('#product-avatar').attr('src', `/${image}`)
        }else{
            $('#product-avatar').attr('src', '/images/avatar.png')
        }
    });
}