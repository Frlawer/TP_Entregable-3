<?php
class Aereo extends Viaje
{
    private $numeroVuelo;
    private $categoria;
    private $nombreAerolinea;
    private $cantEscalas;


    public function __construct($codigo, $destino, $cantMaxPasajeros, $colPasajeros, $responsable, $importe, $idaVuelta, $numeroVuelo, $categoria, $nombreAerolinea, $cantEscalas)
    {
        $this->setNumeroVuelo($numeroVuelo);
        $this->setCategoria($categoria);
        $this->setNombreAerolinea($nombreAerolinea);
        $this->setCantEscalas($cantEscalas);
        parent::__construct($codigo, $destino, $cantMaxPasajeros, $colPasajeros, $responsable, $importe, $idaVuelta);
    }

    public function __toString()
    {
        $string = parent::__toString();
        $string .= "\nNúmero de Vuelo: " . $this->getNumeroVuelo() .
            "\nCategoria: " . $this->getCategoria() .
            "\nNombre Aerolinea: " . $this->getNombreAerolinea() .
            "\nCantidad Escalas: " . $this->getCantEscalas();

        return $string;
    }

    /**
     * Vende un pasaje a el pasajero pasado por parametro
     *
     * @param [type] $pasajero
     * @return void
     */
    public function venderPasaje($pasajero)
    {
        $precio = parent::getImporte();

        if ($this->getCategoria() == "1ra Clase") {
            if ($this->getCantEscalas() == 0) {
                $precio = $precio + (($precio * 40) / 100);
                parent::setImporte($precio);
                $precio = parent::venderPasaje($pasajero);
            } elseif ($this->getCantEscalas() > 0) {
                $precio = $precio + (($precio * 60) / 100);
                parent::setImporte($precio);
                $precio = parent::venderPasaje($pasajero);
            }
        }
        return $precio;
    }

    /** ###################'Getter & Setter'#################### */
    /**
     * Get the value of numeroVuelo
     */
    public function getNumeroVuelo()
    {
        return $this->numeroVuelo;
    }

    /**
     * Set the value of numeroVuelo
     *
     * @return  self
     */
    public function setNumeroVuelo($numeroVuelo)
    {
        $this->numeroVuelo = $numeroVuelo;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * Get the value of nombreAerolinea
     */
    public function getNombreAerolinea()
    {
        return $this->nombreAerolinea;
    }

    /**
     * Set the value of nombreAerolinea
     *
     * @return  self
     */
    public function setNombreAerolinea($nombreAerolinea)
    {
        $this->nombreAerolinea = $nombreAerolinea;
    }

    /**
     * Get the value of cantEscalas
     */
    public function getCantEscalas()
    {
        return $this->cantEscalas;
    }

    /**
     * Set the value of cantEscalas
     *
     * @return  self
     */
    public function setCantEscalas($cantEscalas)
    {
        $this->cantEscalas = $cantEscalas;
    }
}
