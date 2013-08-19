<?php

$filename = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
$file = file_get_contents('php://input');
$type = "image/" . $parameters['filetype'];

if(file_put_contents(__DIR__ . '/uploads/' . $filename, $file))
{
	echo json_encode(array('success' => 1, 'error' => 0));
}
else { echo json_encode(array('success' => 0, 'error' => 'error writing file')); }