<?php

namespace Codeception\Module;

use Codeception\Module;

class ApiMocker extends Module
{
    public function __initialize()
    {
        $this->debug("ApiMocker initialized successfully");
    }

    public function amGoingToFoo()
    {
        $this->debug("Called ApiMocker::amGoingToFoo");
    }
}
