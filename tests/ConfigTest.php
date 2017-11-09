<?php

namespace Carousel\Config;

use Carousel\Config\Config;

class ConfigTest extends \PHPUnit\Framework\TestCase
{
    /**
    * setup
    */
    public function setUp()
    {
        $this->emptyConfigFile = 'empty_config_file.php';
        $this->configFile = 'config_file.php';
        $this->fakeConfigFile = 'fake_config_file.php';
        $this->config = new Config($this->configFile);
    }
    
    /**
     * Test that config file does not exists
     *
     * @test
     */
    public function configFileDoesNotExists()
    {
        $this->assertFileNotExists($this->fakeConfigFile);
    }
    /**
     * Test that config file does exists
     *
     * @test
     */
    public function configFileExists()
    {
        $this->assertTrue($this->config->configFileExists($this->emptyConfigFile));
    }
    /**
     * Test that config file returns PHP Array
     *
     * @test
     */
    public function configFileReturnsArray()
    {
        $this->assertEquals(gettype(file($this->emptyConfigFile)), 'array');
    }
    /**
     * Test that config file returns PHP Array not empty
     *
     * @test
     */
    public function configFileReturnsEmptyArray()
    {
        $configFile = require 'empty_config_file.php';
        $this->assertEmpty($configFile);
    }
    /**
     * Test that config file returns PHP Array not empty
     *
     * @test
     */
    public function configFileReturnsNotEmptyArray()
    {
        $configFile = require 'config_file.php';
        $this->assertArrayHasKey('UserCreated', $configFile);
    }
    /**
     * Test that config file returns PHP Array not empty
     *
     * @test
     */
    public function configFileReturnsValue()
    {
        $this->assertEquals($this->config->getConfigValue('UserCreated'), 'UserCreatedListener');
    }
}
