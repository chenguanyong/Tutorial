<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"./template/admin/default\member\index.html";i:1490319727;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Language" content="zh-cn" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="Fhua" />
    <meta name="Copyright" content="BLIT" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0,initial-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>后台管理</title>
    <link href="__lay__/css/layui.css" rel="stylesheet" />
    <link href="__css__/style.css" rel="stylesheet" />
    <link href="__font__/font-awesome.css" rel="stylesheet" />

    <script src="__lay__/layui.js"></script>

</head>
<body>
<style>
    .layui-form-switch {
        padding-left: 0px;
        transition: .1s linear;
    }
    .layui-table tr th{text-align: center;}
    .layui-table tr td{text-align: center;}
</style>
<div class="main-wrap">
    <blockquote class="layui-elem-quote fhui-admin-main_hd">
        <h2>字典列表</h2>
    </blockquote>
    <div style=" float:left; width:20%; border:1px solid #ddd"><ul id="demo"></ul></div>
	<div class="layui-tab-item layui-show">
	<iframe name='list_dic' src="/index.php/admin/dictionaries/getDicListByPage?id=0"  style="height: 602px; float:left; border:0px; width:75%"></iframe>
</div></div>
<!-- 角色分配 -->

<div class="shang_box" style="display: none;">
    <div class="shang_tit">
        <p>继续努力!</p>
    </div>
    
</div>
<script src="__js__/global.js"></script>

</body>
</html>
<script src="__js__/jquery.min.js?v=2.1.4"></script>
<script>

			
$.post('../ajax/getDic',{id:0 },function(datas){	

	layui.use(['tree', 'layer'], function(){
		  var layer = layui.layer
		  ,$ = layui.jquery; 

		  layui.tree({
		    elem: '#demo' //指定元素
		    ,target: 'list_dic' //是否新选项卡打开（比如节点返回href才有效）
		   
		    ,nodes: datas
		    ,click: function(item){ //点击节点回调
		        //layer.msg('当前节名称：'+ item.name + '<br>全部参数：'+ JSON.stringify(item));
		    //$(this).css("background-color","#009688");    
		   // console.log(JSON.stringify(item));
		      }
		  });

		});				
					
},'json');	




</script>
