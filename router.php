<?php

require_once 'libs/router.php';
require_once 'app/controllers/movies.api.controller.php';

$router = new Router();

//                  endpoint  verbo     controller             metodo
$router->addRoute('generos','GET','GenreApiController','getAllGenres');
$router->addRoute('generos/:id','GET','GenreApiController','getGenreById');

$router->addRoute('peliculas','GET','MovieApiController','getAllMovies');


//                    generos/12
$router->route($_GET['action'], $_SERVER['REQUEST_METHOD']); //el resource llega del access