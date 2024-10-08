<?php

namespace Robo\Common;

use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputInterface;

trait InputAwareTrait
{
    /**
     * @var \Symfony\Component\Console\Input\InputInterface
     */
    protected $input;

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     *
     * @see \Symfony\Component\Console\Input\InputAwareInterface::setInput()
     */
    public function setInput(InputInterface $input): void
    {
        $this->input = $input;
    }

    /**
     * @return \Symfony\Component\Console\Input\InputInterface
     */
    protected function input()
    {
        if (!isset($this->input)) {
            $this->setInput(new ArgvInput());
        }
        return $this->input;
    }

    /**
     * Backwards compatibility.
     *
     * @return \Symfony\Component\Console\Input\InputInterface
     *
     * @deprecated
     */
    protected function getInput()
    {
        return $this->input();
    }
}
