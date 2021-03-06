<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content="МАН, Одесса, Наука, STEM, Академия, Семинары">
        <meta name="description" content="Страница содержит информацию о деятельности МАН в Одессе">

        <link href="/front-core/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <title>Мала академія наук Одесса</title>

        <?=($type=="admin")? '<link href="/front-core/css/admin/semantic.css" rel="stylesheet">' : ''?>
        <link href="/front-core/css/main/main.css" rel="stylesheet">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


    </head>
    <body>
        <main>
            <aside>
                <nav>
                    <header>МАН Одесса</header>
                    <ul>
                        <li class="<?=($active=="admin")? 'active' : ''?>">
                            <a href="/admin">
                                Головна
                            </a>
                        </li>
                        <li class="<?=($active=="events")? 'active' : ''?>">
                            <a href="/events">
                                Заходи
                            </a>
                        </li>
                        <li class="<?=($active=="status")? 'active' : ''?>">
                            <a href="/status">
                                Контроль за заявками
                            </a>
                        </li>
                        <li class="spliter"></li>
                        <li>
                            <a href="/user/logout">
                                Вийти
                            </a>
                        </li>

                    </ul>
                </nav>
            </aside>
