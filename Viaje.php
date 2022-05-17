<?php

class Viaje
{
    /**
     * Variables
     *
     * @var int $codigo
     * @var string $destino
     * @var int $cantMaxPasajeros
     * @var array $colPasajeros
     * @var object $responsable
     * @var int $importe
     * @var bool $idaVuelta
     */
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $colPasajeros;
    private $responsable;
    private $importe;
    private $idaVuelta;

    /** ###################'Funciones'#################### */
    /**
     * Constructor Method
     *
     * @param int $codigo
     * @param string $destino
     * @param int $cantMaxPasajeros
     * @param array $colPasajeros
     * @param object $responsable
     * @param int $importe
     * @param bool $idaVuelta
     */
    public function __construct($codigo, $destino, $cantMaxPasajeros, $colPasajeros, $responsable, $importe, $idaVuelta)
    {
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->setColPasajeros($colPasajeros);
        $this->setResponsable($responsable);
        $this->setImporte($importe);
        $this->setIdaVuelta($idaVuelta);
    }

    /**
     * nuevoPasajero
     * une un array que viene por parametro
     * con el array $listaPasajeros
     *
     * @param array $pasajero
     * @return array
     */
    public function nuevoPasajero($pasajero)
    {
        $listaPasajeros = $this->getColPasajeros();
        $listaPasajeros[] = $pasajero;
        return $listaPasajeros;
    }

    /**
     * existePasajero
     * Recorre la coleccion de pasajeros y verifica si existe el pasajero con dni pasado por parametro
     *
     * @param int $dni
     * @return int
     */
    public function existePasajero($dni)
    {
        $colPasajeros = $this->getColPasajeros();
        $id = null;
        for ($i = 0; $i < count($colPasajeros); $i++) {
            if ($colPasajeros[$i]->getDni() == $dni) {
                $id = $i;
            } else {
                $id = -1;
            }
        }
        return $id;
    }

    /**
     * Eliminar Pasajero
     * Eliminia un elemento del array $colPasajeros
     * @param int $id
     * @return void
     */
    public function eliminarPasajero($id)
    {
        $listaPasajeros = $this->getColPasajeros();
        $cant = count($listaPasajeros);
        unset($listaPasajeros[$id]);
        if (count($listaPasajeros) < $cant) {
            $this->setColPasajeros($listaPasajeros);
        } else {
            echo "No fue posible eliminar el pasajero.";
        }
    }

    /**
     * Lista Pasajeros
     * Genera una lista de pasajeros para el metodo _toString
     *
     * @return void
     */
    public function listaPasajeros()
    {
        $lista = $this->getColPasajeros();
        for ($i = 0; $i < count($lista); $i++) {
            echo $lista[$i]->__toString();
        }
    }


    /**
     * Vende un pasaje a el pasajero pasado por parametro
     *
     * @param object $pasajero
     * @return void
     */
    public function venderPasaje($pasajero)
    {
        $hayLugar = $this->hayPasajeDisponible();
        $importe = $this->getImporte();
        if ($hayLugar) {
            $agregoPasajero = $this->nuevoPasajero($pasajero);
            $this->setColPasajeros($agregoPasajero);
            if ($this->getIdaVuelta()) {
                $importe = $importe * 1.5;
            }
        } else {
            $importe = -1;
        }

        return $importe;
    }

    /**
     * Determina si hay pasajes disponibles
     *
     * @return bool
     */
    public function hayPasajeDisponible()
    {
        $cantPasajeros = count($this->getColPasajeros());
        $maxPasajeros = $this->getCantMaxPasajeros();
        return ($cantPasajeros < $maxPasajeros);
    }

    public function __toString()
    {
        return "\nCodigo: " . $this->getCodigo() .
            "\nDestino: " . $this->getDestino() .
            "\nCantidad Máxima de pasajeros: " . $this->getCantMaxPasajeros() .
            "\nResponsable del Viaje: \n" . $this->getResponsable()->__toString() .
            "\nPasajeros: \n" . $this->listaPasajeros();
    }

    /** ###################'Getters & Setters'#################### */
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }

    public function setCantMaxPasajeros($cantMaxPasajeros)
    {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function getColPasajeros()
    {
        return $this->colPasajeros;
    }

    public function setColPasajeros($colPasajeros)
    {
        $this->colPasajeros = $colPasajeros;
    }

    public function getResponsable()
    {
        return $this->responsable;
    }

    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function getIdaVuelta()
    {
        return $this->idaVuelta;
    }

    public function setIdaVuelta($idaVuelta)
    {
        $this->idaVuelta = $idaVuelta;
    }
}
