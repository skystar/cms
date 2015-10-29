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
		'message' => '',
		'error' => 1,
	);
	if (!empty($_FILES['imgFile']['name'])) {
		if ($_FILES['imgFile']['error'] != 0) {
			$result['message'] = '上传失败，请重试！';
			exit(json_encode($result));
		}
		$file = file_upload($_FILES['imgFile'], 'other');
		if (is_error($file)) {
			$result['message'] = $file['message'];
			exit(json_encode($result));
		}
			$result['error'] = 0;
		$result['url'] = $file['path'];
		$result['filename'] =$file['path'];
		$result['url']='attachment/'.$result['filename'];
		exit(json_encode($result));
	} else {
		$result['message'] = '请选择要上传的图片！';
				$result['error'] = 1;
		exit(json_encode($result));
	}