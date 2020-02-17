<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        SIMAS
        adalah sebuah sistem informasi yang digunakan untuk membantu dalam mengarsipkan surat. <br>
        Sistem ini pertama kali dikembangkan oleh Ibrahim kemudian dilakukan <i>fork</i> untuk memenuhi kebutuhan di instansi tempat developer bekerja
    </p>
    <p>
        Anda dapat melihat versi asli dari aplikasi ini di laman : <a href="https://github.com/kangbaim/SIMAS" title="Sistem Informasi Manajemen Surat">https://github.com/kangbaim/SIMAS</a>.
    </p>
</div>
