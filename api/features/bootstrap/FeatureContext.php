<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Client;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $output;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->output = "";
    }

    /**
     * @When I go to :arg1
     */
    public function iGoTo($url)
    {
        $client = new Client();
        
        $request_url = "http://localhost";
        if (getenv('CI')) {
            $request_url .= ":8080";
        }
        $request_url .= $url;

        $response = $client->request('GET', $request_url, ['http_errors' => false]);
        $this->output = $response->getBody();
    }

    /**
     * @Then I should see :arg1
     */
    public function iShouldSee($string)
    {
        if (!strpos($this->output, $string)) {
            throw new Exception($string . " not found in " . $this->output);
        }
    }
}
