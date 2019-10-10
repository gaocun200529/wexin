<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>购物车</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
<link rel="stylesheet" href="lib/weui.min.css">
<link rel="stylesheet" href="css/jquery-weui.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body ontouchstart>
<!--主体-->
<header class="wy-header">
  <div class="wy-header-icon-back"><span></span></div>
  <div class="wy-header-title">购物车
  </div>
</header>
<div class="weui-content">
  <div class="weui-panel weui-panel_access">
    <div class="weui-panel__hd"><span>江苏蓝之蓝旗舰店</span></div>
    @foreach($res as $v)
    <div class="weui-panel__bd">
      <div class="weui-media-box_appmsg pd-10">
        <div class="weui-media-box__hd check-w weui-cells_checkbox">
          <label class="weui-check__label">
            <div class="weui-cell__hd cat-check
            0.">
                <tr>
                <input type="checkbox" class="weui-check box" name="cartpro" ><i class="weui-icon-checked"></i>
                </tr>
            </div>
          </label>
        </div>
        <div class="weui-media-box__hd"><a href="pro_info.html"><img class="weui-media-box__thumb" src="{{ $v->goods_img }}" alt=""></a></div>
        <div class="weui-media-box__bd">
          <h1 class="weui-media-box__desc"><a href="pro_info.html" class="ord-pro-link">{{ $v->goods_name }}</a></h1>
          <p class="weui-media-box__desc">规格：<span>红色</span>，<span>23</span></p>

          <div class="clear mg-t-10">
            <div class="wy-pro-pri fl">¥<em class="num font-15">{{ $v->add_price }}</em></div>
            <div class="pro-amount fr"><div class="Spinner"></div></div>
          </div>
          <!--


           -->
           <button class="wy-dele"   cart_id={{$v->cart_id}}>删除</button>
           <!--


            -->
        </div>
      </div>
      @endforeach
    </div>
  </div>
<!--底部导航-->
<div class="foot-black"></div>
<div class="weui-tabbar wy-foot-menu">

  <div class="npd cart-foot-check-item weui-cells_checkbox allselect">
    <label class="weui-cell allsec-well weui-check__label" for="all">
        <div class="weui-cell__hd">
          <input type="checkbox" class="weui-check" name="all-sec" id="all">
          <i class="weui-icon-checked"></i>
        </div>
        <div class="weui-cell__bd allbox">
          <p class="font-14">全选</p>

        </div>
    </label>
  </div>
  <div class="weui-tabbar__item  npd">
    <p class="cart-total-txt"  calss="total">合计：{{ $price }}</p>
  </div>
  <a href="{{ url('orderinfo') }}" class="red-color npd w-90 t-c">
   <p class="promotion-foot-menu-label">去结算</p>
  </a>
</div>

<script src="lib/jquery-2.1.4.js"></script>
<script src="lib/fastclick.js"></script>
<script type="text/javascript" src="js/jquery.Spinner.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
<script type="text/javascript">
$(function(){
	$(".Spinner").Spinner({value:1, len:3, max:999});
});
</script>
<script src="js/jquery-weui.js"></script>
<!---全选按钮-->

<script type="text/javascript">
$(document).ready(function () {
	$(".allselect").click(function () {
		if($(this).find("input[name=all-sec]").prop("checked")){
			$("input[name=cartpro]").each(function () {
				$(this).prop("checked", true);
			});
		}else{
			$("input[name=cartpro]").each(function () {
				if ($(this).prop("checked")) {
					$(this).prop("checked", false);
				} else {
					$(this).prop("checked", true);
				}
			});
   		}
	});

});
</script>
<script>
      $(document).on("click", ".wy-dele", function() {
          var cart_id=$(this).attr('cart_id');
          $.post(
              "/delete",
              {cart_id:cart_id},
              function(res){
                if (res.msg==1) {
                  alert("删除成功");

                }else{
                  alert(res.fond);
                }
              }

            ,'json');

          $(this).parent().parent().remove();

      });




    </script>

</body>
</html>
