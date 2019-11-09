<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Membre */

$this->title = 'Ajouter un Membre';
$this->params['breadcrumbs'][] = ['label' => 'Membres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
	<div class="membre-create">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
