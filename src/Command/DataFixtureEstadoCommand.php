<?php

namespace App\Command;

use App\DataFixtures\EstadoFixtures;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DataFixtureEstadoCommand extends Command
{
    protected static $defaultName = 'config:upload:initial:estados';
    protected static $defaultDescription = 'Carga Estados iniciales de la app';
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $estadoFixtures = new EstadoFixtures($this->entityManager);
        $estadoFixtures->load();

        $io->success('Finalizó la carga de estados iniciales.');

        return Command::SUCCESS;
    }
}
