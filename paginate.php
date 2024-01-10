<?php

$query="select * from boxes ";
$page=intval(SGET('page'));
$perpage=10;

$rs = sql_query($query,$db);
$totalrows = sql_num_rows($rs);

$totalpages = ceil($totalrows/$perpage);

?>
<?php if ($totalpages > 1) { ?>
<?php if ($page>1) {?><span>« prev</span><?php }?>
<span>Page <?php echo $page;?> of <?php echo $totalpages;?></span>
<?php if ($page<$totalpages) {?><span> next »</span><?php }?>
<?php }?>