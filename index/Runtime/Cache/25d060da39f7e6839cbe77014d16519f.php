<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"><title><?php echo ($seo["seo_title"]); ?></title><meta name="keywords" content="<?php echo ($seo["seo_keys"]); ?>" /><meta name="description" content="<?php echo ($seo["seo_desc"]); ?>" /><link rel="stylesheet" type="text/css" href="__TMPL__public/css/style.css" /><script type="text/javascript">var def=<?php echo ($def); ?>;
</script><script type="text/javascript" src="__ROOT__/statics/js/jquery/jquery-1.4.2.min.js"></script><script type="text/javascript" src="__ROOT__/statics/js/pinphp.js"></script><script type="text/javascript" src="__TMPL__public/js/common.js"></script><!--[if IE]><link rel="stylesheet" type="text/css" href="__TMPL__public/css/ie.css" /><![endif]--><!--[if lte IE 8]><script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.corner.js"></script><script type="text/javascript">$(function(){ 
	$('.jq_corner').corner();
});
</script><![endif]--></head><body><div class="header"><div class="mbox clearfix"><span class="logo"><a title="<?php echo ($site_name); ?>" href="__APP__/"><img alt="<?php echo ($site_name); ?>" src="__TMPL__/public/images/logo.gif"></a></span><div class="right"><ol class="homelogin login_list"><?php if(isset($user)): ?><li><a href="<?php echo u('uc/index');?>">我的空间</a></li><li><a href="<?php echo u('uc/account_basic');?>">帐号设置</a></li><li><div id="share_goods" class="left top_share"><div class="button">分享宝贝</div></div></li><li><a href="<?php echo u('uc/logout');?>">退出</a></li><?php else: ?><li><a class="nav-link-item sep url_cookie red" href="<?php echo u('uc/login');?>">登录</a></li><li><a class="nav-link-item sep url_cookie red" href="<?php echo u('uc/register');?>">注册</a></li><li><a class="m_sina" href="<?php echo u('uc/sina_login');?>" target="_blank">微博登录</a></li><li><a class="m_qq" href="<?php echo u('uc/qq_login');?>" target="_blank">QQ登录</a></li><?php endif; ?><li><a class="sep nav-link-item" onClick="return SetHome(this,'<?php echo ($site_domain); ?>');">设为首页</a></li><li><a class="sep nav-link-item" onClick="return addBookmark('<?php echo ($site_name); ?>','<?php echo ($site_domain); ?>');">加入收藏</a></li></ol></div></div><div class="main_nav_wrapper"><div class="main_nav"><ul class="nav_left"><li><a href="__APP__/">首 页</a></li><?php if(is_array($nav_list['main'])): $i = 0; $__LIST__ = $nav_list['main'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><?php if($val['in_site'] == '0'): ?><a href="<?php echo ($val["url"]); ?>" title="<?php echo ($val["name"]); ?>" <?php if($val['system'] == 0): ?>class="f12 fnormal"<?php endif; ?>><?php else: ?><a href="__APP__<?php echo ($val["url"]); ?>" title="<?php echo ($val["name"]); ?>" <?php if($val['system'] == 0): ?>class="f12 fnormal"<?php endif; ?>><?php endif; echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><div class="nav_search"><form method="post" action="<?php echo u('search/index');?>" onsubmit="return check_search(this);"><input type="text" value="<?php echo ($default_kw); ?>" autocomplete="off" name="keywords" class="kw_ipt f12 gray"><input type="submit" value="" id="fm_hd_btm_shbx_bttn" class="do_ipt"></form></div></div></div></div><script type="text/javascript">var default_kw = "<?php echo ($default_kw); ?>";
$(function(){
	$(".kw_ipt").focus(function(){
		$(this).val($(this).val()==default_kw ? '' : $(this).val());
	}).blur(function(){
		$(this).val($(this).val()=='' ? default_kw : $(this).val());
	});
});
</script><div class="wrapper clearfix"><link rel="stylesheet" type="text/css" href="__TMPL__public/css/uc.css" /><div class="uc clearfix"><div class="album_nav mt20"><div class="album_home"></div><a class="link" href="<?php echo u('album/index');?>">专辑</a>/
        <a href="<?php echo uc('uc/album');?>"><?php echo ($info["album_who"]); ?></a>/
        <a><?php echo ($info["album_title"]); ?></a></div><div class="item_list infinite_scroll like_list" style="min-height:200px;"><div class="masonry_brick mt20" style="position: absolute; top: 0px; left: 0px;"><div class="uc_user_info "><div class="clearfix top"><a href="<?php echo uc('uc/index');?>" target="_blank" class="left"><img src="<?php echo uimg($u['img']);?>" width="48" height="48" alt="<?php echo ($u["name"]); ?>" class="avatar"></a><div class="user_name left"><a href="<?php echo uc('uc/index');?>" target="_blank"><?php echo ($u["name"]); ?></a><div class="add_follow <?php if($u["is_follow"] == 1): ?>yet<?php endif; ?>" fans_id="<?php echo ($u["id"]); ?>"></div></div></div><div class="user_collect_info"><a href="<?php echo uc('uc/album');?>" target="_blank">专辑<span><?php echo ($u["album_num"]); ?></span></a><a href="<?php echo uc('uc/like');?>" target="_blank">喜欢<span><?php echo ($u["like_num"]); ?></span></a><a href="<?php echo uc('uc/share');?>" target="_blank">分享<span><?php echo ($u["share_num"]); ?></span></a></div><?php if(MODULE_NAME == 'album' and ACTION_NAME == 'details'): ?><p class="album_intro mt15"><?php echo ($info["remark"]); ?></p><div class="comments mt15"><textarea class="comments_box" id="comments_box" def="你也可以顺便说点什么 O(∩_∩)O"></textarea><div class="clearfix"><input type="button" class="submit comments_btn" pid="<?php echo ($info['album_id']); ?>" id="comments_btn"value="确定"/></div><div class="list_wrap"></div></div><?php endif; ?></div></div><?php if(!empty($items_list)): if(is_array($items_list)): $i = 0; $__LIST__ = $items_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="item mt15 masonry_brick jq_corner" data-corner="7px" iid="<?php echo ($val['id']); ?>"><div class="item_t"><div class="img tc"><a target="_blank" href="<?php echo u('item/index',array('id'=>$val['id']));?>" hidefocus="true" rel="nofollow"><img alt="<?php echo ($val["title"]); ?>" url="<?php echo base64_encode($val['img']);?>" style="display:inline;" class="encode_url"></a><span class="price">￥<?php echo ($val["price"]); ?></span><div class="btns"><a href="javascript:;" class="img_album_btn" iid="<?php echo ($val["id"]); ?>">                        加入专辑
                    </a></div></div><div class="title"><span><?php echo ($val["title"]); ?></span></div></div><div class="item_b clearfix"><div class="items_likes fl"><a href="javascript:;" class="like_btn" iid="<?php echo ($val["id"]); ?>" iurl="<?php echo u('item/index',array('id'=>$val['id']));?>"></a><em class="red bold" id="like_num_<?php echo ($val["id"]); ?>"><?php echo ($val["likes"]); ?></em></div><div class="items_comment fr"><a href="<?php echo u('item/index',array('id'=>$val['id']));?>#items_comments" target="_blank">评论</a><em class="red bold">(<?php echo ($val["comments"]); ?>)</em></div></div><?php if(isset($val['user'])): ?><div class="user clearfix"><div class="clearfix"><div class="avatar"><img src="<?php echo uimg($val['user']['img']);?>" width="30px" height="30px"/></div><div class="user_info"><a href="<?php echo u('uc/index',array('uid'=>$val['user']['id']));?>">来自#<em><?php echo ($val["user"]["name"]); ?></em>#的分享</a><span><?php if($val["remark_status"] == 1): echo ($val["remark"]); endif; ?></span></div></div></div><?php endif; if(isset($val['comments_list'])): ?><div class="comments_list"><?php if(is_array($val['comments_list'])): $i = 0; $__LIST__ = $val['comments_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="clearfix comment_item"><div class="fl"><img src="<?php echo uimg($comment['img']);?>"  width="20px" height="20px" class="uimg fl"/><span class="uname"><?php echo ($comment["name"]); ?></span> :
                        </div><?php echo (mb_substr($comment["info"],0,50,'utf-8')); ?></div><?php endforeach; endif; else: echo "" ;endif; ?></div><?php endif; ?></div><?php endforeach; endif; else: echo "" ;endif; else: ?><div class="home_empty"><span class="des">还没有宝贝哦~</span></div><?php endif; ?></div><?php if($show_sp == 1): ?><div id="more" class="center"><a href="<?php echo u('album/details',array('sp'=>2,'cid'=>$cid,'p'=>$p,'uid'=>$uid,'id'=>$info['album_id']));?>" hidefocus="true"></a></div><?php endif; if($page != ''): ?><div id="page" class="page mt20 clearfix" style="display: none;"><span class="page_num"><?php echo ($page); ?></span></div><?php endif; ?></div></div><div class="footer"><div class="box_shadow clearfix"><div class="footer_top"><div class="f_list"><h4><b>发现热门</b></h4><ul class="l_one"><li><a target="_blank" href="./?m=group">逛宝贝</a></li><li><a target="_blank" href="./?m=cate&a=index&cid=1">找鞋子</a></li><li><a target="_blank" href="./?a=index&m=cate&cid=2">选包包</a></li><li><a target="_blank" href="./?a=index&m=cate&cid=3">搭配饰</a></li><li><a target="_blank" href="./?a=index&m=cate&cid=4">爱美妆</a></li><li><a target="_blank" href="./?a=index&m=cate&cid=5">装家居</a></li></ul></div><div class="f_list"><h4><b>关于我们</b></h4><ul class="l_one"><li><a target="_blank" href="<?php echo u('article/index',array('id'=>1));?>">关于我们</a></li><li><a target="_blank" href="<?php echo u('article/index',array('id'=>3));?>">联系我们</a></li><li><a target="_blank" href="<?php echo u('article/index',array('id'=>2));?>">网站地图</a></li><li><a target="_blank" href="<?php echo u('article/index',array('id'=>4));?>">隐私政策</a></li></ul></div><div class="f_list"><h4><b>合作伙伴</b></h4><ul class="l_one"><li><a target="_blank" href="http://www.pinphp.com" target=_blank>PinPHP</a></li><li><a target="_blank" href="http://www.liqu.com" target=_blank>淘宝返利网</a></li><li><a target="_blank" href="http://www.yifen.com" target=_blank>一分网</a></li><li><a target="_blank" href="http://www.doudou.com" target=_blank>豆豆网</a></li><?php if(is_array($flink_list)): $i = 0; $__LIST__ = $flink_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if(($val["cate_id"] == '2')): ?><li><a target="_blank" href="<?php echo ($val["url"]); ?>" class="f_links fl"><?php echo ($val["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="f_list"><h4><b>友情链接</b>  更多>></h4><ul class="l_two"><?php if(is_array($flink_list)): $i = 0; $__LIST__ = $flink_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if(($val["cate_id"] == '1')): ?><li><a target="_blank" href="<?php echo ($val["url"]); ?>" class="f_links fl"><?php echo ($val["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?></ul></div><div class="f_list"><h4><b>关注我们</b></h4><ul class="l_one"><?php if(($follow_us["weibo_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["weibo_url"]); ?>"><span class="s_sina">&nbsp;&nbsp;</span>新浪微博</a></li><?php endif; if(($follow_us["renren_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["renren_url"]); ?>"><span class="renren">&nbsp;&nbsp;</span>公共主页</a></li><?php endif; if(($follow_us["qqweibo_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["qqweibo_url"]); ?>"><span class="s_tx">&nbsp;&nbsp;</span>腾讯微博</a></li><?php endif; if(($follow_us["qqzone_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["qqzone_url"]); ?>"><span class="s_qzone">&nbsp;&nbsp;</span>QQ空间</a></li><?php endif; if(($follow_us["163_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["163_url"]); ?>"><span class="h_wangyi">&nbsp;&nbsp;</span>网易微博</a></li><?php endif; if(($follow_us["douban_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["douban_url"]); ?>"><span class="s_dbai">&nbsp;&nbsp;</span>豆瓣</a></li><?php endif; ?></ul></div></div><!--友情链接--></present><div class="new_footer tc"><div class="copyright">Copyright &copy;2012 <?php echo ($site_name); ?>. All Rights Reserved. <?php echo ($site_icp); echo ($statistics_code); ?></div></div></div></div><div style="display:none;" id="gotopbtn" class="to_top"></div><script type="text/javascript">$(function(){
	$(window).scroll(function(){
		$(window).scrollTop()>0 ? $("#gotopbtn").css('display','').click(function(){
			$(window).scrollTop(0);
		}) : $("#gotopbtn").css('display','none');
	});
});
</script></body></html>