let selectedIdStaff = ''
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function setIdStaff(id) {
    selectedIdStaff = id;
}

function confirmDeleteStaff() {
    $.ajax({
        url: `/api/admin/staff/${selectedIdStaff}`,
        type: 'DELETE',
        success: function(result) {
            location.reload();
        }
    });
}

const viewDetailStaff = (userid) => {
    selectedIdStaff = userid
    $.get(`/api/user/${userid}`, (data, status) => {

        let { id,username,password, fullname, address, email, role, dob, image } = data[0]
        $('#staffid').val(id)
        $('#staffIDLablel').val(id)
        $('#staffusername').val(username)
        $('#stafffullname').val(fullname)
        $('#staffaddress').val(address)
        // $('#staffpassword').val(password)
        $('#staffemail').val(email)
        $('#selectedRoleStaff').text(role)
        $('#selectedRoleStaff').attr('value',role)
        $('#staffdob').val(dob)
        if (image) {
            $('#staff-avatar').attr('src', `/${image}`)
        }else{
            $('#staff-avatar').attr('src', '/images/avatar.png')
        }
    });
}

$('#staffusernameAdd').on('input',function(e){
   var getUsername=$('#staffusernameAdd').val();
    console.log(getUsername,'test');
    $.get(`/api/validateUser/${getUsername}`,(data,status) =>{
        $result=data;
        console.log($result,'result')
                if($result!=0){
                    $('#trunguser').show();
                }
                else{
                    $('#trunguser').hide();
                }
    });
}); 

// async function x(e){
//     let GetUsername=$('#staffusernameAdd').val();
//     let nammm=0;
//      await $.get(`/api/validateUser/${GetUsername}`,(data,status) =>{
//              console.log(data,'datad  in submit')
//              nammm=data;
//     });
//     console.log(nammm,'dong 67')
//     if(nammm!=0){
//         return false;
//     }
//     else{
//         return true;
//     }
    
// }

// lấy kết quả trả về của ajax
function getdata(test){
    var GetUsername=$('#staffusernameAdd').val();

    // $.ajax({
    //     url:`/api/validateUser/${GetUsername}`,
    //     async: false,
    //     success:function(data){
    //         test(data);
    //         console.log(data,'test test')

    //     }
    // });
    $.extend({
        xResponse: function(url, data) {
            // local var
            var theResponse = null;
            // jQuery ajax
            $.ajax({
                url:`/api/validateUser/${GetUsername}`,
                type: 'GET',
                data: data,
                // dataType: "html",
                async: false,
                success: function(respText) {
                    theResponse = respText;
                }
            });
            // Return the response text
            return theResponse;
        }
    });
    var xData = $.xResponse(`/api/validateUser/${GetUsername}`, {issession: 1,selector: true});
    return xData;
}
// gọi hàm onsubmit
 function validateUser(f){
    var x = getdata();
    // console.log(x,'xxxxxx')
    if(x!=0){
        return false;
    }
    else{
        return true;
    }
  
}

function inputUsername(){
    
    // GetUsername=$('#staffusernameAdd').val();
    // console.log(GetUsername,'test');
    // $.get(`/api/validateUser/${GetUsername}`,(data,status) =>{
    //     $result=data;
    //     console.log($result,'result')
    //             if($result!=0){
    //                 $('#trunguser').show();
    //             }
    //             else{
    //                 $('#trunguser').text('bạn có thể dùng username này').css("color","green")
    //             }
    // });
}

// const updateUserInfo = () => {
//     let username = $('#inline-username').text()
//     let fullname = $('#inline-fullname').text()
//     let address = $('#inline-address').text()
//     let email = $('#inline-email').text()
//     let role = $('#inline-role').text()
//     let dob = $('#inline-dob').text()

//     // format date before submit to server
//     let arrDOB = dob.split('/')
//     let arrDOBFormat1 = dob.split('-')
//     if (arrDOB.length > 1) {
//         dob = `${arrDOB[1]}/${arrDOB[0]}/${arrDOB[2]}`
//     }
//     if (arrDOBFormat1.length > 1) {
//         dob = `${arrDOBFormat1[1]}/${arrDOBFormat1[2]}/${arrDOBFormat1[0]}`
//     }

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.post(
//         `/api/user/${selectedId}`,
//         {
//             username,
//             fullname,
//             address,
//             email,
//             role,
//             dob
//         },
//         function (data, status) {
//             location.reload()
//         }
//     )
// }


// $('#btnSubmitUpdate').click(function (e) {
//     let username = $('#inline-username').text()
//     let fullname = $('#inline-fullname').text()
//     let address = $('#inline-address').text()
//     let email = $('#inline-email').text()
//     let role = $('#inline-role').text()
//     let dob = $('#inline-dob').text()

//     // format date before submit to server
//     let arrDOB = dob.split('/')
//     let arrDOBFormat1 = dob.split('-')
//     if (arrDOB.length > 1) {
//         dob = `${arrDOB[1]}/${arrDOB[0]}/${arrDOB[2]}`
//     }
//     if (arrDOBFormat1.length > 1) {
//         dob = `${arrDOBFormat1[1]}/${arrDOBFormat1[2]}/${arrDOBFormat1[0]}`
//     }

//     //stop submit the form, we will post it manually.
//     e.preventDefault();
//     // Get form
//     var form = $('#fileUploadForm')[0];

//     // Create an FormData object 
//     var data = new FormData(form);
//     let fileData=$('#file').prop('files')[0]
//     // append others fields
//     data.append('username', username)
//     data.append('fullname', fullname)
//     data.append('address', address)
//     data.append('email', email)
//     data.append('role', role)
//     data.append('dob', dob)
//     data.append('file',fileData)
//     // disabled the submit button
//     $("#btnSubmitUpdate").prop("disabled", true);
//     $.ajax({
//         type: "POST",
//         enctype: 'multipart/form-data',
//         url: `/api/user/${selectedIdStaff}`,
//         data: data,
//         processData: false,
//         contentType: false,
//         cache: false,
//         timeout: 600000,
//         success: function (data) {
//             $("#btnSubmitUpdate").prop("disabled", false);
//             location.reload()
//         },
//         error: function (e) {

//             $("#btnSubmitUpdate").prop("disabled", false);
//         }
//     });
// })
