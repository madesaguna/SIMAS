<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'upload_pic')->fileInput() ?>

    <?= $form->field($model, 'user_level')
        ->dropDownList(['Super Admin' => 'Super Admin', 'Admin' => 'Admin',], ['prompt' => '--Pilih--']) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"> </i> Save', [
            'class' => 'btn btn-success'
        ]) ?>
        <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-times"></i> Cancel
        </button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
