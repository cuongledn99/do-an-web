$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }
});

$('#btnLogin').on('click',function(e){
//    console.log('vao login')
    var username=$('#username1').val();
    var password=$('#password1').val();
    // console.log(username);
    e.preventDefault();
    $.ajax({
            url:`/api/loginhomepage`,
            type:'POST',
            data:{username:username,password:password},
            success: function(result){
                console.log(result,'result')
                if(result==1){
                    console.log('vao if')
                    $('#myModal4').modal('hide');
                    $('#login_success').modal('show');

                }
                else if(result==0){
                    console.log('vao trong else if')
                   
                    $('#login_fail').modal('show');
                }
                
                }
            });
    })
  $('#logout-user').on('click',function(){
			$.ajax({
            url:`/api/logout2`,
            type:'POST',
            success: function(result){
            location.reload();
                }
            });
		})
   
