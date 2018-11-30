<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>E-JAFUNG PUPR</title>
<link rel="stylesheet" type="text/css" href="style_login.css" />
<link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
<!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->

<link rel="shortcut icon" href="images/favicon.ico" />

<script type="text/javascript">
function validasi(form){
if (form.username.value == ""){
alert("Anda belum mengisikan Username");
form.username.focus();
return (false);
}
     
if (form.password.value == ""){
alert("Anda belum mengisikan Password");
form.password.focus();
return (false);
}
return (true);
}
</script>

</head>

    <body OnLoad="document.login.username.focus();" class="login">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand text-center">
                        <h2>
                            <div class="logo-icon">
                                <i class="glyphicon glyphicon-user center"></i>
                            </div>
                            Login e-Jafung
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="form-login" name="login" method="post" action="cek_login.php" onSubmit="return validasi(this)">
                        <fieldset class="text-center">
                            
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" placeholder="username" size="29" id="input" type="text" name="username" />
                            </div>
                            <p></p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" placeholder="password" size="29" id="input" type="password" name="password" />
                            </div>
                            <div class="text-center">
                                <input name="Submit" type="image" value="Submit" src="images/images_login/button_login1.png" id="submit" align="absmiddle" />
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

</body>
</html>
