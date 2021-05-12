<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publicacion".
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $contenido
 * @property string|null $activo
 * @property string|null $slug
 * @property string|null $fecha_publicacion
 *
 * @property Comentario[] $comentarios
 */
class Publicacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publicacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['contenido'], 'string'],
            [['fecha_publicacion'], 'safe'],
            [['titulo', 'slug'], 'string', 'max' => 45],
            [['activo'], 'string', 'max' => 2],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'contenido' => 'Contenido',
            'activo' => 'Activo',
            'slug' => 'Slug',
            'fecha_publicacion' => 'Fecha Publicacion',
        ];
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['publicacion_id' => 'id']);
    }
}
