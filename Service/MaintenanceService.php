<?php


namespace Keized\MaintenanceBundle\Service;


class MaintenanceService
{

    /**
     * @var string $lockFilePath
     */
    private $lockFilePath;

    public function __construct($lockFilePath)
    {
        $this->lockFilePath = $lockFilePath;
    }

    public function enableMaintenance(): void
    {
        touch($this->lockFilePath);
    }

    public function disableMaitenance(): void
    {
        unlink($this->lockFilePath);
    }
}
