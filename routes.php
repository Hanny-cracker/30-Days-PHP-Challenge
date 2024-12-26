<?php

$router->get('/','index.php');
$router->get('/index.php/about','about.php');
$router->get('/index.php/contact','contact.php');

$router->get('/index.php/notes/create','notes/create.php')->only('auth');
$router->post('/index.php/notes/create','notes/store.php');

$router->get('/index.php/note/edit','notes/edit.php')->only('auth');
$router->patch('/index.php/note/edit','notes/update.php');

$router->get('/index.php/notes','notes/index.php');
$router->get('/index.php/note','notes/show.php')->only('auth');
$router->delete('/index.php/note','notes/destroy.php');

$router->get('/index.php/register','registration/create.php')->only('guest');
$router->post('/index.php/register','registration/store.php');

$router->get('/index.php/login','registration/login.php')->only('guest');
$router->post('/index.php/login','registration/get.php');

$router->delete('/index.php/logout','registration/destroy.php')->only('auth');
