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
        
        $orderBy = false;
        if (isset($req->query->orderBy)) 
            $orderBy = $req->query->orderBy;

        $typeOfOrder = false;
        if (isset($req->query->typeOfOrder)) 
            $typeOfOrder = $req->query->typeOfOrder;
        

        $movies = $this->model->getMovies($orderBy, $typeOfOrder); //entramos a model
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

        $movieId = $this->model->getMovieById($id);

        if (!$movieId) {
            return $this->view->response("no existe pelicula con el genero id=$id", 404);
        }

        $this->model->eraseMovie($id);
        $this->view->response("La pelicula con el id=$id se elimino con exito");
    }

    public function updateMovie($req,$res) {

        $id = $req->params->id;

        $movieId =$this->model->getMovieById($id);

        //verifica existencia
        if (!$movieId) {
            return $this->view->response("no existe pelicula con el genero id=$id", 404);
        }

        if (empty($req->body->nombre) || empty($req->body->director) || empty($req->body->genero)) {
            return $this->view->response ("faltan datos", 400);
        }

        //obtengo los datos (nombre,director,descripcion,genero)
        $nombre = $req->body->nombre;
        $director = $req->body->director;
        $descripcion = $req->body->descripcion;
        $genero = $req->body->genero;

        //actualiza pelicula
        $this->model->updateMovie($id,$nombre,$director,$descripcion,$genero);

        $movieId = $this->model->getMovieById($id); //obtengo pelicula modificada
        $this->view->response($movieId,200); //devuelvo respuesta

    }
}

class ReviewApiController{

    private $model;
    private $view;

    function __construct() { //el constructor es necesario ya que inicializamos el modelo y vista
        $this->model = new reviewModel();
        $this->view = new JSONView();
    }

    function getReviewByMovieId($req, $res){

        $id = $req->params->id;

        $review = $this->model->getReviewMovieById($id);

        if (!$review) {
            return $this->view->response("no existe reseña para pelicula con id=$id", 404);
        }

        return $this->view->response ($review);
    }

}

