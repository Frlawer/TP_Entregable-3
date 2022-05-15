<?php
class Responsable extends Persona
{
    private $empleado;
    private $licencia;

    public function __construct($nombre, $apellido, $dni, $telefono, $empleado, $licencia)
    {
        parent::__construct($nombre, $apellido, $dni, $telefono);
        $this->setEmpleado($empleado);
        $this->setLicencia($licencia);
    }

    public function getEmpleado()
    {
        return $this->empleado;
    }

    public function setEmpleado($empleado)
    {
        $this->empleado = $empleado;
    }

    public function getLicencia()
    {
        return $this->licencia;
    }

    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;
    }

    public function __toString()
    {
        $string = parent::__toString();
        $string .= "\nNúmero de empleado: " . $this->getEmpleado() .
            "\nNúmero de Licencia: " . $this->getLicencia();
        return $string;
    }
}
