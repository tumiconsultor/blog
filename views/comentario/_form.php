<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\Publicacion;
use yii\helpers\Arrayhelper;

/* @var $this yii\web\View */
/* @var $model app\models\Comentario */
/* @var $form yii\widgets\ActiveForm */

$estados = array("SI"=>"SI","NO"=>"NO");
echo "<pre>";
print_r($publicaciones);
echo "</pre>";
?>

<div class="comentario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'contenido')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'activo')->dropDownList($estados) ?>

    <?= $form->field($model, 'publicacion_id')->dropDownList( ArrayHelper::map($publicaciones,"id","slug"), ['prompt' => 'Seleccionar...' ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
