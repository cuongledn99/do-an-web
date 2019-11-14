<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Adminto - Responsive Admin Dashboard Template</title>

    <!-- Custom box css -->


    <!-- App css -->
  


    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <br>
    <div class="container box">
        <form method="post" enctype="multipart/form-data" action="/sendemail/send">
        {{ csrf_field() }}
           <div>
                <label for="name">Tên:</label>
                <input type="text" name="name" id="name" class="form-group">
           </div>
           <div>
               <label for="email">
                   Nhập vào Email:
               </label>
               <input type="text" name="email" id="email" class="form-group">
           </div>
           <div>
               <label for="message">Your Message</label>
               <input type="text" name="message" id="message">
           </div>
           <div >
               <input type="submit" value="Send" name="send" class="btn btn-info">
           </div>
        </form>
    </div>

    

</body>

</html>