<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright http://bbs.baijiacms.com Licensed under the Apache License, Version 2.0
// +----------------------------------------------------------------------
// | Author: 百家威信 <http://bbs.baijiacms.com>
// +----------------------------------------------------------------------
	$result = array(
		'url' => '',
		'title' => '',
		'original' => '',
		'state' => 'SUCCESS',
	);
	if (!empty($_FILES['imgFile']['name'])) {
		if ($_FILES['imgFile']['error'] != 0) {
			$result['state'] = '上传失败，请重试！';
			exit(json_encode($result));
		}
		$file = file_upload($_FILES['imgFile'], 'image');
		if (is_error($file)) {
			$result['state'] = $file['message'];
			exit(json_encode($result));
		}
		$result['url'] = $file['path'];
		$result['title'] = '';
		$result['original'] = '';

		exit(json_encode($result));
	} else {
		$result['state'] = '请选择要上传的图片！';
		exit(json_encode($result));
	}