let selectedIdUser=''
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function setIdUser(id){
    selectedIdUser=id;
}
function confirmDeleteUser(){
    $.ajax({
        url:`/api/admin/user/${selectedIdUser}`,
        type:'DELETE',
        success: function(result){
            location.reload();
        }
    });
}

// validate username on tying
$('#usernameUser').on('input',function(e){
    GetUsername = $('#usernameUser').val();

    $.get(`/api/validateUser/${GetUsername}`, (data, status) => {
        $result = data;

        if ($result != 0) {
            $('#trunguser').show();
        }
        else {
            $('#trunguser').hide();
        }
    });
 });

 async function isValidUsername(username){
    let result=await $.get(`/api/validateUser/${username}`);
    if(result >0) return false
    return true
 }

// submit form add new user
$('#btn-newUser').click(async function(){
    let username = $('#usernameUser').val();
    let isOK = await isValidUsername(username)
    console.log(isOK,'isOKisOK')
    if (isOK)
        $('#form-add-user').submit()
})
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
        $('#UsernameLablel').val(username)
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