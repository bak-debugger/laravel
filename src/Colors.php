<?php

namespace BakDebugger\Laravel;

trait Colors
{
    public function green(): self
    {
        return $this->color('green');
    }

    public function orange(): self
    {
        return $this->color('orange');
    }

    public function red(): self
    {
        return $this->color('red');
    }

    public function purple(): self
    {
        return $this->color('purple');
    }

    public function blue(): self
    {
        return $this->color('blue');
    }

    public function gray(): self
    {
        return $this->color('gray');
    }
}
