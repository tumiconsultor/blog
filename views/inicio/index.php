<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<table class="table table-striped table-bordered">
<thead>
    <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Comentarios</th>
    </tr>
</thead>
<?php
$this->title = "Inicio";
foreach($publicaciones as $publicacion){
    ?>
    <tr>
    <td><?=$publicacion["id"]?></td>
    <td><?=$publicacion["titulo"]?></td>
    <td>
    <?=Html::a('<span class="badge">'.$publicacion["total"].'</span>', 
    ["inicio/ver-comentarios","id"=>$publicacion["id"]])?>
    </td>
    </tr>
    <?php
}
?>
</table>
<?=LinkPager::widget(["pagination"=>$paginador ])?>
