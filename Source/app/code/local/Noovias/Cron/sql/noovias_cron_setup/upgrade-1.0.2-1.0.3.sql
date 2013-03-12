#-----------------------------------------------------------------
#-- Alter Table noovias_cron_schedule_config
#-----------------------------------------------------------------

ALTER TABLE `{{noovias_cron_schedule_config}}`
CHANGE `created` `created_at` timestamp NULL default NULL;

ALTER TABLE `{{noovias_cron_schedule_config}}`
CHANGE `updated` `updated_at` timestamp NULL default NULL;