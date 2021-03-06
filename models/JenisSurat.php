<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_surat".
 *
 * @property integer $id
 * @property string $kode_jenis
 * @property string $nama_jenis
 * @property string $content_jenis
 */
class JenisSurat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_surat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_jenis'], 'string'],
            [['nama_jenis'], 'string', 'max' => 30],
            [['nama_jenis', 'content_jenis'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_surat' => 'Id Jenis Surat',
            'kode_jenis' => 'Kode Jenis',
            'nama_jenis' => 'Nama Jenis',
            'content_jenis' => 'Content Jenis',
        ];
    }

    public static function getAllJenisSurat()
    {
        return static::find()->all();
    }
}
