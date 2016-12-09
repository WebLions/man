<html>
<head>
    <title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>
<form action="/admin/add_request" method="post">

    <h5>ФІО</h5>
    <input type="text" name="fio" value="" size="50" />

    <h5>Електронна адреса</h5>
    <input type="text" name="email" value="<?=set_value('email')?>" size="50" />

    <h5>Телефон</h5>
    <input type="text" name="phone" value="<?=set_value('phone')?>" size="50" />

    <h5>Соціальний статус</h5>
    <select>
    </select>

    <div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>