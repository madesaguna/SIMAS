<?php

use yii\helpers\Html;

$user = Yii::$app->user->identity;
$this->title = $user->username;
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <?= Html::img($user->profileUrl, [
                            'alt' => 'image',
                            'class' => 'img-circle',
                            'width' => 80,
                            'height' => 80
                        ]) ?>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold"><?= $user->first_name ?> <?= $user->last_name ?></strong>
                                </span>
                                <span class="text-muted text-xs block"><?= $user->email ?><b class="caret"></b></span>
                            </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <?= Html::a('<div class="btn btn-link logout"><i class="fa fa-user"></i> Profile</div>', ['user/view', 'id' => $user->id]) ?>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <?=
                            Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/site/login']]
                            ) : (
                                ''
                                . Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-sign-out'></i> Log out",
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm()
                                . ''
                            )
                            ?>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <?= Html::a('<i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span>', ['site/index']) ?>
            </li>
            <li>
                <?= Html::a('<i class="fa fa-file-text-o"></i> <span class="nav-label">Manajemen Jenis Surat</span>', ['jenis-surat/index']) ?>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-file-text"></i> <span class="nav-label">Manajemen Surat</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><?= Html::a('<i class="fa fa-circle-thin"></i> Surat Keluar', ['surat-keluar/index']) ?></li>
                    <li><?= Html::a('<i class="fa fa-circle-thin"></i> Surat Masuk</a>', ['surat-masuk/index']) ?></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Laporan Arsip</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><?= Html::a('<i class="fa fa-circle-thin"></i> Surat Keluar', '#') ?></li>
                    <li><?= Html::a('<i class="fa fa-circle-thin"></i> Surat Masuk</a>', ['laporan-surat-masuk/index']) ?></li>
                </ul>
            </li>
            <li><?= Html::a('<i class="fa fa-users"></i> <span class="nav-label">Manajemen Pengguna</span>', ['user/index']) ?></li>
            <li><?= Html::a('<i class="fa fa-cogs"></i> <span class="nav-label">Manajemen Instansi</span>', ['instansi/index']) ?></li>
            <li><?= Html::a('<i class="fa fa-file-excel-o"></i> <span class="nav-label">Export Data to Excel</span>', ['site/exportfilesuratmasukall']) ?></li>
        </ul>

    </div>
</nav>
