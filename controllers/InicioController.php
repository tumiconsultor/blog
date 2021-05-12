<?php

namespace app\controllers;
use Yii;

class InicioController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $publicaciones = Yii::$app
            ->db
            ->createCommand("select p.titulo, id, (select count(id) from comentario where publicacion_id = p.id) as total 
                            from publicacion p
                            where activo = 'SI'")
            ->queryAll();

        return $this->render('index',["publicaciones"=>$publicaciones]);
    }

    public function actionVerComentarios($id){
        
        return $this->render("comentarios");
    }

    public function actionVerAutor(){
        
    }

}
