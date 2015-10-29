<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright http://bbs.baijiacms.com Licensed under the Apache License, Version 2.0
// +----------------------------------------------------------------------
// | Author: 百家威信 <http://bbs.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
function updateOrderStock($id , $minus = true) {
        $ordergoods = mysqld_selectall("SELECT * FROM " . table('shop_order_goods') . " WHERE orderid='{$id}'");
        foreach ($ordergoods as $item) {
        	$goods = mysqld_select("SELECT * FROM " . table('shop_goods') . "  WHERE id='".$item['goodsid']."'");
        
       
            if ($minus) {
                //属性
                if (!empty($item['optionid'])) {
                    mysqld_query("update " . table('shop_goods_option') . " set stock=stock-:stock where id=:id", array(":stock" => $item['total'], ":id" => $item['optionid']));
                }
                $data = array();
                 if($goods['totalcnf']!=1)
			        	{
                $data['total'] = $goods['total'] - $item['total'];
			        	}
                $data['sales'] = $goods['sales'] + $item['total'];
                mysqld_update('shop_goods', $data, array('id' => $item['goodsid']));
            } else {
                //属性
                if (!empty($item['optionid'])) {
                    mysqld_query("update " . table('shop_goods_option') . " set stock=stock+:stock where id=:id", array(":stock" => $item['total'], ":id" => $item['optionid']));
                }
                $data = array();
                 if($goods['totalcnf']!=1)
			        	{
                $data['total'] = $goods['total'] + $item['total'];
			        	}
                $data['sales'] = $goods['sales'] - $item['total'];
                mysqld_update('shop_goods', $data, array('id' => $item['goodsid']));
            }
        }
    }