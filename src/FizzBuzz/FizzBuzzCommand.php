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
                InputOption::VALUE_REQUIRED,
                'If set, return player\'s name',
                'jugador'
            )
            ->addOption(
                'idioma',
                null,
                InputOption::VALUE_REQUIRED,
                'If set, player chooses language',
                'English'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $jugada = $input->getArgument('jugada');
        $nombre = $input->getOption('jugador');
        $idioma = $input->getOption('idioma');

        try {
            $fbg = new FizzBuzzGame(Translator::createForLanguage($idioma));
            $resultados = $fbg->playUpTo($jugada);

            foreach ($resultados as $resultado)
            {
                $output->writeln($resultado);
            }

            $output->writeln('Hasta la proxima ' . $nombre);
        } catch (\InvalidArgumentException $e) {
            $output->writeln($e->getMessage());
        }
    }
}
