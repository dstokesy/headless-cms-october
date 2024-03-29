<?php namespace System\Console;

use Illuminate\Console\Command;
use System\Classes\UpdateManager;
use System\Classes\PluginManager;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * PluginRefresh refreshes a plugin.
 *
 * This destroys all database tables for a specific plugin, then builds them up again.
 * It is a great way for developers to debug and develop new plugins.
 *
 * @package october\system
 * @author Alexey Bobkov, Samuel Georges
 */
class PluginRefresh extends Command
{
    use \Illuminate\Console\ConfirmableTrait;

    /**
     * @var string name of console command
     */
    protected $name = 'plugin:refresh';

    /**
     * @var string description of the console command
     */
    protected $description = 'Rollback and migrate database tables for a plugin.';

    /**
     * handle executes the console command
     */
    public function handle()
    {
        $manager = PluginManager::instance();
        $name = $manager->normalizeIdentifier($this->argument('name'));

        if (!$manager->hasPlugin($name)) {
            return $this->output->error("Unable to find plugin [{$name}]");
        }

        $message = "This will DESTROY database tables for plugin [{$name}].";
        if ($toVersion = $this->option('rollback')) {
            $message = "This will DESTROY database tables for plugin [{$name}] up to version [{$toVersion}].";
        }

        if (!$this->confirmToProceed($message)) {
            return;
        }

        if ($this->option('rollback') !== false) {
            return $this->handleRollback($name);
        }
        else {
            return $this->handleRefresh($name);
        }
    }

    /**
     * handleRollback performs a database rollback
     */
    protected function handleRefresh($name)
    {
        // Rollback plugin migration
        $manager = UpdateManager::instance()->setNotesCommand($this);
        $manager->rollbackPlugin($name);

        // Rerun migration
        $this->line('Reinstalling plugin...');
        $manager->updatePlugin($name);
    }

    /**
     * handleRollback performs a database rollback
     */
    protected function handleRollback($name)
    {
        // Rollback plugin migration
        $manager = UpdateManager::instance()->setNotesCommand($this);

        if ($toVersion = $this->option('rollback')) {
            $manager->rollbackPluginToVersion($name, $toVersion);
        }
        else {
            $manager->rollbackPlugin($name);
        }
    }

    /**
     * getArguments get the console command arguments
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the plugin. Eg: AuthorName.PluginName'],
        ];
    }

    /**
     * getOptions get the console command options
     */
    protected function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Force the operation to run.'],
            ['rollback', 'r', InputOption::VALUE_OPTIONAL, 'Specify a version to rollback to, otherwise rollback to the beginning.', false],
        ];
    }

    /**
     * getDefaultConfirmCallback specifies the default confirmation callback
     */
    protected function getDefaultConfirmCallback()
    {
        return function () {
            return true;
        };
    }
}
