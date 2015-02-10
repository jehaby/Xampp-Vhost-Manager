<?php namespace Jehaby\XamppVhostManager;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

$hosts = '/etc/hosts';


class AddHost extends Command {

    protected function configure()
    {
        $this
            ->setName('add')
            ->setDescription('Adding new host record in /etc/hosts and httpd-vhosts.conf')
            ->addArgument('vhost', InputArgument::REQUIRED);

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = new VhostManager();
        if ($manager->add($input->getArgument('vhost'))) {
            $output->writeln('<info>Vhost record was successfully written.</info>');
        } else {
            $output->writeln('<error>Something went wrong, are you root?</error>', OutputInterface::VERBOSITY_VERBOSE);

        }
    }


}