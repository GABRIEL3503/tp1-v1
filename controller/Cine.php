<?php

class Cine
{
    // 1. Atributos privados (Encapsulamiento)
    private $edad;
    private $esEstudiante;

    // Constantes de precio
    const PRECIO_REDUCIDO_MENOR    = 160;
    const PRECIO_REDUCIDO_MAYOR    = 180;
    const PRECIO_GENERAL           = 300;

    // 2. Constructor
    public function __construct()
    {
        $this->edad        = 0;
        $this->esEstudiante = false;
    }

    // 3. Getters y Setters
    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = (int) $edad;
    }

    public function getEsEstudiante()
    {
        return $this->esEstudiante;
    }

    public function setEsEstudiante($esEstudiante)
    {
        $this->esEstudiante = ($esEstudiante === "on");    }

    // 4. Métodos de comportamiento

    /**
     *
     */
    public function sonDatosValidos($datos)
    {
        if (!array_key_exists('edad', $datos)) {
            return false;
        }

        if (!is_numeric($datos['edad'])) {
            return false;
        }

        $edad = (int) $datos['edad'];
        if ($edad < 1 || $edad > 120) {
            return false;
        }

        return true;
    }

    
    public function cargarObjeto($datos)
    {

   // Llama a sonDatosValidos(). Si los datos no son válidos no carga nada y retorna false inmediatamente.
        if (!$this->sonDatosValidos($datos)) {
            return false;
        }
//Si son válidos, carga los atributos:
        $this->setEdad($datos['edad']);
        // El checkbox solo aparece en $_POST si fue tildado
        $this->setEsEstudiante(isset($datos['estudiante']) ? $datos['estudiante'] : false);

        return true;
    }

    /**
     * Calcula el precio de la entrada según las reglas del negocio:
   
     
     */
    public function calcularPrecio($datos)
    {
        if (!$this->cargarObjeto($datos)) {
            return false;
        }

        $edad        = $this->getEdad();
        $esEstudiante = $this->getEsEstudiante();

        if ($esEstudiante && $edad >= 12) {
            return self::PRECIO_REDUCIDO_MAYOR;   
        }

        if ($esEstudiante || $edad < 12) {
            return self::PRECIO_REDUCIDO_MENOR;   
        }

        return self::PRECIO_GENERAL;              
    }
}
