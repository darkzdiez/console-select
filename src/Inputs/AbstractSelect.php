<?php
namespace AporteWeb\Console\Inputs;

use AporteWeb\Console\Inputs\Traits\ChunkableOptions;
use AporteWeb\Console\Inputs\Interfaces\SelectInput;


/**
 * Class AbstractSelect
 * @package AporteWeb\Console\Inputs
 * @author Eduardo Iriarte <eddiriarte[at]gmail[dot]com>
 */
abstract class AbstractSelect implements SelectInput
{
    use ChunkableOptions;

    protected $message;

    protected $options;

    protected $selections;

    /**
     * AbstractSelect constructor.
     *
     * @param string $message
     * @param array $options
     */
    public function __construct(string $message, array $options)
    {
        $this->message = $message;
        $this->options = $options;
        $this->selections = [];
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return array
     */
    public function getSelections(): array
    {
        return $this->selections;
    }

    /**
     * @return bool
     */
    public function hasSelections(): bool
    {
        return !empty($this->selections);
    }

    /**
     * @param string $option
     * @return bool
     */
    public function isSelected(string $option): bool
    {
        return (bool) in_array($option, $this->selections);
    }
}
