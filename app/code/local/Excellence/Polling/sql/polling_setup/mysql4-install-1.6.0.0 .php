 <?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('answer')};
CREATE TABLE {$this->getTable('answer')} (
  `polling_id` int(11) unsigned NOT NULL,
  `answer_id` int(11) unsigned NOT NULL auto_increment,
  `answer_title` varchar(255) NOT NULL default '',  
  `votes_count` int(11) NOT NULL default '0',
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

 $installer->endSetup(); 