<?php

if (!empty($filter)) {
	$album = get_album($filter);
}
?>

<pre>
<?php
print_r($album);
?>
</pre>