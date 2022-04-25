<?php

/**
 * @see       https://github.com/laminas/laminas-validator for the canonical source repositories
 * @copyright https://github.com/laminas/laminas-validator/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-validator/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\Validator\Barcode;

class Ean5 extends AbstractAdapter
{
    /**
     * Constructor
     *
     * Sets check flag to false.
     */
    public function __construct()
    {
        $this->setLength(5);
        $this->setCharacters('0123456789');
        $this->useChecksum(false);
    }
}
