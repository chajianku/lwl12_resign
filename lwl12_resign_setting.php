<?php
if (!defined('SYSTEM_ROOT')) {
    die('Insufficient Permissions');
}

$s = unserialize(option::get('plugin_lwl12_resign'));

if (isset($_GET['ok'])) {
    echo '<div class="alert alert-success">设置保存成功</div>';
}

if (isset($_GET['new'])) {
    echo '<div class="alert alert-warning">感谢您使用<a href="http://blog.lwl12.com" target="_blank">liwanglin12</a>开发的自动重签插件。</br>请您完成插件相关设置，否则插件将无法正常工作！</div>';
}
?>
<h3>自动重签 - 管理</h3><br/>
<form action="setting.php?mod=plugin:lwl12_resign" method="post">
<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:45%">参数</th>
			<th style="width:55%">值</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>允许进行重签的时间(小时，24小时制，一位数字无需加0)<br/>插件将会在此时间后重新签到一次</td>
			<td><input type="number" min="<?php
echo (option::get('sign_hour') + 2);
?>" max="23" step="1" name="hour" value="<?php
echo $s['hour'];
?>"  class="form-control" pattern="[0-9]" required></td>
		</tr>
		<tr>
			<td>允许进行重签的时间(分钟)<br/>插件将会在此时间后重新签到一次</td>
			<td><input type="number" min="0" max="59" step="1" value="<?php
echo $s['min'];
?>" name="min" class="form-control" pattern="[0-9]" required></td>
		</tr>
	</tbody>
</table>
<br/><br/><button type="submit" class="btn btn-success">保存设置</button>
</form>