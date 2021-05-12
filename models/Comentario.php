<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property int $id
 * @property string|null $contenido
 * @property string|null $activo
 * @property int $publicacion_id
 *
 * @property Publicacion $publicacion
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'publicacion_id'], 'required'],
            [['id', 'publicacion_id'], 'integer'],
            [['contenido'], 'string'],
            [['activo'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['publicacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publicacion::className(), 'targetAttribute' => ['publicacion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contenido' => 'Contenido',
            'activo' => 'Activo',
            'publicacion_id' => 'Publicacion ID',
        ];
    }

    /**
     * Gets query for [[Publicacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublicacion()
    {
        return $this->hasOne(Publicacion::className(), ['id' => 'publicacion_id']);
    }
}
