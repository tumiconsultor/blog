<h3>
comentarios
</h3>
<?php
foreach($comentarios as $comentario){
    echo $comentario["id"]."-".$comentario["contenido"]."<br>";
}