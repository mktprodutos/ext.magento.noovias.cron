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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
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
 * @category            Noovias
 * @package             Noovias_Cron
 * @subpackage
 * @copyright            Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @author                Alexander Dite <info@noovias.com>
 * @license                <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link                http://www.noovias.com
 */

/**
 * @category            Noovias
 * @package                Noovias_Cron
 * @subpackage
 * @copyright            Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @license                <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link                 http://www.noovias.com
 */

class Noovias_Cron_Block_Adminhtml_Widget_Grid_Column_Renderer_JobCodeReadable
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * Renders grid column
     *
     * @param Varien_Object $row
     * @return string
     */
    public function _getValue(Varien_Object $row)
    {
        $return = '';
        $jobCode = $row->getJobCode();
        if ($jobCode) {
            $return = $this->helperCron()->__($jobCode);
        }
        return $return;
    }

    /**
     * @return Noovias_Cron_Helper_Data
     */
    protected function helperCron()
    {
        return Mage::helper('noovias_cron');
    }
}