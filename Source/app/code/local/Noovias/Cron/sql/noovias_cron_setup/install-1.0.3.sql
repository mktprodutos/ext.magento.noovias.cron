#-----------------------------------------------------------------
#-- Create Table noovias_cron_processedjob
#-----------------------------------------------------------------
CREATE TABLE `{{noovias_cron_processedjob}}` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` int(10) unsigned NOT NULL,
  INDEX `IDX_NOOVIAS_CRON_PROCESSEDJOB_SCHEDULEID` (`schedule_id`),
  `email_sent` boolean NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#-----------------------------------------------------------------
#-- Create Table noovias_cron_schedule_config
#-----------------------------------------------------------------
CREATE TABLE `{{noovias_cron_schedule_config}}` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_code` varchar(255) NOT NULL,
  INDEX `IDX_NOOVIAS_CRON_SCHEDULE_CONFIG_JOBCODE` (`job_code`),
  `status` varchar(32),
  `cron_expr` varchar(255),
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  `created_by` int(10) unsigned,
  `updated_by` int(10) unsigned,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;