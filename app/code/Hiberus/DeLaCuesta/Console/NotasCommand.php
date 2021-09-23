<?php

namespace Hiberus\DeLaCuesta\Console;

use Hiberus\DeLaCuesta\Block\Index;
use Hiberus\DeLaCuesta\Model\Notas;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class NotasCommand extends Command
{

    /**
     * @var Notas
     */
    protected Notas $notas;

    /**
     * @var Index
     */
    protected Index $block;

    /**
     * @param Index $block
     */
    public function __construct(Index $block, Notas $notas)
    {
        $this->block = $block;
        $this->notas = $notas;
        parent::__construct();
    }


    protected function configure()
    {
        $this->setName('hiberus:delacuesta')
            ->setDescription('Mostrar examenes');
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $items = $this->block->getAlumno();
        foreach ($items as $item) {
            $this->notas->setIdExam($item->getIdExam());
            $this->notas->setFirstName($item->getFirstName());
            $this->notas->setLastName($item->getLastName());
            $this->notas->setMark($item->getMark());
            $output->writeln('<info> ID: ' . $this->notas->getIdExam() . ' | Nombre: ' . $this->notas->getFirstName() . ' | Apellidos: ' . $this->notas->getLastName() .
                ' | Nota: ' . $this->notas->getMark() . '</info>');
        }
    }
}
