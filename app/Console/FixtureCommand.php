<?php


namespace App\Console;


use App\Fixtures\TaskFixture;
use App\Fixtures\UserFixture;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FixtureCommand extends Command
{
    private const FIXTURE_DIR = __DIR__ . '/../Fixtures';
    private $em;

    protected function configure()
    {
        $config = require_once __DIR__ . '/../../config/doctrine.php';
        $container = require_once __DIR__ . '/../../config/container.php';
        $this->em = array_shift($config)($container);

        $this->setName('doctrine:fixture:app');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $loader = new Loader();
        $loader->loadFromDirectory(self::FIXTURE_DIR);
        $purger = new ORMPurger();
        $executor = new ORMExecutor($this->em, $purger);
        $executor->execute($loader->getFixtures());
        $output->writeln('<info>Fixtures success load</info>');
        return 0;
    }
}