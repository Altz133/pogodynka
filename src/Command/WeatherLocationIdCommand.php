<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Repository\MeasurementRepository;
use App\Repository\LocationRepository;
use App\Service\WeatherUtil;
#[AsCommand(
    name: 'weather:location-id',
    description: 'Provides measurements for id',
)]
class WeatherLocationIdCommand extends Command
{
    private WeatherUtil $fetcher;

    public function __construct(WeatherUtil $fetcher, string $name = null){
        $this->fetcher = $fetcher;
        parent::__construct($name);
       
    }
    protected function configure(): void
    {
        $this
            ->addArgument('id', InputArgument::REQUIRED, 'Location to check')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
            $locationId= $input->getArgument('id');
                $results = $this->fetcher->getForecastForLocation($locationId);

                $output->writeln(json_encode($results, JSON_PRETTY_PRINT));

        return Command::SUCCESS;
    }
}
