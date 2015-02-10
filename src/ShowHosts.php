<?php namespace Jehaby\XamppVhostManager;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ShowHosts extends Command {

    protected function configure()
    {
        $this
            ->setName('show')
            ->setDescription('Show all current hosts')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = new VhostManager();
        $output->writeln($manager->vhosts ?: 'No valid vhosts were found');
    }

}