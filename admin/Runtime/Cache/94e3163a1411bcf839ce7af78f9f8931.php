<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=7" /><link href="__ROOT__/statics/admin/css/style.css" rel="stylesheet" type="text/css"/><link href="__ROOT__/statics/css/dialog.css" rel="stylesheet" type="text/css" /><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/jquery-1.4.2.min.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidator.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidatorregex.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/admin/js/admin_common.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/dialog.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/iColorPicker.js"></script><script language="javascript">var URL = '__URL__';
var ROOT_PATH = '__ROOT__';
var APP	 =	 '__APP__';
var lang_please_select = "<?php echo (L("please_select")); ?>";
var def=<?php echo ($def); ?>;
$(function($){
	$("#ajax_loading").ajaxStart(function(){
		$(this).show();
	}).ajaxSuccess(function(){
		$(this).hide();
	});
});

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><script type="text/javascript" src="__ROOT__/includes/kindeditor/kindeditor-min.js"></script><script type="text/javascript">	//编辑器
	KE.show({
		id : 'info',
		imageUploadJson : '__ROOT__/includes/kindeditor/php/upload_json.php',
		fileManagerJson : '__ROOT__/includes/kindeditor/php/file_manager_json.php',
		allowFileManager : true,
		afterCreate : function(id) {
			KE.event.ctrl(document, 13, function() {
				KE.util.setData(id);
				document.forms['myform'].submit();
			});
			KE.event.ctrl(KE.g[id].iframeDoc, 13, function() {
				KE.util.setData(id);
				document.forms['myform'].submit();
			});
		}
	});
