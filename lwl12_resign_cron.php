<?php
if (!defined('SYSTEM_ROOT')) {
    die('Insufficient Permissions');
}
/**
 * [cron_lwl12_resign 修改数据库日期]
 * @return [none]
 */
function cron_lwl12_resign()
{
    $s = unserialize(option::get('plugin_lwl12_resign'));
    date_default_timezone_set('PRC');
    global $m, $i;
    if (date('G') >= $s['hour']) {
        if (date('i') >= $s['min']) {
            if (option::get('plugin_lwl12_resign_lastdate' != date('j'))) {
                echo "OK";
                foreach ($i['table'] as $table) {
                    $m->query("UPDATE `" . DB_NAME . "`.`" . DB_PREFIX . $table . "` SET  `lastdo` =  '" . date('Y-m-d', strtotime('-1 day')) . "'", true);
                }
                option::set('plugin_lwl12_resign_lastdate', date('j'));
            }
            
        }
    }
}