<?php
namespace AporteWeb\Console\Providers;

use AporteWeb\Console\Helpers\SelectionHelper;
use AporteWeb\Console\Inputs\CheckboxInput;
use AporteWeb\Console\Inputs\RadioInput;
use Illuminate\Console\Command;
use Illuminate\Support\ServiceProvider;

/**
 * Class ConsoleSelectServiceProvider
 *
 * @package AporteWeb\Console\Providers
 * @author Eduardo Iriarte <eddiriarte[at]gmail[dot]com>
 */
class SelectServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        /*
         * Returns a select builder.
         *
         * @param  string $message
         * @param  array $options
         * @param  bool $allowMultiple
         *
         * @return array
         */
        Command::macro(
            'select',
            function (string $message = '', array $options = [], bool $allowMultiple = true) {
                $helper = new SelectionHelper($this->input, $this->output);
                $question = $allowMultiple ? new CheckboxInput($message, $options) : new RadioInput($message, $options);

                return $helper->select($question);
            }
        );
    }
}
