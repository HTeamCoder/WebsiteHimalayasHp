<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use sjaakp\taggable\TagEditor;
/* @var $this yii\web\View */
/* @var $model common\models\hanghoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hanghoa-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'tenhang')->textInput(['maxlength' => true,'placeholder'=>'Nhập tên hàng hóa'])->label('Tên hàng hóa'. Html::tag('span', ' *',['class'=>'text-danger']))  ?>

    <?= $form->field($model, 'tinhtrang')->dropDownList([ 'conhang' => 'Còn hàng', 'hethang' => 'Hết hàng', ], ['prompt' => 'Tình trạng hàng hóa'])->label('Tình trạng'. Html::tag('span', ' *',['class'=>'text-danger']))  ?>

    <?= $form->field($model, 'anh')->widget(FileInput::classname())->label('Ảnh đại diện'. Html::tag('span', ' *',['class'=>'text-danger'])) ;?>

    <?=
    (isset($model->anhdaidien)&&file_exists($model->anhdaidien))?Html::img(\Yii::$app->request->BaseUrl.'/'.$model->anhdaidien, ['width'=>'150','height'=>'150','style'=>'margin:0 5px;']):'';
    ?>

    <?= $form->field($model, 'giaban')->textInput(['placeholder'=>'Nhập giá bán của hàng hóa']) ?>

    <?= $form->field($model, 'giacanhtranh')->textInput(['placeholder'=>'Nhập giá cạnh tranh của hàng hóa']) ?>

    <?= $form->field($model, 'soluong')->textInput(['placeholder'=>'Nhập số lượng của hàng hóa']) ?>

    <?= $form->field($hinhanh, 'file[]')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*','multiple' => true],
    ]);?>
    <?=
    (isset($path))?Html::tag('div',$path,['id'=>'list-image']):'';
    ?>
    <?=
    $form->field($model, 'tomtat')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'standard',
            'inline' => false,
        ],
    ])->label('Tóm tắt'. Html::tag('span', ' *',['class'=>'text-danger'])) ;
    ?>
    <?=
    $form->field($model, 'mota')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
            'clientOptions' => [
                'filebrowserUploadUrl' => 'ckeditor/url'
            ],
        ],
    ]);
    ?>

    <?= $form->field($model, 'loaihang_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\loaihang::find()->all(),'id','tenloai'),['prompt'=>'Chọn loại hàng'])->label('Loại hàng'. Html::tag('span', ' *',['class'=>'text-danger']))  ?>

    <?= $form->field($model, 'mahang')->textInput(['maxlength' => true,'placeholder'=>'Nhập mã hàng'])->label('Mã hàng'. Html::tag('span', ' *',['class'=>'text-danger']))  ?>

    <?= $form->field($model, 'thuonghieu_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\thuonghieu::find()->all(),'id','ten'),['prompt'=>'Chọn thương hiệu'])->label('Thương hiệu'. Html::tag('span', ' *',['class'=>'text-danger']))  ?>

    <?= $form->field($model, 'nhacungcap_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\nhacungcap::find()->all(),'id','tennhacungcap'),['prompt'=>'Chọn nhà cung cấp'])->label('Nhà cung cấp'. Html::tag('span', ' *',['class'=>'text-danger']))  ?>

    <?= $form->field($tukhoa, 'tukhoa')->widget(TagEditor::className(), [
        'tagEditorOptions' => [
            'autocomplete' => [
                'source' => Url::toRoute(['hanghoa/suggest'])
            ],
        ]
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Thêm mới') : Yii::t('app', 'Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
