<?php
function callback_inactive()
{
    cron::del('lwl12_resign');
}

function callback_init()
{
    cron::set('lwl12_resign', 'plugins/lwl12_resign/lwl12_resign_cron.php', 0, 0, 0);
    header("Location: /index.php?mod=admin:setplug&plug=lwl12_resign&new");
    exit();
}
