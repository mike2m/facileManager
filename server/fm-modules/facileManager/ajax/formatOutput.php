<?php
/*
 +-------------------------------------------------------------------------+
 | Copyright (C) 2014 The facileManager Team                               |
 |                                                                         |
 | This program is free software; you can redistribute it and/or           |
 | modify it under the terms of the GNU General Public License             |
 | as published by the Free Software Foundation; either version 2          |
 | of the License, or (at your option) any later version.                  |
 |                                                                         |
 | This program is distributed in the hope that it will be useful,         |
 | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           |
 | GNU General Public License for more details.                            |
 +-------------------------------------------------------------------------+
 | facileManager: Easy System Administration                               |
 +-------------------------------------------------------------------------+
 | http://www.facilemanager.com/                                           |
 +-------------------------------------------------------------------------+
 | Formats results for dialog box                                          |
 | Author: Jon LaBass                                                      |
 +-------------------------------------------------------------------------+
*/

if (isset($_POST)) {
	if (!defined('AJAX')) {
		define('AJAX', true);
	}
	require_once('../../../fm-init.php');
	
	$message_array = $_POST;
}

extract($message_array);

if (!isset($title) || empty($title)) {
	$title = 'Error';
}

echo buildPopup('header', $title);
if (strpos($content, '<p') === false) {
	$content = "<p>$content</p>";
}
if (isset($fmdb->last_error)) {
	$content .= $fmdb->last_error;
}
echo $content . buildPopup('footer', 'OK', array('cancel_button' => 'cancel'));

?>