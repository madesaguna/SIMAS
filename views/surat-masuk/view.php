<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\widget\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = 'No Surat Masuk : ' . $model->no_suratmasuk;
$this->params['title'] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= Html::encode($this->title) ?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="surat-masuk-view">
                        <p>
                            <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fa fa-trash-o"></i> Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                            'model' => $model,
                            'formatter' => [
                                'class' => '\yii\i18n\Formatter',
                                'dateFormat' => 'php:j F Y',
                            ],
                            'attributes' => [
                                //'id_suratmasuk',
                                'no_suratmasuk',
                                //'no_urut',
                                'pengirim',
                                [
                                    'attribute' => 'tanggal_surat',
                                    'format' => 'date',//|php:d M Y',
                                ],
                                'perihal_surat',
                                'narasi',
                                'upload_berkas',
                                //'id_jenis_surat',
                            ],
                        ]) ?>

                        <?php if($model->suratMasukUrl !== null) : ?>
                        <?= Html::button('<i class="fa fa-eye"></i> Show Berkas', ['class' => 'btn btn-success btn-rounded', 'id' => 'modalButton']) ?>

                        <?php
                        Modal::begin([
                            'header' => '<h4>File Surat Masuk</h4>',
                            'id' => 'modal',
                            'size' => 'modal-lg',
                        ]);
                        ?>

                        <p id="modalContent">
                            <embed width="100%" height="600px"
                                   src="<?= $model->suratMasukUrl ?>"
                                   type="application/pdf" />
                        </p>
                        <?php Modal::end() ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

