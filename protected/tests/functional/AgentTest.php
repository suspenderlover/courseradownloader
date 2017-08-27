<?php
class AgentTest extends PHPUnit_Extensions_Selenium2TestCase

{
	public $default_url = "http://localhost/tksfatclientweb/index-test.php/";
	protected function setUp()
    {
        
        $this->setBrowserUrl($this->default_url);
    }
	public function testSessionStart(){
		$this->url("backend/isAbnormalShutdown/IsAbnormalShutdown/?NTLogin=TRGWORLD\btest3&timeZone=Pakistan Standard Time&start_date=12/02/2014 11:01:54 PM");
		$body = json_decode($this->getPageSource());
		$this->assertEquals('true', $body["data"]);
	}
}


?>

