<?php

namespace FizzBuzz;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class FizzBuzzCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('FizzBuzz')
            ->setDescription('Juega un FizzBuzz')
            ->addArgument('jugada')
            ->addOption(
                'jugador',
                null,
                InputOption::VALUE_OPTIONAL,
                'If set, return player\'s name',
                'jugador'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $jugada = $input->getArgument('jugada');
        $nombre = $input->getOption('jugador');

        try {
            $fbg = new FizzBuzzGame(new Translator());
            $resultados = $fbg->playUpTo($jugada);

            foreach ($resultados as $resultado)
            {
                $output->writeln($resultado);
            }

            $output->writeln('Hasta la proxima ' . $nombre);
        } catch (\InvalidArgumentException $e) {
            $output->writeln('Debe introducir un número');
        }
    }
}
