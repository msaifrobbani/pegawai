<?php
// Warning Error To Login Admin Page
$error_login = "Maaf, Username & Password Salah! Atau ID Anda Tidak Dikenal.";

// View Error Message To Browser
echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<title>Error Login</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"style_login.css\" />
<link href=\"assets/stylesheets/application-a07755f5.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />

<link rel=\"shortcut icon\" href=\"images/favicon.ico\" />
<style>
    body { text-align: center;}
    h1 { font-size: 50px; text-align: center }
    span[frown] { transform: rotate(90deg); display:inline-block; color: #bbb; }
    body { font: 20px Constantia, 'Hoefler Text',  \"Adobe Caslon Pro\", Baskerville, Georgia, Times, serif; color: #999; text-shadow: 2px 2px 2px 
        rgba(200, 200, 200, 0.5); }
    ::-moz-selection{ background:#FF5E99; color:#fff; }
    ::selection { background:#FF5E99; color:#fff; }
    article {display:block; text-align: left; width: 500px; margin: 0 auto; }
    
</style>

</head>
<body>
    <article>
        <h1>Wrong Login <span frown> :(</span></h1>
        <div>
            <p>$error_login</p>
            <center><a href=\"index.php\" class=\"clickhere\">ULANGI LAGI</a></center>
        </div>
    </article>
    <div class=\"clear\"></div>
</body>
</html>
";
?>
