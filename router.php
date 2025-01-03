<?php

require_once 'libs/router.php';
require_once 'app/controllers/movies.api.controller.php';

$router = new Router();

//                  endpoint  verbo     controller             metodo
$router->addRoute('generos','GET','GenreApiController','getAllGenres');
$router->addRoute('generos/:id','GET','GenreApiController','getGenreById');

$router->addRoute('peliculas','GET','MovieApiController','getAllMovies');
$router->addRoute('peliculas/:id','GET','MovieApiController','getMoviesById');
$router->addRoute('peliculas/:id','DELETE','MovieApiController','deleteMovieById');
$router->addRoute('peliculas/:id','PUT','MovieApiController','updateMovie');
$router->addRoute('peliculas', 'POST', 'MovieApiController', 'addMovie');

$router->addRoute('reseñas/:id', 'GET', 'ReviewApiController', 'getReviewByMovieId');

//                    generos/12
$router->route($_GET['action'], $_SERVER['REQUEST_METHOD']); //el resource llega del access