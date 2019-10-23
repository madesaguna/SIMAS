<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = $model->username;
$this->params['title'] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
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
                    <div class="admin-view">
                        <p>
                            <?= Html::a('<i class="fa fa-pencil"> </i> Update', ['update', 'id' => $model->id_user], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fa fa-trash"> </i> Delete', ['delete', 'id' => $model->id_user], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id_user',
                                'username',
                                //'password',
                                'nama_lengkap',
                                'email:email',
                                //'authKey',
                                //'accessToken',
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
