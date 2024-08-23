<?php

namespace Middl\Bundle\Command;

use Middl\FlowInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractFlowCommand extends Command
{
    protected LoggerInterface $logger;
    protected FlowInterface $flow;

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $arguments = $input->getArguments();
        $response = ($this->flow)($arguments, self::createLogger($output));

        $output->writeln('Request parameters:');
        var_dump($response->request->parameters->all());

        $output->writeln('Response parameters:');
        var_dump($response->parameters->all());

        return Command::SUCCESS;
    }

    protected static function createLogger(OutputInterface $output): LoggerInterface
    {
        return new ConsoleLogger($output, [
            'debug' => OutputInterface::VERBOSITY_NORMAL,
            'info' => OutputInterface::VERBOSITY_NORMAL,
            'error' => OutputInterface::VERBOSITY_NORMAL,
        ]);
    }
}
