<?php
  use PHPUnit\Framework\TestCase;
  require_once "./src/airport.php";
  require_once "./src/plane.php";
  require_once "./src/weatherReporter.php";

  class AirportTest extends TestCase {
    protected function setUp() {
      $this->airport = new Airport();
      $this->plane = $this->createMock('Plane');
    }

    public function testHangarIsEmptyWhenAirportInitiazlied(){
      $this->assertEmpty($this->airport->planes);
    }

    public function testCanLandPlane() {
      $this->airport->land($this->plane);
      $this->assertContains($this->plane, $this->airport->planes);
      $this->assertNotEmpty($this->airport->planes);
    }

    public function testPlaneCanTakeOff(){
      $this->airport->land($this->plane);
      $this->airport->takeOff($this->plane);
      $this->assertNotContains($this->plane, $this->airport->planes);
      $this->assertEmpty($this->airport->planes);
    }

    public function testPlaneCannotTakeOffWhenWeatherIsStormy(){
      $stub = $this->createMock('Airport');
      $stub->method('isStormy')
           ->willReturn(true);

      $this->airport->land($this->plane);
      $this->assertEquals($this->airport->land($this->plane), 'Cannot lane plane weather is stormy');
    }
  }
?>
