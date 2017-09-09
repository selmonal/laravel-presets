<?php

namespace Selmonal\LaravelPresets;

use Symfony\Component\Filesystem\Filesystem;

class Preset
{	
	/**
	 * The path to application directory.
	 * 
	 * @var string
	 */
	protected $appPath;

	/**
	 * Construct Preset.
	 * 
	 * @param string $appPath
	 */
	public function __construct($appPath)
	{
		$this->appPath = $appPath;
	}

	/**
	 * Install the preset.
	 * 
	 * @return void
	 */
	public function install()
	{
	}

	/**
     * Update the "package.json" file.
     *
     * @return void
     */
    protected function updatePackages()
    {
        if (! file_exists($this->resolvePath('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents($this->resolvePath('package.json')), true);

        $packages['devDependencies'] = static::updatePackageArray(
            $packages['devDependencies']
        );

        ksort($packages['devDependencies']);

        file_put_contents(
            $this->resolvePath('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    /**
     * Remove the installed Node modules.
     *
     * @return void
     */
    protected function removeNodeModules()
    {
        $files = new Filesystem;

        $files->remove($this->resolvePath('node_modules'));

        $files->remove($this->resolvePath('yarn.lock'));

        $files->remove($this->resolvePath('package-lock.json'));
    }

    /**
     * @param  string $path
     * @return string
     */
    protected function resolvePath($path)
    {
    	return $this->appPath.'/'.$path;
    }
}