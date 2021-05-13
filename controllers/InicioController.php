<?php

namespace app\controllers;
use yii\data\SqlDataProvider;
use yii\data\Pagination;
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
        
        $comentarios = Yii::$app
                ->db
                ->createCommand("select * from comentario where publicacion_id = $id")
                ->queryAll();
        
        
        return $this->render("comentarios",["comentarios"=>$comentarios]);
    }

    public function actionVerAutor(){
        //aqui va otro metodo
    }

    public function actionVer()
    {
        $total = Yii::$app
                    ->db
                    ->createCommand("select count(p.id)
                                    from publicacion p
                                    where activo = 'SI'" )
                    ->queryScalar();

        $paginador = new Pagination(["totalCount"=> $total, "pageSize"=>3,]);
        
            

        $provider = new SqlDataProvider([
            "sql" =>"select p.titulo, id, (select count(id) from comentario where publicacion_id = p.id) as total 
                        from publicacion p
                        where activo = 'SI'",
            "totalCount" => $total,
            "pagination" => ["pageSize"=>3]
        ]);

        
        return $this->render("index", ["publicaciones"=> $provider->getModels(), "paginador"=> $paginador]);
    }

}
