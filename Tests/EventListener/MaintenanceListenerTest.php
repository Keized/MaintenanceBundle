<?php


namespace App\Tests\EventListener;


use Keized\MaintenanceBundle\EventListener\MaintenanceListener;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class MaintenanceListenerTest extends TestCase
{
    /**
     * @var MockObject $event
     */
    private $event;
    /**
     * @var MockObject $request
     */
    private $request;
    /**
     * @var MaintenanceListener $maintenanceListener
     */
    private $maintenanceListener;

    public function setUp()
    {
        $this->event = $this->getMockBuilder(RequestEvent::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->request = $this->getMockBuilder(RequestStack::class)
            ->disableOriginalConstructor()
            ->getMock();
    }


    public function testUnderMaintenance() {
        $this->maintenanceListener = new MaintenanceListener(__FILE__, __FILE__);

        $this->request
            ->expects($this->any())
            ->method('getCurrentRequest')
            ->will($this->returnValue(Request::create('/')));


        $this->assertEquals(true, $this->maintenanceListener->isUnderMaintenance());
    }

    public function testNotUnderMaintenance() {
        $this->maintenanceListener = new MaintenanceListener('.noExistingFile', __FILE__);

        $this->request
            ->expects($this->any())
            ->method('getCurrentRequest')
            ->will($this->returnValue(Request::create('/')));

        $this->assertEquals(false, $this->maintenanceListener->isUnderMaintenance());
    }


    public function tearDown()
    {
        parent::tearDown();
        $this->event = null;
        $this->request = null;
        $this->maintenanceListener = null;
    }
}
