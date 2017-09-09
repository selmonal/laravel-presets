<?php

namespace Selmonal\LaravelPresets\Presets;

use Illuminate\Filesystem\Filesystem;
use Selmonal\LaravelPresets\Preset;

class Spectre extends Preset
{
	/**
	 * Install the preset.
	 * 
	 * @return void
	 */
	public function install()
	{
		$this->updatePackages();
		$this->removeNodeModules();
        $this->copyViews();
		$this->copySass();
	}

	/**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected function updatePackageArray(array $packages)
    {
        return [
            'spectre.css' => '^0.4.0',
        ] + $packages;
    }

    /**
     * Copy the view files.
     *
     * @param  array  $packages
     * @return array
     */
    protected function copyViews()
    {
        (new Filesystem)->copyDirectory(
            __DIR__.'/../../stubs/spectre/views',
            $this->resolvePath('resources/views')
        );
    }

    /**
     * Copy the sass files.
     *
     * @param  array  $packages
     * @return array
     */
    protected function copySass()
    {
        $file = new Filesystem;

        $file->deleteDirectory($this->resolvePath('resources/assets/sass'));

        $file->copyDirectory(
            __DIR__.'/../../stubs/spectre/sass',
            $this->resolvePath('resources/assets/sass')
        );
    }
}