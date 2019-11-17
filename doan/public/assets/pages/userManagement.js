let selectedIdUser=''
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function setIdUser(id){
    selectedIdUser=id;
}
//show image when chose input file
var loadFile = function(event) {
    var image = document.getElementById('user-avatar');
    console.log(image,'test loadFile image trong userManagement.js')
    image.src = URL.createObjectURL(event.target.files[0]);
  };
function confirmDeleteUser(){
    console.log('test confirmDeleteUser')
    $.ajax({
        url:`/api/admin/user/${selectedIdUser}`,
        type:'DELETE',
        success: function(result){
            location.reload();
        }
    });
}
const viewDetailUser=(userid)=>{
    selectedIdUser=userid;
    $.get(`/api/user1/${selectedIdUser}`,(data,status)=>{
        let{id,
            username,
            password,
            fullname,
            address,
            email,
            role,
            dob,
            image
         }
         = data[0] 
        // console.log( id,'id')
        $('#UserIDLablel').val(id)
        $('#UserID').val(id)
        $('#username').val(username)
        $('#password').val(password)
        $('#fullname').val(fullname)
        $('#address').val(address)
        $('#email').val(email)
        // $('#selectedRole').text(role)
        $('#dob1').val(dob)
        // console.log(username);

        if (image) {
            $('#user-avatar').attr('src', `/${image}`)
        }else{
            $('#user-avatar').attr('src', '/images/avatar.png')
        }
            
    });
}