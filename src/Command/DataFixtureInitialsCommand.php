<?php

namespace App\Command;

use App\DataFixtures\ContactTypesFixtures;
use App\DataFixtures\UserFixtures;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DataFixtureInitialsCommand extends Command
{
    protected static $defaultName = 'config:upload:initial:contactType';
    protected static $defaultDescription = 'Carga Datos iniciales de la app';
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
        $contactTypesFixture = new ContactTypesFixtures($this->entityManager);
        $contactTypesFixture->load();
        $io->success('Finalizó la carga de datos iniciales.');

        return Command::SUCCESS;
    }
}
