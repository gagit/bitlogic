<?php

namespace App\Command;

use App\Service\PdfService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:pdf',
    description: 'Add a short description for your command',
)]
class PdfCommand extends Command
{
    private $pdfService;
    public function __construct(PdfService $pdfService)
    {
        $this->pdfService=$pdfService;
        parent::__construct();
    }


    protected function configure(): void
    {
        $this
            ->addArgument('filename', InputArgument::OPTIONAL, 'Filename path')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('filename');

        if ($arg1) {
            $filename=$input->getArgument('filename');
            $io->note(sprintf('You passed an argument: %s', $filename));
            $this->pdfService->splitPdf($filename);
        }

        $io->success('Command finished! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
