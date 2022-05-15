<?php
class Empresa
{
    private $colViajes;

    public function __construct($colViajes)
    {
        $this->setColViajes($colViajes);
    }

    /** ###################'Getter & Setter'#################### */

    /**
     * Get the value of colViajes
     */
    public function getColViajes()
    {
        return $this->colViajes;
    }


    /**
     * Set the value of colViajes
     *
     * @return  self
     */
    public function setColViajes($colViajes)
    {
        $this->colViajes = $colViajes;

        return $this;
    }
}
