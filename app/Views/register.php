<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>


  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

  <style>
    span.error, span.server-error { color:red; display:block; }
    #response { margin-top:10px; }
  </style>
</head>
<body>
<p>how are you</p>
  <h2>Register Form</h2>
  <form id="registerForm">
    <label>Name:</label>
    <input type="text" name="name" placeholder="Enter your name"><br><br>

    <label>Email:</label>
    <input type="text" name="email" placeholder="Enter your email"><br><br>

    <label>Password:</label>
    <input type="password" name="password" placeholder="Enter your password"><br><br>

    <button type="submit">Submit</button>
  </form>

  <div id="response"></div>
<div>kem cho</div>
<script>
$(function(){
  $("#registerForm").validate({
    rules:{
      name:     { required:true, minlength:2 },
      email:    { required:true, email:true },
      password: { required:true, minlength:6 }
    },
    messages:{
      name:     { required:"Name is required", minlength:"Min 2 characters" },
      email:    { required:"Email is required", email:"Enter valid email" },
      password: { required:"Password is required", minlength:"Min 6 characters" }
    },
    errorElement:"span",
    submitHandler:function(form, e){
      e.preventDefault();
      $.post("<?= base_url('validate-form') ?>", $(form).serialize(), function(res){
        $("#response").empty();
        $("span.server-error").remove();

        if(res.status === "success"){
          $("#response").html(`<p style="color:green">${res.message}</p>`);
          form.reset();
        } else {
          $.each(res.errors, function(field, msg){
            $(`[name=${field}]`).after(`<span class="server-error">${msg}</span>`);
          });
        }
      },"json");
    }
  });
});
</script>
</body>
</html>
