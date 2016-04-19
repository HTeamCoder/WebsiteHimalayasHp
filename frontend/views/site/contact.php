<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Thông tin liên hệ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="men">
    <div class="container">
      <div class="register">
        <div class="contact_box">
          <div class="col-md-8 contact-top">
            <h1>
              Thông tin liên hệ
            </h1>
            <div class="contact_grid">
              <form method="post" action="contact-post.html">
                    <div class="to">
                        <input type="text" class="text" value="Họ tên" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Họ tên';}">
                        <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" style="margin-left:20px">
                        <input type="text" class="text" value="Tiêu đề" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tiêu đề';}" style="margin-left:20px">
                    </div>
                    <div class="text">
                       <textarea value="Nội dung:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nội dung';}">Nội dung:</textarea>
                    </div>
                    <div class="form-submit">
                      <input type="submit" value="Gửi">
                    </div>
                    <div class="clearfix"></div>
               </form>
           </div>
       </div>
       <div class="col-md-4 contact-top_right">
        <h2>
          Thông tin cửa hàng
        </h2>
        <ul class="list">
            <li>Điện thoại:+84936833848</li>
            <li>Giờ mở cửa :9h:00 - 21h:30 </li>
            <li>Email:<a href="mailto:info@example.com"> admin@himalayashp.com</a></li>
            <li>Địa chỉ : 137 Điện Biên Phủ - Minh Khai - Hồng Bàng - Hải Phòng</li>
        </ul>
       </div>
       <div class="clearfix"> </div>
      </div>
         <div class="map">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.260546620779!2d106.6780743143257!3d20.861545998842907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7af4475d06e7%3A0xae41f33624a12cc8!2zMTM3IMSQaeG7h24gQmnDqm4gUGjhu6csIE1pbmggS2hhaSwgSOG7k25nIELDoG5nLCBI4bqjaSBQaMOybmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1460272560090" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
         </div>
      </div>
    </div>
</div>