<!DOCTYPE html>
<html>
<head>
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
body {
padding: 50px;
background: #e9ecef;
}
input[type="submit"] {
    background-color: #c82333 linear-gradient(180deg,#d04451,#c82333) repeat-x!important;
    /* Các thuộc tính kiểu chữ, padding, margin, v.v. có thể được thêm vào đây */
}
* {
margin: 0;
padding: 0;
}
.form-tt {
    margin: 0 auto;
    width: 400px;
    border-radius: 10px;
    overflow: hidden;
    padding: 55px 55px 37px;
    background: ##fff; /* Màu nền trắng nhạt */
    background: -webkit-linear-gradient(top, #f0f0f0, #ffffff); /* Gradient từ trắng nhạt đến trắng */
    background: -o-linear-gradient(top, #f0f0f0, #ffffff);
    background: -moz-linear-gradient(top, #f0f0f0, #ffffff);
    background: linear-gradient(top, #f0f0f0, #ffffff);
    /* text-align: center; */
}
.form-tt h4 {
    font-size: 30px;
    color: #c82333 linear-gradient(180deg,#d04451,#c82333) repeat-x!important;
    line-height: 1.2;
    text-align: center;
    text-transform: uppercase;
    display: block;
    margin-bottom: 30px;
}

.form-tt input[type=text], .form-tt input[type=password] ,.form-tt input[type=email] {
    font-family: Poppins-Regular;
    font-size: 16px;
    color: #000000;
    line-height: 1.2;
    display: block;
    width: calc(100% - 10px);
    height: 45px;
    background: 0 0;
    padding: 10px 0;
    border: 1;
    outline: 0;
}
.form-tt input[type=text]::focus, .form-tt input[type=password]::focus, .form-tt input[type=email]::focus{
color: red;
}
.form-tt input[type=password] {
margin-bottom: 20px;
}
.form-tt input::placeholder {
color: #000000;
}
.checkbox {
display: block;
}
.form-tt input[type=submit] {
font-size: 16px;
color: #ffffff;
line-height: 1.2;
padding: 0 20px;
min-width: 120px;
height: 50px;
border-radius: 25px;
background: #c82333;
position: relative;
z-index: 1;
border: 0;
outline: 0;
display: block;
margin: 30px auto;
}
#checkbox {
display: inline-block;
margin-right: 10px;
}
.checkbox-text {
color: ##000000;
}
.psw-text {
color: ##000000;
padding-right: 50px;
}
.alert-danger{
    width: 400px;
    margin: 0 auto;
}
.input-group {
    position: relative;
    margin-bottom: 15px;
}

.input-group i {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
}
</style>
</head>
<body>
   
    @yield('content')
</body>
</html>