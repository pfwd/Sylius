<?php

namespace Sylius\Bundle\InstallerBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallAssetsCommand extends AbstractInstallCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('sylius:install:assets')
            ->setDescription('Installs all Sylius assets.')
            ->setHelp(<<<EOT
The <info>%command.name%</info> command downloads and installs all Sylius media assets.
EOT
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('Installing Sylius assets for environment <info>%s</info>.', $this->getEnvironment()));

        try {
            $this->ensureDirectoryExistsAndIsWritable(self::WEB_ASSETS_DIRECTORY, $output);
            $this->ensureDirectoryExistsAndIsWritable(self::WEB_BUNDLES_DIRECTORY, $output);
        } catch (\RuntimeException $exception) {
            return 1;
        }

        $commands = array(
            'assets:install',
            'assetic:dump',
        );

        $this->runCommands($commands, $input, $output);
    }
}
