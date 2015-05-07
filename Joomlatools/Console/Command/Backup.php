<?php
namespace Joomlatools\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Backup extends SiteAbstract
{
    protected function configure()
    {
        $this->setName('site:backup')
             ->setDescription('Backup a site');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $this->check();
    }

    public function check()
    {
        if (!file_exists($this->target_dir)) {
            throw new \RuntimeException(sprintf('The site %s does not exist', $this->site));
        }
    }
}
