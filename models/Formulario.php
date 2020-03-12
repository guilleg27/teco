<?php

namespace app\models;

use Yii;
use IP2Location;

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
            [['nombre_completo', 'email', 'celular', 'ktoken', 'pais', 'ciudad', 'carrier', 'pubId', 'providerId'], 'string', 'max' => 255],
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
            'date' => 'Fecha',
            'ktoken' => 'Ktoken',
            'plan' => 'Plan',
            'pais' => 'pais',
            'ciudad' => 'ciudad',
            'carrier' => 'carrier',
            'pubId' => 'Pub ID',
            'providerId' => 'Provider ID',
        ];
    }

    public function setIp2Location(){
        $ip = Yii::$app->request->userIP;
        $db = new \IP2Location\Database('../data/ip2location.BIN', \IP2Location\Database::FILE_IO);
        $records = $db->lookup($ip, \IP2Location\Database::ALL);
        $this->pais = $records['countryName'];
        $this->ciudad = $records['cityName'];
        $this->carrier = $records['mobileCarrierName'] == '-' ? 'WiFi' : $records['mobileCarrierName'];
    }
}
