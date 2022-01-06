<?php

app()->setNamespace('\App\Controllers');

app()->get('/', 'PagesController@index');

app()->resource('users', 'UsersController');
app()->resource('countries', 'CountriesController');
app()->resource('news', 'NewsController');