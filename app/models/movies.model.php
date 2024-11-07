<?php

// GENERO

class GenresModel {

    private $db;

    public function __construct() {
       $this->db = new PDO ('mysql:host=localhost;dbname=catalogo_peliculas;charset=utf8', 'root', '');
    }

    function getGenres() {

        $sql = 'SELECT * FROM generos';

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

    function getMovies() {

        $sql = 'SELECT * FROM peliculas';

        $query = $this->db->prepare($sql); //preparamos desde la base de datos
        $query->execute(); //y ejecutamos la seleccion

        $movies = $query->fetchAll(PDO::FETCH_OBJ); //retorna como objeto

        return $movies; //esto se pasa al view
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
    
}



