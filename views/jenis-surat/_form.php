<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\JenisSurat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-surat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'kode_jenis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jenis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_jenis')->textarea() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> Save' : '<i class="fa fa-pencil"> </i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-times"></i> Cancel</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
