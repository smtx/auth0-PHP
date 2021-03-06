<?php
namespace Auth0\Tests;

use Auth0\SDK\API\Helpers\TokenGenerator;
use josegonzalez\Dotenv\Loader;

class ApiTests extends \PHPUnit_Framework_TestCase {
  protected function getEnv() {
    try {
      $loader = new Loader('.env');
      $loader->parse()
             ->putenv(true);
    }
    catch (\InvalidArgumentException $e) {
      //ignore
    }

    return [
      "GLOBAL_CLIENT_ID" => getenv('GLOBAL_CLIENT_ID'),
      "GLOBAL_CLIENT_SECRET" => getenv('GLOBAL_CLIENT_SECRET'),
      "DOMAIN" => getenv('DOMAIN'),
    ];
  }

  protected function getToken($env, $scopes) {
    $generator = new TokenGenerator([ 'client_id' => $env['GLOBAL_CLIENT_ID'], 'client_secret' => $env['GLOBAL_CLIENT_SECRET' ] ]);
    return $generator->generate($scopes);
  }
}