<?php 
		    	$member=get_member_account(false);
				$member=member_get($member['openid']);
			if(empty($member['openid']))
				{
				$member=get_member_account(false);	
				$member['createtime']=time();
				}
			$is_login=is_login_account();
			$weixinfans=get_weixin_fans_byopenid($member['openid'],$member['openid']);
			if(!empty($weixinfans)&&!empty($weixinfans['avatar']))
			{
				$avatar=$weixinfans['avatar'];
			}
			if($is_login)
			{
					$fansindex_menu_list = mysqld_selectall("SELECT * FROM " . table('shop_diymenu')." where menu_type='fansindex' order by torder desc" );	
			}
			include themePage('fansindex');