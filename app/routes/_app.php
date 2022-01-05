<?php

app()->setNamespace('\App\Controllers');

app()->get('/', 'PagesController@index');

app()->resource('countries', 'CountriesController');
app()->resource('news', 'NewsController');