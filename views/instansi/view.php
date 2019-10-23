<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Instansi */

$this->title = 'Manajemen Instansi';
$this->params['title'] = $this->title;
$this->params['breadcrumbs'][] = 'Instansi'
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
                    <div class="instansi-view">

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'nama_instansi',
                                'alamat:ntext',
                                'website:url',
                                'nama_yayasan',
                                'kepala_instansi',
                                'idkepala',
                                'email_instansi:email',
                            ],
                        ]) ?>
                        <br>

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <tbody>
                            <tr>
                                <th>Logo</th>
                                <th>Kop Surat</th>
                            </tr>
                            <tr>
                                <td>
                                    <?= Html::img($model->logoImageUrl, ['class' => 'feed-photo', 'alt' => 'Logo Instansi']) ?>
                                </td>
                                <td>
                                    <?= Html::img($model->kopImageUrl, ['class' => 'feed-photo', 'alt' => 'Kop Surat']) ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        <?= Html::a('<i class="fa fa-pencil"></i>  Update', ['update'], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>