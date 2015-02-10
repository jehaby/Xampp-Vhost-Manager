<?php namespace Jehaby\XamppVhostManager;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class RemoveHost extends Command {

    protected function configure()
    {
        $this
            ->setName('remove')
            ->setDescription('Remove the host from /etc/hosts and httpd-vhosts.conf')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('To be written');
    }


}