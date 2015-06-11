<?php
/**
 * Joomlatools Console backup plugin - https://github.com/joomlatools/joomla-console-backup
 *
 * @copyright	Copyright (C) 2011 - 2013 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://github.com/joomlatools/joomla-composer for the canonical source repository
 */
 
namespace MyCompany\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Joomlatools\Console\Command\SiteAbstract;

/**
 * Backup plugin class.
 *
 * @author  Steven Rombauts <https://github.com/stevenrombauts>
 * @package Joomlatools\Console
 */
class Backup extends SiteAbstract
{
    protected $backup_directory;

    protected function configure()
    {
        parent::configure();

        $info = posix_getpwuid(posix_getuid());
        $home = isset($info['dir']) ? $info['dir'] : '/tmp';

        $this->setName('site:backup')
            ->addOption(
                'directory',
                null,
                InputOption::VALUE_REQUIRED,
                "Target directory where backups should be stored",
                $home
            )
            ->setDescription('Backup a site');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $this->backup_directory = $input->getOption('directory');

        $this->check();

        $this->backupDatabase();
        $this->backupFiles();
    }

    public function check()
    {
        if (!file_exists($this->target_dir)) {
            throw new \RuntimeException(sprintf('The site %s does not exist', $this->site));
        }

        if (!is_writable($this->backup_directory)) {
            throw new \RuntimeException(sprintf('Backup directory %s is not writable', $this->backup_directory));
        }
    }

    public function backupDatabase()
    {
        $path     = $this->backup_directory . '/' . $this->site . '_' . date('Ymd') . '.sql';
        $password = empty($this->mysql->password) ? '' : sprintf("-p'%s'", $this->mysql->password);

        exec(sprintf("mysqldump -u'%s' %s %s > %s", $this->mysql->user, $password, $this->target_db, $path));

        if (!file_exists($path)) {
            throw new \RuntimeException(sprintf('Failed to backup database "%s"!', $this->target_db));
        }
    }

    public function backupFiles()
    {
        $path     = $this->backup_directory . '/' . $this->site . '_' . date('Ymd') . '.tar.gz';

        exec(sprintf("cd %s && tar -czvf %s *", $this->target_dir, $path));
    }
}
