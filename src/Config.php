<?php

namespace Carousel\Config;

use Carousel\Config\ConfigFileDoesNotExists;

class Config
{
    /**
     * Create a new Skeleton Instance
     */
    public function __construct($configFile)
    {
        $this->configFile = $configFile;
    }
    /**
    * check if config file exist
    *
    * @
    */
    public function configFileExists()
    {
        return file_exists($this->configFile);
    }
    /**
    * find value from config
    *
    * @return string
    */
    public function getConfigValue($key)
    {
        $configFile = require $this->configFile;
        return $configFile[$key];
    }
}
