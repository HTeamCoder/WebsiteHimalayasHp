<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use common\widgets\Alert;
/* @var $this yii\web\View */

$this->title = 'Himalaya Hải Phòng';
$asset = AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<div class="index_slider">
	<div class="container">
	  <div class="callbacks_container">
  	<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:1110px;margin:0px auto 0px;">
        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
            <ul class="amazingslider-slides" style="display:none;">
            	<?php
	      		if($slide->hinhanhslides != null)
	      		foreach ($slide->hinhanhslides as $slideanh){
	      			 echo '<li><a href="'.Url::to(['slide/detail','id'=>$slide->id]).'"><img src="'.Yii::$app->urlManagerFrontend->baseUrl.'/'.$slideanh->path.'" alt="'.$slide->tieude.'"  title="'.$slide->tieude.'" /></a>
                			</li>';
	      		}
	      		?>
            </ul>
        </div>
    </div>
	      </br>
	      <?= Alert::widget() ?>
	  </div>
	</div> 
</div>
<div class="content_top">
	<div class="container">
		<div class="grid_1">
			<div class="col-md-3">
			 <div class="box2">
			 	<ul class="list1">
			 		<i class="lock"> </i>
			 		<li class="list1_right"><p>Mua sắm hiệu quả - tiện lợi - dễ dàng</p></li>
			 		<div class="clearfix"> </div>
			 	</ul>
			 </div>
			</div>
			<div class="col-md-3">
			 <div class="box3">
			 	<ul class="list1">
			 		<i class="clock1"> </i>
			 		<li class="list1_right"><p>Giao hàng nhanh trong vòng 24h</p></li>
			 		<div class="clearfix"> </div>
			 	</ul>
			 </div>
			</div>
			<div class="col-md-3">
			 <div class="box4">
			 	<ul class="list1">
			 		<i class="vehicle"> </i>
			 		<li class="list1_right"><p>Miễn phí vận chuyển trong bán kính 15km</p></li>
			 		<div class="clearfix"> </div>
			 	</ul>
			 </div>
			</div>
			<div class="col-md-3">
			 <div class="box5">
			 	<ul class="list1">
			 		<i class="dollar"> </i>
			 		<li class="list1_right"><p>Giá cả hợp lý ,tiết kiệm chi tiêu</p></li>
			 		<div class="clearfix"> </div>
			 	</ul>
			 </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="sellers_grid">
			<ul class="sellers">
				<i class="star"> </i>
				<li class="sellers_desc"><h2>Sản phẩm mới</h2></li>
				<div class="clearfix"> </div>
			</ul>
		</div>
		<div class="grid_2">
		<?php
			if ($hanghoamois)
			{
				foreach ($hanghoamois as $hanghoamoi) {
					echo '
							<div class="col-md-3 span_6 col-sm-6">
							  <div class="box_inner">
								<img src="'.Yii::$app->urlManagerFrontend->baseUrl.'/'.$hanghoamoi->anhdaidien.'" class="img-responsive" alt=""/>
								 <div class="sale-box"> </div>
								 <div class="desc">
								 	<h3>'.ucfirst(mb_strtolower($hanghoamoi->tenhang,'UTF-8')).'</h3>';
						echo		 	($hanghoamoi->giaban != 0)?'<h4>'.number_format($hanghoamoi->giaban, 0, '','.').' VND'.'</h4>':'<h4>Liên hệ</h4>';
						echo		 	'<ul class="list2">
								 	  <li class="list2_left"><span class="m_1"><a href="'.Url::to(['cart/add', 'id' => $hanghoamoi->id]).'" class="link">Đặt Mua</a></span></li>
								 	  <li class="list2_right"><span class="m_2"><a href="'.Url::to(['hanghoa/detail','id'=>$hanghoamoi->id]).'" class="link1">Chi Tiết</a></span></li>
								 	  <div class="clearfix"> </div>
								 	</ul>
								 </div>
							   </div>
							</div>
						';
				}
			}
		?>	
		<div class="clearfix"> </div>
		</div>
		<div class="sellers_grid">
			<ul class="sellers">
				<i class="star"> </i>
				<li class="sellers_desc"><h2>Sản phẩm nổi bật</h2></li>
				<div class="clearfix"> </div>
			</ul>
		</div>
		<div class="grid_2">
			<?php
				if ($hanghoanoibats)
				{
					foreach ($hanghoanoibats as $hanghoanoibat) {
						echo '
							<div class="col-md-3 span_6 col-sm-6">
							  <div class="box_inner">
								<img src="'.Yii::$app->urlManagerFrontend->baseUrl.'/'.$hanghoanoibat->anhdaidien.'" class="img-responsive" alt=""/>
								 <div class="sale-box"> </div>
								 <div class="desc">
								 	<h3>'.ucfirst(mb_strtolower($hanghoanoibat->tenhang,'UTF-8')).'</h3>';
						echo		 	($hanghoanoibat->giaban != 0)?'<h4>'.number_format($hanghoanoibat->giaban, 0, '','.').' VND'.'</h4>':'<h4>Liên hệ</h4>';
						echo		 	'<ul class="list2">
								 	  <li class="list2_left"><span class="m_1"><a href="'.Url::to(['cart/add', 'id' => $hanghoanoibat->id]).'" class="link">Đặt Mua</a></span></li>
								 	  <li class="list2_right"><span class="m_2"><a href="'.Url::to(['hanghoa/detail','id'=>$hanghoanoibat->id]).'" class="link1">Chi Tiết</a></span></li>
								 	  <div class="clearfix"> </div>
								 	</ul>
								 </div>
							   </div>
							</div>
						';
					}
				}
			?>
			<div class="clearfix"> </div>
		</div>
		<div class="sellers_grid">
			<ul class="sellers">
				<i class="star"> </i>
				<li class="sellers_desc"><h2>Sản phẩm bán chạy</h2></li>
				<div class="clearfix"> </div>
			</ul>
		</div>
		<div class="grid_2">
			<?php
				if ($hanghoabanchays)
				{
					foreach ($hanghoabanchays as $hanghoabanchay) {
						echo '
							<div class="col-md-3 span_6 col-sm-6">
							  <div class="box_inner">
								<img src="'.Yii::$app->urlManagerFrontend->baseUrl.'/'.$hanghoabanchay->anhdaidien.'" class="img-responsive" alt=""/>
								 <div class="sale-box"> </div>
								 <div class="desc">
								 	<h3>'.ucfirst(mb_strtolower($hanghoabanchay->tenhang,'UTF-8')).'</h3>';
						echo		 	($hanghoabanchay->giaban != 0)?'<h4>'.number_format($hanghoabanchay->giaban, 0, '','.').' VND'.'</h4>':'<h4>Liên hệ</h4>';
						echo		 	'<ul class="list2">
								 	  <li class="list2_left"><span class="m_1"><a href="'.Url::to(['cart/add', 'id' => $hanghoabanchay->id]).'" class="link">Đặt Mua</a></span></li>
								 	  <li class="list2_right"><span class="m_2"><a href="'.Url::to(['hanghoa/detail','id'=>$hanghoabanchay->id]).'" class="link1">Chi Tiết</a></span></li>
								 	  <div class="clearfix"> </div>
								 	</ul>
								 </div>
							   </div>
							</div>
						';
					}
				}
			?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="content_middle">
	<div class="container">
		<ul class="promote">
			<i class="promote_icon"> </i>
			<li class="promote_head"><h3>Sản phẩm được đề xuất</h3></li>
		</ul>
		 <ul id="flexiselDemo3">

		<?php
				if ($hanghoadexuats)
				{
					foreach ($hanghoadexuats as $hanghoadexuat) {
						echo '<li><img src="'.Yii::$app->urlManagerFrontend->baseUrl.'/'.$hanghoadexuat->anhdaidien.'"  class="img-responsive" /><div class="grid-flex"><h4>'.ucfirst(mb_strtolower($hanghoadexuat->tenhang,'UTF-8')).'</h4>';
						echo 	($hanghoadexuat->giaban != 0)?'<p>'.number_format($hanghoadexuat->giaban, 0, '','.').' VND'.'</p>':'<p>Liên hệ</p>';
						echo'
							<div class="m_3"><a href="'.Url::to(['cart/add', 'id' => $hanghoadexuat->id]).'" class="link2">Đặt Mua</a></div>
							<div class="ticket"> </div>
						</div></li>';
					}
				}
			?>
			
	     </ul>
	</div>
</div>
</div>
