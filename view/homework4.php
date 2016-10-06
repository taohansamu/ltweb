<?php 
include("../layout/header.php");
$values = array('name' => 'Buzz Lightyear',
 'email_address' => 'buzz@starcommand.gal',
'age' => 32,
'smarts' => 'some');
function user_sort($a, $b) {
 // smarts is all-important, so sort it first
 if($b == 'smarts') {
 return 1;
 }
 else if($a == 'smarts') {
 return -1;
 }
 return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
}
if(isset($_POST['submitted'])) {
	$sort_type=$_POST['sort_type'];
	switch ($sort_type) {
		case 'usort':
			usort($values, 'user_sort');
			break;
		case 'uksort':
			uksort($values, 'user_sort');
			break;
		case 'uasort':
			uasort($values, 'user_sort');
			break;
		case 'sort':
			sort($values);
			break;
		case 'ksort':
			ksort($values);
			break;
		case 'rsort':
			rsort($values);
			break;
		case 'krsort':
			krsort($values);
			break;
		case 'asort':
			asort($values);
			break;
		case 'arsort':
			arsort($values);
			break;
		default:
			echo "Please select sort type";
			break;
	}
}
?>
<div id="content">

<form method="post">
<p>
 <input type="radio" name="sort_type" value="sort" />
 Standard sort<br />
 <input type="radio" name="sort_type" value="rsort" /> Reverse sort<br />
 <input type="radio" name="sort_type" value="usort" /> User-defined sort<br />
 <input type="radio" name="sort_type" value="ksort" /> Key sort<br />
 <input type="radio" name="sort_type" value="krsort" /> Reverse key sort<br />
 <input type="radio" name="sort_type" value="uksort" /> User-defined key sort<br
/>
 <input type="radio" name="sort_type" value="asort" /> Value sort<br />
 <input type="radio" name="sort_type" value="arsort" /> Reverse value sort<br />
 <input type="radio" name="sort_type" value="uasort" /> User-defined value
sort<br />
</p>
<p align="center">
 <input type="submit" value="Sort" name="submitted" />
</p>
<p>
 Values <?= isset($_POST['submitted']) ? "sorted by $sort_type" : "unsorted"; ?>:
</p>
<ul>
 <?php
 foreach($values as $key=>$value) {
 echo "<li><b>$key</b>: $value</li>";
 }
 ?>
</ul>
</form>
</div>
<script>
	 $('input[type="radio"][value="<?= isset($_POST["sort_type"])? $_POST["sort_type"]:"sort" ;?>"]').attr('checked', true);
</script>

