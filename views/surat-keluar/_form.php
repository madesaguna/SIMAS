<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\JenisSurat;
use app\models\search\SuratKeluarSearch;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */
/* @var $form yii\widgets\ActiveForm */

$jenis_surat = JenisSurat::getAllJenisSurat();
$items = ArrayHelper::map($jenis_surat, 'id', 'nama_jenis');
?>

<div class="surat-keluar-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $options = [];
    foreach ($jenis_surat as $i) {
        $options[$i->id] = [
            'data-count' => SuratKeluarSearch::count_some() + 1,
            'data-kode' => $i->kode_jenis,
            'data-content' => $i->content_jenis
        ];
    }
    ?>

    <?= $form->field($model, 'id_jenis_surat')->dropDownList($items, [
            'prompt' => 'Pilih Jenis',
            'options' => $options
        ]
    )
    ?>

    <?= $form->field($model, 'no_suratkeluar')->textInput(['readonly' => false]) ?>

    <?= $form->field($model, 'tanggal_surat')->widget(DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'name' => 'tanggal_surat',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ])
    ?>

    <?= $form->field($model, 'perihal_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tujuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'narasi')->widget(TinyMce::className(), [
        'options' => ['rows' => 12],
        'language' => 'id',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ])
    ?>

    <?= $form->field($model, 'uploaded_file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> Save' : '<i class="fa fa-pencil"> </i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-times"></i> Cancel
        </button>
    </div>

    <?php ActiveForm::end(); ?>

</div>