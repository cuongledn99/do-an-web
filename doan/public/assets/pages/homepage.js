$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const addToCart = (id) => {
    swal(
        {
            title: 'Added to cart',
            type: 'success',
            confirmButtonColor: '#4fa7f3'
        }
    )
    $.post("/cart",
        {
            product_id: id
        },
        function (data, status) {
            let {total,count}=data

            total=total.replace('.00','')
        
            $('#cart-total').text(total)
            $('#simpleCart_quantity').text(count)
        });
}