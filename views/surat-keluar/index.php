<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Keluar';
$this->params['title'] = $this->title;
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
                    <div class="surat-keluar-index">
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <p>
                            <?= Html::a('<i class="fa fa-plus"> </i> Tambah Surat Keluar', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                        <?php
                        // echo $this->render('_search', ['model' => $searchModel]);
                        $gridColumns = [
                            'no_suratkeluar',
                            'tanggal_surat',
                            'tujuan',
                            'narasi:ntext',
                            //'id_jenis_surat',
                        ];
                        echo ExportMenu::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => $gridColumns,
                        ]);
                        ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'no_suratkeluar',
                                'tanggal_surat',
                                'tujuan',
                                'narasi:ntext',
                                //'id_jenis_surat',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>