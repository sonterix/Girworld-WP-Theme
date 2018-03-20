<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <? wp_head() ?>
</head>
<body>
<nav>
    <div class="menu-header-nav-logo">
        <div class="top-logo-img"><? the_custom_logo() ?></div>
    </div>
    <? wp_nav_menu([
        'theme_location' => 'menu', 
        'menu_class' => 'menu'
    ]) ?>
</nav>
