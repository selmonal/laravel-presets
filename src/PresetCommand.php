<?php

namespace Selmonal\LaravelPresets;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PresetCommand extends Command
{	
	/**
	 * Available preset types.
	 * 
	 * @var array
	 */
	private static $types = [
		'spectre'
	];

	/**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('preset')
            ->setDescription('Preset template.')
            ->addArgument('type');
    }

    /**
     * Execute the command.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (! $this->detectLaravelRoot()) {
            $output->writeln('<comment>It is not seems to a Laravel root directory.</comment>');

            return;
        }

    	if (! in_array($input->getArgument('type'), static::$types)) {
    		$output->writeln('<comment>Invalid type of preset has provided. Types: '.implode(static::$types, ',').'</comment>');

            return;
    	}

    	$this->{$input->getArgument('type')}($output);
    }

    /**
     * Determine if the running directory is a Laravel 
     * app directory.
     * 
     * @return boolean
     */
    private function detectLaravelRoot()
    {
        return file_exists(getcwd().'/artisan');
    }

    /**
     * Install the "spectre" preset.
     *
     * @param OutputInterface $output
     * @return void
     */
    private function spectre(OutputInterface $output)
    {
    	(new Presets\Spectre(getcwd()))->install();

    	$output->writeln('<info>Spectre scaffolding installed successfully.</info>');
    }
}