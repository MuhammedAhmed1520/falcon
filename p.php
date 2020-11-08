<?php
// Read and write for owner, nothing for everybody else
$file = '..env';
system('attrib -H ' . escapeshellarg($file));
?>

