<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    /**
     * Instance of Faker\Factory for generating test data.
     *
     * @var Faker\Factory
     */
    protected $faker;

    /**
     * Gets everything set-up.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }
}
