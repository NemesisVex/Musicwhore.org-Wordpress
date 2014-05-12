<?php

if (!empty($filter)) {
	$release = get_release($filter);
}
?>

<pre>
<?php
echo $filter . "\n";
print_r($release);
?>
</pre>