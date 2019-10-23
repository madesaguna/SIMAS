<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title = 'Surat Keluar # ' . $model->no_suratkeluar;
$this->params['title'] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Surat Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Detail Surat # <?= $model->no_suratkeluar ?></h5>
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
                    <div class="surat-keluar-view">
                        <p>
                            <?= Html::a('<i class="fa fa-pencil"> </i> Update', ['surat-keluar/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fa fa-trash"> </i> Delete', ['surat-keluar/delete', 'id' => $model->id], [
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
                                'no_suratkeluar',
                                [
                                    'attribute' => 'tanggal_surat',
                                    'format' => 'date',
                                ],
                                'tujuan',
                                'narasi:html',
                                [
                                    'attribute' => 'jenisSurat.nama_jenis',
                                    'label' => 'Jenis Surat',
                                ],
                            ],
                        ]) ?>

                        <?php if($model->suratKeluarUrl !== null) : ?>
                            <?= Html::button('<i class="fa fa-eye"></i> Show Berkas', ['class' => 'btn btn-success btn-rounded', 'id' => 'modalButton']) ?>

                            <?php
                            Modal::begin([
                                'header' => '<h4>File Surat Keluar</h4>',
                                'id' => 'modal',
                                'size' => 'modal-lg',
                            ]);
                            ?>

                            <p id="modalContent">
                                <embed width="100%" height="600px"
                                       src="<?= $model->suratKeluarUrl ?>"
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
