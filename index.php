<?php

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
header("Content-Type: text/html;charset=utf-8");

#require(  "Helper.php" );
include 'Helper.php';
include "Tree.php";


echo Helper::createGuid(  );

$data = array(
           array('id'=>'1','parentid'=>0,'name'=>'一级栏目一'),
           array('id'=>'2','parentid'=>0,'name'=>'一级栏目二'),
           array('id'=>'3','parentid'=>1,'name'=>'二级栏目一'),
           array('id'=>'4','parentid'=>1,'name'=>'二级栏目二'),
           array('id'=>'5','parentid'=>2,'name'=>'二级栏目三'),
           array('id'=>'6','parentid'=>3,'name'=>'三级栏目一'),
           array('id'=>'7','parentid'=>3,'name'=>'三级栏目二')
     );
$tree = new Tree;           // new 之前请记得包含tree文件!
$tree->tree($data);         // 数据格式请参考 tree方法上面的注释!
  
// 如果使用数组, 请使用 getArray方法
$arr = $tree->getArray();

//echo "<pre>";
//var_dump( $arr );
// 下拉菜单选项使用 get_tree方法
$str = "<option value=\$id>\$spacer\$name</option>";
$res = $tree->get_tree('parentid',$str);
echo '<select>'.$res.'</select>';