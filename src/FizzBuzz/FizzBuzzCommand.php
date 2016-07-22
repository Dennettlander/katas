<?php

namespace FizzBuzz;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;


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
        $jugar = true;

        /** @var QuestionHelper $helper */
        $helper = $this->getHelper('question');
        $repetir = new ConfirmationQuestion('¿Desea repetir? (s/n) ', false, '/^s/i');
        $numeroAUsar = new Question('¿Qué número desea usar? ', 'a');

        while (true === $jugar) {
            try {
                $fbg = new FizzBuzzGame(Translator::createForLanguage($idioma));
                $resultados = $fbg->playUpTo($jugada);

                foreach ($resultados as $resultado) {
                    $output->writeln($resultado);
                }
            } catch (\InvalidArgumentException $e) {
                $output->writeln($e->getMessage());
            }

            if ($helper->ask($input, $output, $repetir)){
                $jugada = $helper->ask($input, $output, $numeroAUsar);
            }else{
                $jugar = false;
            }
        }
        $output->writeln('Hasta la proxima, ' . $nombre);
    }
}
