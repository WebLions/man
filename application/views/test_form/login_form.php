<html>
<head>
    <title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>
<form action="/admin_login" method="post">

    <h5>Логін</h5>
    <input type="text" name="login" value="" size="50" />

    <h5>Пароль</h5>
    <input type="text" name="password" value="" size="50" />

    <div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>