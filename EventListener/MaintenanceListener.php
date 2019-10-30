<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/04/2018
 * Time: 19:48
 */

namespace Keized\MaintenanceBundle\EventListener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;


class MaintenanceListener
{
    /**
     * @var string $lockFilePath
     */
    private $lockFilePath;

    /**
     * @var string $maintenancePagePath
     */
    private $maintenancePagePath;

    public function __construct($lockFilePath, $maintenancePagePath)
    {
        $this->lockFilePath = $lockFilePath;
        $this->maintenancePagePath = $maintenancePagePath;
    }

    /**
     * @param RequestEvent $event
     */
    public function onKernelRequest(RequestEvent $event)
    {
        if(! $this->isUnderMaintenance()) {
            return;
        }

        $response = new Response();
        $response->setStatusCode(Response::HTTP_SERVICE_UNAVAILABLE);
        $response->setContent(file_get_contents($this->maintenancePagePath));
        $event->setResponse($response);
    }

    public function isUnderMaintenance()
    {
        return file_exists($this->lockFilePath);
    }
}
