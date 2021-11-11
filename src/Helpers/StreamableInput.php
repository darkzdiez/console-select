<?php
namespace AporteWeb\Console\Helpers;

use Symfony\Component\Console\Input\StreamableInputInterface;

/**
 * Trait OptionChunks
 * @package AporteWeb\Console\Helpers
 * @author Eduardo Iriarte <eddiriarte[at]gmail[dot]com>
 */
trait StreamableInput
{
    /**
     * @var resource
     */
    protected $inputStream;

    /**
     * @return bool|resource
     */
    protected function getInputStream()
    {
        if (empty($this->inputStream) && $this->input instanceof StreamableInputInterface) {
            $this->inputStream = $this->input->getStream() ?: STDIN;
        }

        return $this->inputStream;
    }
}
