<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formulario".
 *
 * @property int $id
 * @property string $nombre_completo
 * @property string $email
 * @property string $celular
 * @property string $date
 * @property string $ktoken
 * @property string $plan
 */
class Formulario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formulario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_completo', 'email', 'celular', 'date', 'ktoken', 'plan'], 'required'],
            [['date'], 'safe'],
            [['plan'], 'string'],
            [['nombre_completo', 'email', 'celular', 'ktoken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_completo' => 'Nombre Completo',
            'email' => 'Email',
            'celular' => 'Celular',
            'date' => 'Date',
            'ktoken' => 'Ktoken',
            'plan' => 'Plan',
        ];
    }
}
