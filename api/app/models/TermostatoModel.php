<?php
class TermostatoModel implements JsonSerializable {
    private $id;
    private $nombre;
    private $temperatura_actual;
    private $temperatura_objetivo;
    private $modo;

    public function __construct() {

    }

    

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of temperatura_actual
     */
    public function getTemperaturaActual()
    {
        return $this->temperatura_actual;
    }

    /**
     * Set the value of temperatura_actual
     */
    public function setTemperaturaActual($temperatura_actual): self
    {
        $this->temperatura_actual = $temperatura_actual;

        return $this;
    }

    /**
     * Get the value of temperatura_objetivo
     */
    public function getTemperaturaObjetivo()
    {
        return $this->temperatura_objetivo;
    }

    /**
     * Set the value of temperatura_objetivo
     */
    public function setTemperaturaObjetivo($temperatura_objetivo): self
    {
        $this->temperatura_objetivo = $temperatura_objetivo;

        return $this;
    }

    /**
     * Get the value of modo
     */
    public function getModo()
    {
        return $this->modo;
    }

    /**
     * Set the value of modo
     */
    public function setModo($modo): self
    {
        $this->modo = $modo;

        return $this;
    }

    public function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'temperatura_actual' => $this->temperatura_actual,
            'temperatura_objetivo' => $this->temperatura_objetivo,
            'modo' => $this->modo
        ];
    }
}