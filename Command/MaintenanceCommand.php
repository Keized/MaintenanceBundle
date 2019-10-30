<?php


namespace Keized\MaintenanceBundle\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use  Keized\MaintenanceBundle\Service\MaintenanceService as Maintenance;

class MaintenanceCommand extends Command
{
    /**
    * @var Maintenance $maintenance
    */
    private $maintenance;

    public function __construct(Maintenance $maintenance)
    {
        parent::__construct();
        $this->maintenance = $maintenance;
    }

    public function configure()
    {
        $this
            ->setName("app:maintenance")
            ->addArgument('status', InputArgument::REQUIRED, 'status')
            ->setDescription("Enable/Disable maintenance")
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $status = $input->getArgument("status");

        if ($status !== "on" && $status !== "off") {
            throw new \InvalidArgumentException("You argument is invalid, (\"on\" or \"off\")");
        }

        if ($status === "on") {
            $this->maintenance->enableMaintenance();
        } else {
            $this->maintenance->disableMaitenance();
        }
    }
}
