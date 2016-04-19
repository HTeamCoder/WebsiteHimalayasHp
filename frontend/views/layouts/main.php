<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\web\Controller;
use common\models\loaihang;
$asset = AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<div class="header_top">
  <div class="container">
  	<div class="header_top-box">
			 <div class="cssmenu">
				<ul>
					<li><a href="<?= Url::to(['site/contact']);?>">Liên hệ</a></li>
					<li><a href="<?= Url::to(['cart/checkorder']);?>">Kiểm tra đơn hàng</a></li> 
				</ul>
			</div>
			<div class="clearfix"></div>
   </div>
</div>
</div>
<div class="header_bottom">
	<div class="container">
	 <div class="header_bottom-box">
		<div class="header_bottom_left">
			<div class="logo">
				<a href="<?= Url::to(['site/index']);?>" title="HIMALAYAHP">HIMALAYAHP</a>
			</div>
			
			<div class="clearfix"> </div>
		</div>
		<div class="header_bottom_right">
			<div class="search">
			 	<form action="<?= Url::to(['hanghoa/timkiem'])?>" method="post">
			 		 <input type="text" value="Tìm kiếm sản phẩm....." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm sản phẩm.....';}" name="product">
			  		<input type="submit" value="">
			 	</form>
	  		</div>
	  		<ul class="bag">
	  		<?php $itemsInCart = Yii::$app->cart->getCount();?>
	  			<a href="<?= Url::to(['cart/list'])?>" title="Giỏ hàng của bạn"><i class="bag_left"></i></a>
	  			<a href="<?= Url::to(['cart/list'])?>"><li class="bag_right"><p><?=($itemsInCart) ? $itemsInCart : 0 ?> SP</p></li></a>
	  			<div class="clearfix"> </div>
	  		</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
</div>
<div class="menu">
	<div class="container">
		<div class="menu_box">
	     <ul class="megamenu skyblue">
			<li class="active grid"><a class="color2" href="<?= Url::to(['site/index']);?>">Trang chủ</a></li>
			<?php
				$loaihang = new loaihang();
				$danhsachloaihangs = $loaihang->find()->where(['nhomloaihang'=>null])->all();
				if($danhsachloaihangs)
				foreach ($danhsachloaihangs as $danhsachloaihang) {
					echo '<li><a class="color4" href="'.Url::to(['hanghoa/danhmuc','id'=>$danhsachloaihang->id]).'">'.$danhsachloaihang['tenloai'].'</a>';
					if ($loaihang->menuLoaihang($danhsachloaihang['id']))
					{
						echo'<div class="megapanel">
								<div class="row">
									<div class="col1">
										<div class="h_nav">
											<ul>';
						echo $loaihang->menuLoaihang($danhsachloaihang['id']);
						echo '				</ul>	
										</div>							
									</div>
							 	 </div>
								</div>';
							
					}
					echo '</li>';
				}
			?>
			<div class="clearfix"> </div>
		 </ul>
	  </div>
</div>
</div>
<?= $content;?>
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6" style="margin-bottom: 15px;">
				<img src="<?= $baseUrl;?>/images/pay.png" class="img-responsive" alt="" style='margin-bottom: 10px;'>
				<p class="copy">Địa chỉ liên hệ : 137 Điện Biên Phủ - Minh Khai - Hồng Bàng - Hải Phòng</p><p class="copy">Điện thoại : 0936833848</p></br>
				<p class="copy">Copyright&copy; 2015 Template by <a href="http://himalayashp.com" target="_blank"> H-TEAM</a> - Develop by H-TEAM</p>
			</div>
			<div class="col-md-6">
				<div class="fb-page" data-href="https://www.facebook.com/Himalayas-Haiphong-1513268798990713/?fref=ts" data-width="400" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
			</div>
		</div>
	</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: false,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
 <script type="text/javascript">
 $(window).load(function() {
	$("#flexiselDemo3").flexisel({
		visibleItems: 6,
		animationSpeed: 1000,
		autoPlay:true,
		autoPlaySpeed: 3000,    		
		pauseOnHover: true,
		enableResponsiveBreakpoints: true,
		responsiveBreakpoints: { 
			portrait: { 
				changePoint:480,
				visibleItems: 1
			}, 
			landscape: { 
				changePoint:640,
				visibleItems: 2
			},
			tablet: { 
				changePoint:768,
				visibleItems: 3
			}
		}
	});
	
});
</script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 250,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1593365594269542";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>