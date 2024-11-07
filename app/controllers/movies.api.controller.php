<?php

require_once 'app/models/movies.model.php';
require_once 'app/views/json.view.php';

//GENERO

class GenreApiController {

    private $model;
    private $view;

    function __construct() { //el constructor es necesario ya que inicializamos el modelo y vista
        $this->model = new GenresModel();
        $this->view = new JSONView();
    }

    function getAllGenres($req, $res){

        $genres = $this->model->getGenres(); //entramos a model

        return $this->view->response($genres);//Actualizo vista
    }

    public function getGenreById($req,$res) {

        $id = $req->params->id;

        $genres = $this->model->getGenreById($id);

        if (!$genres) {
            return $this->view->response("no existe genero con el id=$id", 404);
        }

        return $this->view->response($genres);
    }
}

class MovieApiController {

    function __construct() { //el constructor es necesario ya que inicializamos el modelo y vista
        $this->model = new MoviesModel();
        $this->view = new JSONView();
    }

    function getAllMovies($req, $res){

        $movies = $this->model->getMovies(); //entramos a model

        return $this->view->response($movies);//Actualizo vista
    }

    public function getMoviesByGenreId($req,$res) {

        $id = $req->params->id;

        $movieGenreId = $this->model->getMoviesByGenreId($id);

        if (!$movieGenreId) {
            return $this->view->response("no existe pelicula con el genero id=$id", 404);
        }

        return $this->view->response($movieGenreId);
    }

    public function deleteMovieById($req,$res) {

        $id = $req->params->id;

        $movieGenreId = $this->model->getMoviesByGenreId($id);

        if (!$movieGenreId) {
            return $this->view->response("no existe pelicula con el genero id=$id", 404);
        }

        $this->model->eraseMovie($id);
        $this->view->response("La pelicula con el id=$id se elimino con exito");
    }
}

