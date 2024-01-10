<?php

$query="select * from boxes ";
$page=intval(SGET('page'));
$perpage=10;

$rs = sql_query($query,$db);
$totalrows = sql_num_rows($rs);

$totalpages = ceil($totalrows/$perpage);

if ($totalpages > 1) { ?>
<?php if ($page>1) {?><a href="boxes.php?page=<?php echo ($page-1);?>">« prev</a><?php }?>
<span>Page <?php echo $page;?> of <?php echo $totalpages;?></span>
<?php if ($page<$totalpages) {?><a href="boxes.php?page=<?php echo ($page+1);?>">next »</a><?php }?>
<?php 
}
