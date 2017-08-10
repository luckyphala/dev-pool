<?php
/**
 * Created by PhpStorm.
 * @author Rivalani Simon Hlengani
 * @since 2017/08/05
 * Time: 1:13 PM
 */

/**
 * API routes for storing, deleting, updating, retrieving users
 */
$app->group(['prefix'=>'users'], function() use ($app){
   $app->get('all', 'UserController@all');
   $app->get('show/{user}', 'UserController@show');
   $app->post('store','UserController@store');
   $app->patch('update/{user}', 'UserController@update');
   $app->delete('destroy/{user}', 'UserController@destroy');
});