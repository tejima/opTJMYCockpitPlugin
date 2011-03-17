<?php
class PNE2Task extends sfBaseTask
{
  protected function configure()
  {
    set_time_limit(120);
    mb_language("Japanese");
    mb_internal_encoding("utf-8");

    $this->namespace        = 'tjmy';
    $this->name             = 'opjp2sheet';
    $this->aliases          = array('tjmy-opjp2sheet');
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [feed-reader|INFO] task does things.
Call it with:

  [php symfony socialagent:feed-reader [--env="..."] application|INFO]
EOF;
    //$this->addArgument('application', sfCommandArgument::REQUIRED, 'The application name');
    //$this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod');
  }
  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);
    Cockpit::OP32Cell();
  }
}
