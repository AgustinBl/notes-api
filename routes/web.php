<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Find Rooms
$router->get('/rooms', ['uses' => 'RoomController@showAllRooms']);
$router->get('/rooms/{room_id}', ['uses' => 'RoomController@showOneRoom']);
// Room CRUD
$router->post('/rooms', ['uses' => 'RoomController@createRoom']);
$router->put('/rooms/{room_id}', ['uses' => 'RoomController@updateRoom']);
$router->delete('/rooms/{room_id}', ['uses' => 'RoomController@deleteRoom']);

// Book CRUD
$router->post('/rooms/{room_id}/notes', ['uses' => 'RoomController@createNote']);

// Find Notes
$router->get('/notes', ['uses' => 'RoomController@showAllNotes']);
$router->get('/rooms/{room_id}/notes', ['uses' => 'RoomController@showAllNotesFromRoom']);

$router->put('/rooms/{room_id}/notes/{note_id}', ['uses' => 'RoomController@updateNote']);
$router->delete('/rooms/{room_id}/notes/{note_id}', ['uses' => 'RoomController@deleteNote']);