<?php

// GENERO

class GenresModel {

    private $db;

    public function __construct() {
       $this->db = new PDO ('mysql:host=localhost;dbname=catalogo_peliculas;charset=utf8', 'root', '');
    }

    function getGenres() {

        $sql = 'SELECT * FROM generos ORDER BY generos.genero ASC';

        $query = $this->db->prepare($sql); //preparamos desde la base de datos
        $query->execute(); //y ejecutamos la seleccion

        $genres = $query->fetchAll(PDO::FETCH_OBJ); //retorna como objeto

        return $genres; //esto se pasa al view
    }

    function getGenreById($id) {

        $query = $this->db->prepare('SELECT * FROM generos WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ); 
    }
}

class MoviesModel {

    private $db;

    public function __construct() {
       $this->db = new PDO ('mysql:host=localhost;dbname=catalogo_peliculas;charset=utf8', 'root', '');
    }

    function getMovies($orderBy = false, $typeOfOrder = false) {

        $sql = 'SELECT * FROM peliculas';

        if($orderBy) { // peliculas?orderBy=
            switch ($orderBy) { //usamos un switch ya que si se ordenara directamente por parametro el sql (ORDER BY $orderBy) seria muy vulnerable desde URL
                case 'nombre':
                    $sql .= ' ORDER BY peliculas.nombre'; //agregar espacio al principio
                    break;
                case 'director':
                    $sql .= ' ORDER BY peliculas.director';
                    break;
            }
        }

        if ($typeOfOrder) { //orden ascendete o descendente (peliculas?orderBy=nombre&typeOfOrder=asc)
            switch ($typeOfOrder) {
                case 'asc':
                    $sql .= ' ASC';
                    break;
                case 'desc':
                    $sql .= ' DESC';
                    break;
            }
        }

        $query = $this->db->prepare($sql); //preparamos desde la base de datos
        $query->execute(); //y ejecutamos la seleccion

        $movies = $query->fetchAll(PDO::FETCH_OBJ); //retorna como objeto

        return $movies; //esto se pasa al view
    }

    function getMoviesByNombre() {

        $query = $this->db->prepare('SELECT * FROM peliculas ORDER BY peliculas.nombre');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getMoviesByGenreId($id) {

        $sql = 'SELECT * FROM peliculas WHERE genero = ?';

        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }

    function getMovieById($id) {

        $sql = 'SELECT * FROM peliculas WHERE id = ?';

        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }

    public function eraseMovie($id) {
        $sql = 'DELETE FROM peliculas WHERE id = ?';

        $query = $this->db->prepare($sql);
        $query->execute([$id]);
    }

    function updateMovie($id, $nombre, $director, $descripcion, $genero) {
        
        $query = $this->db->prepare('UPDATE peliculas SET nombre = ?, director = ?, descripcion = ?, genero = ? WHERE id = ?');
        $query->execute([$nombre, $director, $descripcion, $genero, $id]);
    }
    
    public function insertMovie($nombre, $director, $descripcion, $genero) {
        $query = $this->db->prepare('INSERT INTO peliculas (nombre, director, descripcion, genero) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $director, $descripcion, $genero]);
        return $this->db->lastInsertId(); // Devuelve el ID de la nueva película
    }
}

class ReviewModel {

    private $db;

    public function __construct() {
       $this->db = new PDO ('mysql:host=localhost;dbname=catalogo_peliculas;charset=utf8', 'root', '');
    }

    function getReviewMovieById($id) {

        $query = $this->db->prepare('SELECT * FROM reseñas WHERE id = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }
}



