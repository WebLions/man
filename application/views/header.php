<!DOCTYPE html>
    <html lang="ua">
    <head data-isAuth="<?php if(checkAuth()) echo true; else echo false?>" data-active-page="<?=$active?>">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content="МАН, Одесса, Наука, STEM, Академия, Семинары">
        <meta name="description" content="Страница содержит информацию о деятельности МАН в Одессе">

        <link href="/front-core/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <title>Мала академія наук Одесса</title>

        <?=($active=="admin")? '<link href="/front-core/css/admin/semantic.css" rel="stylesheet">' : ''?>
        <link href="/front-core/css/main/main.css" rel="stylesheet">
        <link href="/front-core/css/jquery.bxslider.css" rel="stylesheet">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="/front-core/js/jquery.bxslider.js" type="text/javascript"></script>


    </head>
    <body>
        <main>
            <aside>
                <nav>
                    <header>МАН Одесса</header>
                    <ul>
                        <li id="home">
                            <a href="/">
                                Головна
                            </a>
                        </li>
                        <li id="about">
                            <a href="/about">
                                Детальніше про МАН
                            </a>
                        </li>
                        <li id="contacts">
                            <a href="/contacts">
                                Контакти
                            </a>
                        </li>
                        <li class="spliter"></li>
                        <div class="user-dynamic">
                        </div>
                    </ul>
                </nav>
            </aside>