</script><form action="<?php echo u('items/add');?>" method="post" name="myform" id="myform"  enctype="multipart/form-data" style="margin-top:10px;"><div class="pad-10"><div class="col-tab"><ul class="tabBut cu-li"><li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',3,1);">基本信息</li><li id="tab_setting_2" onclick="SwapTab('setting','on','',3,2);">商品详情</li><li id="tab_setting_3" onclick="SwapTab('setting','on','',3,3);">SEO设置</li></ul><div id="div_setting_1" class="contentList pad-10"><table width="90%" cellspacing="0" class="search-form" align="center"><tbody><tr><td><div class="explain-col">					&nbsp;&nbsp;&nbsp;&nbsp;注：只需要输入淘宝，天猫的商品的详细链接地址即可,如：<font color=red><b>http://detail.tmall.com/item.htm?id=13925978724</b></font></div></td></tr></tbody></table><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="100">商品地址 :</th><td><input type="text" name="collect_url" id="collect_url" class="input-text" size="60"><input type="button" value="开始采集" class="button" onclick="collect_item();">                &nbsp;&nbsp;<a class="button" href="<?php echo U('items/handel_item');?>" style="cursor:pointer;">手动上传</a></td></tr><tbody id="item_body" style="display:none;"><tr><th width="100">商品名称 :</th><td><input type="text" name="title" id="title" class="input-text" size="60"></td></tr><tr><th>所属分类 :</th><td><select onchange="get_child_cates(this,'scid');" name="pcid" id="pcid"><option value="">--请选择--</option><?php if(is_array($first_cates_list)): $i = 0; $__LIST__ = $first_cates_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select>                &nbsp;-&nbsp;
                <select onchange="get_child_cates(this,'cid');"  name="scid" id="scid"><option value="">--请选择--</option></select>                &nbsp;-&nbsp;
                <select  name="cid" id="cid"><option value="">--请选择--</option></select></td></tr><tr><th>商品图片 :</th><td><img id="img_show" src="" style="display:none" /><br /><br /><input type="file" name="img" id="img" class="input-text" size=21 /></td></tr><tr><th>来源 :</th><td><select name="sid" id="sid"><option value="0" selected="selected">--选择来源--</option><?php if(is_array($site_list)): $i = 0; $__LIST__ = $site_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" alias="<?php echo ($val["alias"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></td></tr><tr><th>链接地址 :</th><td><input type="text" name="url" id="url" class="input-text" size="60"></td></tr><tr><th>标签 :</th><td><input type="text" name="tags" id="tags" class="input-text" size="60"></td></tr><tr><th>价格 :</th><td><input type="text" name="price" id="price" class="input-text" size="10">元</td></tr><tr><th>喜欢数 :</th><td><input type="text" name="likes" id="likes" class="input-text" size="10" onkeyup="value=value.replace(/[^\d]/g,'') "onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"></td></tr><tr><th>浏览数 :</th><td><input type="text" name="hits" id="hits" class="input-text" size="10" onkeyup="value=value.replace(/[^\d]/g,'') "onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"></td></tr></tbody></table></div><div id="div_setting_2" class="contentList pad-10 hidden"><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="100">详细内容 :</th><td><textarea name="info" id="info" style="width:80%;height:250px;visibility:hidden;"></textarea></td></tr></table></div><div id="div_setting_3" class="contentList pad-10 hidden"><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="100"><?php echo (L("seo_title")); ?> :</th><td><input type="text" name="seo_title" id="seo_title" class="input-text" size="60"></td></tr><tr><th><?php echo (L("seo_keys")); ?> :</th><td><input type="text" name="seo_keys" id="seo_keys" class="input-text" size="60"></td></tr><tr><th><?php echo (L("seo_desc")); ?> :</th><td><textarea name="seo_desc" id="seo_desc" cols="80" rows="8"></textarea></td></tr></table></div><div class="bk15"><input type="hidden" name="item_key" id="item_key" value="" /><input type="hidden" name="input_img" id="input_img" value="" /><input type="hidden" name="simg" id="simg" value="" /><input type="hidden" name="bimg" id="bimg" value="" /><input type="hidden" name="author" id="author" value="" /></div><div class="btn"><input type="submit" value="<?php echo (L("submit")); ?>" name="dosubmit" class="button" id="dosubmit"></div></div></div></form><script type="text/javascript">function SwapTab(name,cls_show,cls_hide,cnt,cur){
    for(i=1;i<=cnt;i++){
		if(i==cur){
			 $('#div_'+name+'_'+i).show();
			 $('#tab_'+name+'_'+i).attr('class',cls_show);
		}else{
			 $('#div_'+name+'_'+i).hide();
			 $('#tab_'+name+'_'+i).attr('class',cls_hide);
		}
	}
}
function collect_item(){
	var url = $("#collect_url").val();
    $.post("<?php echo u('items/collect_item');?>", { url: url }, function(jsondata){
		var return_data  = eval("("+jsondata+")");
		$("#item_body").show();
		$("#title").val(return_data.data.item.title);
		$("#url").val(return_data.data.item.url);
		$("#tags").val(return_data.data.item.tags);
		$("#price").val(return_data.data.item.price);
		$("#item_key").val(return_data.data.item.key);
		$("#input_img").val(return_data.data.item.img);
		$("#simg").val(return_data.data.item.simg);
		$("#bimg").val(return_data.data.item.bimg);
		$("#author").val(return_data.data.item.author);
		$("#likes").val(return_data.data.item.volume);
		$("#hits").val(return_data.data.item.hits);
		$("#sid option[alias='"+return_data.data.item.author+"']").attr('selected',true);
		$("#cid option[value='"+return_data.data.item.cid+"']").attr('selected',true);
		$("#img_show").attr('src', return_data.data.item.img).show();
	}); 
}
function get_child_cates(obj,to_id) {
	var parent_id = $(obj).val();
	if(to_id == 'scid') {
		$('#cid').html( '<option value=\"\">--请选择--</option>');
	}
	$.get('?m=items&a=get_child_cates&g=admin&parent_id='+parent_id,function(data){
		var obj = eval("("+data+")");
		$('#'+to_id).html( obj.content );
	});
}
</script></body></html>