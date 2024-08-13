<?php

namespace Vehicle;

use App\Vehicle\Vehicle;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Vehicle::class)]
class VehicleTest extends TestCase
{
    /**
     * @return void
     */
    public function testTimestampIsGeneratedWhenCreatingVehicle()
    {
        $vehicle = new Vehicle(4, 'Renault', 'R5');
        $date = (new \DateTimeImmutable())->format('d M Y');

        $this->assertSame($date, $vehicle->getCreatedAt()->format('d M Y'));
    }
}
