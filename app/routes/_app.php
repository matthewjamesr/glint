<?php

app()->setNamespace('\App\Controllers');

app()->get('/', 'PagesController@index');

app()->resource('users', 'UsersController');
//app()->resource('countries', 'CountriesController');

app()->group('/countries', function () {
    app()->match('GET|HEAD', '/', 'CountriesController@index');
    app()->match('GET|HEAD', '/{country}', 'CountriesController@show');
});

app()->group('/china', function () {
    app()->match('GET|HEAD', '/', 'CountriesController@showChina');
    app()->match('GET|HEAD', '/{title}', 'NewsController@showChina');
});

app()->group('/dprk', function () {
    app()->match('GET|HEAD', '/', 'CountriesController@showDPRK');
    app()->match('GET|HEAD', '/{title}', 'NewsController@showDPRK');
});

app()->group('/russia', function () {
    app()->match('GET|HEAD', '/', 'CountriesController@showRussia');
    app()->match('GET|HEAD', '/{title}', 'NewsController@showRussia');
});

app()->resource('news', 'NewsController');