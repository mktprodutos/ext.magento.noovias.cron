<?php

/** @var $this Mage_Core_Model_Resource_Setup */
/** @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

$tableProcessedCron = $this->getTable('noovias_cron_processedjob');

$installer->run(
    "ALTER TABLE {$tableProcessedCron} ADD INDEX (`schedule_id`);"
);

$installer->endSetup();