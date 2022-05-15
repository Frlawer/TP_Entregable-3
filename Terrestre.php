<?php
class Terrestre extends Viaje
{
    /**
     * tipoAsiento
     *
     * @var string
     */
    private $tipoAsiento;

    public function __construct($codigo, $destino, $cantMaxPasajeros, $colPasajeros, $responsable, $importe, $idaVuelta, $tipoAsiento)
    {
        $this->setTipoAsiento($tipoAsiento);
        parent::__construct($codigo, $destino, $cantMaxPasajeros, $colPasajeros, $responsable, $importe, $idaVuelta);
    }

    public function __toString()
    {
        $string = "\nTipo de Asiento: " . $this->getTipoAsiento();
        $string .= parent::__toString();
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

        if ($this->getTipoAsiento() == "cama") {
            $precio = $precio + (($precio * 25) / 100);
            parent::setImporte($precio);
            $precio = parent::venderPasaje($pasajero);
        }
        return $precio;
    }

    /** ###################'Getter & Setter'#################### */
    /**
     * Get the value of tipoAsiento
     */
    public function getTipoAsiento()
    {
        return $this->tipoAsiento;
    }

    /**
     * Set the value of tipoAsiento
     *
     * @return  self
     */
    public function setTipoAsiento($tipoAsiento)
    {
        $this->tipoAsiento = $tipoAsiento;
    }
}
