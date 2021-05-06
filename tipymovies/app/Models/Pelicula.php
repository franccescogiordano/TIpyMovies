<?php

namespace App\Models;

class Pelicula {
    private $id=0;
    private $anio;
    private $titulo;
    private $poster;
    //Contructor que recibe un array
    /*public function __construct($obj=NULL) {
        //$this->db=DB::conexion();
        if(isset($obj)){
            foreach ($obj as $key => $value) {
                $this->$key=$value;
            }
        }
        $tabla="peliculas";
        parent::__construct($tabla);

    }*/

    public function setid($ID) {
        $this->id = $ID;
    }
    public function setAnio($anio){
        $this->anio = $anio;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function setPoster($poster){
        $this->poster = $poster;
    }

    public function getid() {
        return $this->id;
    }
    public function getAnio(){
        return $this->anio;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getPoster(){
        return $this->poster;
    }
}
