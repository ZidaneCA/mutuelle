<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Epargne */

$this->title = ' Epargner';
$this->params['breadcrumbs'][] = ['label' => 'Epargnes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
	<div class="epargne-create">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
