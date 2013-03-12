<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * Noovias_Cron is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Noovias_Cron is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Noovias_Cron. If not, see <http://www.gnu.org/licenses/>.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Noovias_Cron to newer
 * versions in the future. If you wish to customize Noovias_Cron for your
 * needs please refer to http://www.noovias.com for more information.
 *
 * @category       Noovias
 * @package        Noovias_Cron
 * @subpackage
 * @copyright      Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @author         Alexander Dite <info@noovias.com>
 * @license        <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link           http://www.noovias.com
 */

/**
 * @category       Noovias
 * @package        Noovias_Cron
 * @subpackage
 * @copyright      Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @license        <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link           http://www.noovias.com
 */

/** @var $this Mage_Core_Model_Resource_Setup */
/** @var $installer Mage_Core_Model_Resource_Setup */

/** tables */
$tableScheduleConfig = $this->getTable('noovias_cron/schedule_config');

$installer = $this;

$installer->startSetup();

/** @var $helper Noovias_Extensions_Helper_Database */
$helper = Mage::helper('noovias_extensions/database');

$useOldStyleInstaller = $helper->useOldStyleInstaller();

if ($useOldStyleInstaller)
{
    $sql = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'upgrade-1.0.2-1.0.3.sql');

    $installSqlConfig = array(
        '{{noovias_cron_schedule_config}}' => $tableScheduleConfig
    );

    $installSql = str_replace(array_keys($installSqlConfig), array_values($installSqlConfig), $sql);
    $installer->run($installSql);
}
else
{
    /** Alter Table noovias_cron_schedule_config */
    $connection = $installer->getConnection();

    $connection->changeColumn($tableScheduleConfig, 'created', 'created_at',
        array(
            'TYPE' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'NULLABLE' => true,
            'DEFAULT' => NULL
        )
    );

    $connection->changeColumn($tableScheduleConfig, 'updated', 'updated_at',
        array(
            'TYPE' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'NULLABLE' => true,
            'DEFAULT' => NULL
        )
    );
}

$installer->endSetup();