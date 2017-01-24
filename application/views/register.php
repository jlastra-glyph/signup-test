

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Register</title>

  <style type="text/css">

  html {
      /* background-color: powderblue; */
    background: #a6c9ea;
    background: -webkit-linear-gradient(#a6c9ea,#f1f1f1);
    background: -o-linear-gradient(#a6c9ea,#f1f1f1);
    background: -moz-linear-gradient(#a6c9ea,#f1f1f1);
    background: linear-gradient(#a6c9ea,#f1f1f1);
  margin:0px;
  width:auto;
  height: 680px;
  font-family: 'Ubuntu', sans-serif;
}
hr {
  margin-left: 10px;
  margin-right: 10px;
  color: #87d5ea;
}
.register {
  margin:0 auto;
  max-width:500px;
}
.register-header {
   text-align: left;
   margin-left: 15px;
}
.register-header p{
   color:gray;
}
.register-form {
  border:2px solid #87d5ea;
  background:#e1ebf5;
}
.register-form h3 {
  text-align:left;
  margin-left:40px;
  color:black;
}
.register-form {
  box-sizing:border-box;
  padding-top:15px;
  padding-bottom:15px;
  margin:50px auto;
  text-align:center;
  overflow: hidden;
}

.register-label {
  width: 100px;
  float:left;
  clear: none;
  text-align: right;
  margin-right: 20px;
}
.register-label p {
  font-color:gray;
  font-size: 12px;
}
.register-label p b{
  font-color:black;
  font-size: 14px;
}
.register-input {
  width: 220px;
  font-family: 'Ubuntu', sans-serif;
  float:left;
  clear: none;

}
.register input[type="text"] {
  width: 100%;
  max-width:400px;
  height:30px;
  font-family: 'Ubuntu', sans-serif;
  margin:10px 0;
  border:2px solid #f2f2f2;
  outline:none;
  padding-left:10px;
}
.register-form input[type="submit"] {
  height:30px;
  width:200px;
  /*background:#fff;*/
  border:1px solid #f2f2f2;
  border-radius:12px;
  background: #a6c9ea;
    background: -webkit-linear-gradient(#37383a,#000000);
    background: -o-linear-gradient(#37383a,#000000);
    background: -moz-linear-gradient(#37383a,#000000);
    background: linear-gradient(#37383a,#000000)
  text-transform:uppercase;
  font-family: 'Ubuntu', sans-serif;
  color: white;
  cursor:pointer;
}
.clearfix:after {
   content: " "; /* Older browser do not support empty content */
   visibility: hidden;
   display: block;
   height: 0;
   clear: both;
}
  </style>
</head>
<body>
<div class="register">
  <div class="register-form">
    <div class="register-header">
        <h2>Sign-up</h2>
        <p>Complete the Following Fields</p>
    </div>
    <hr>
    <div class="message">
    <?php if(!empty($return)){
      echo $return;
      }?>
    </div>
    <?php echo validation_errors(); ?>
    <?php echo form_open('Register'); ?>
    <div class="register-label">
        <p><b>Name:</b></p>
        <p>First Name Only</p>
    </div>
    <div class="register-input">
        <input type="text" name="name" placeholder="Name"/>
    </div>
    <div class="clearfix"></div>
    <div class="register-label">
        <p><b>Birthday:</b></p>
        <p>mm-dd-yyyy</p>
    </div>
    <div class="register-input">
        <input type="text" name="birthday" placeholder="Birthday"/>
    </div>
    
     <div class="clearfix"></div>
      <input type="submit" name="submit" value="Submit" />
      <div class="clearfix"></div>
      <?php echo form_close(); ?>
      <?php echo form_open('Register/getXML'); ?>
      <input type="submit" name="export" value="Export to XML" />
      <?php echo form_close(); ?>
    </div>

    </div>
</body>
</html>