<?php
namespace AporteWeb\Console\Traits;

use AporteWeb\Console\Helpers\SelectionHelper;
use AporteWeb\Console\Inputs\CheckboxInput;
use AporteWeb\Console\Inputs\RadioInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

trait SelectableInputs
{
    public function enableSelectHelper(InputInterface $input, OutputInterface $output)
    {
        $this->getHelperSet()->set(
            new SelectionHelper($input, $output)
        );
    }

    public function select(string $message, array $options, bool $allowMultiple = true)
    {
        $helper = $this->getHelper('selection');
        $question = $allowMultiple ? new CheckboxInput($message, $options) : new RadioInput($message, $options);

        return $helper->select($question);
    }
}
