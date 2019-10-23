<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "instansi".
 *
 * @property int $id
 * @property string $nama_instansi
 * @property string $alamat
 * @property string $website
 * @property string $nama_yayasan
 * @property string $kepala_instansi
 * @property string $idkepala
 * @property string $email_instansi
 * @property string $logo
 * @property string $kopsurat
 */
class Instansi extends \yii\db\ActiveRecord
{

    public $upload_logo;
    public $upload_kopsurat;
    private $instansiAssetsRoot;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->instansiAssetsRoot = Yii::getAlias('@instansiroot');
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instansi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_instansi', 'alamat', 'website', 'nama_yayasan', 'kepala_instansi', 'idkepala', 'email_instansi'], 'required'],
            [['alamat'], 'string'],
            [['nama_instansi', 'nama_yayasan', 'logo', 'kopsurat'], 'string', 'max' => 100],
            [['website', 'kepala_instansi', 'idkepala'], 'string', 'max' => 30],
            [['email_instansi'], 'string', 'max' => 50],
            [['email_instansi'], 'email'],
            [['website'], 'url'],
            [
                ['upload_logo', 'upload_kopsurat'],
                'image',
                //'mimeTypes' => 'image/*',
                'extensions' => ['png', 'jpg', 'gif', 'jpeg'],
                //'maxWidth' => 300,
                //'maxHeight' => 200,
                'maxSize' => 7 * 1024 * 1024,
                'skipOnEmpty' => true,
                //'notImage' => 'Not Image',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'nama_instansi' => 'Nama Instansi',
            'alamat' => 'Alamat',
            'website' => 'Website',
            'nama_yayasan' => 'Nama Yayasan',
            'kepala_instansi' => 'Kepala Instansi',
            'idkepala' => 'Idkepala',
            'email_instansi' => 'Email Instansi',
            'logo' => 'Logo',
            'kopsurat' => 'Kopsurat',
        ];
    }

    public function beforeValidate()
    {
        /* assign files to model */
        $this->upload_logo = UploadedFile::getInstance($this, 'upload_logo');
        $this->upload_kopsurat = UploadedFile::getInstance($this, 'upload_kopsurat');

        // check is uploaded
        if (!empty($this->upload_kopsurat)) {
            $filename = $this->generateFileName('kop_surat');
            $this->kopsurat = $filename;
        }

        if (!empty($this->upload_logo)) {
            $filename = $this->generateFileName('logo');
            $this->logo = $filename;
        }
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        // check is directory or create one if not exist
        is_dir($this->instansiAssetsRoot) || mkdir($this->instansiAssetsRoot, 0755, true);
        // if the picture was sent to server
        if (!empty($this->upload_kopsurat)) {
            $filename = $this->kopsurat;
            $filepath = $this->instansiAssetsRoot . DIRECTORY_SEPARATOR . $filename;
            $this->upload_kopsurat->saveAs($filepath);
        }

        if (!empty($this->upload_logo)) {
            $filename = $this->logo;
            $filepath = $this->instansiAssetsRoot . DIRECTORY_SEPARATOR . $filename;
            $this->upload_logo->saveAs($filepath);
        }
        parent::afterSave($insert, $changedAttributes);
    }

    protected function generateFileName($tipe)
    {
        if ($tipe === 'logo') {
            return $tipe . '.' . $this->upload_logo->extension;
        } elseif ($tipe === 'kop_surat') {
            return $tipe . '.' . $this->upload_kopsurat->extension;
        }
        return NULL;
    }

    public function getLogoImageUrl()
    {
        if ($this->logo === NULL || $this->logo === '') {
            return NULL;
        }
        return Yii::getAlias('@instansiurl/' . $this->logo);
    }

    public function getKopImageUrl()
    {
        if ($this->kopsurat === NULL || $this->kopsurat === '') {
            return NULL;
        }
        return Yii::getAlias('@instansiurl/' . $this->kopsurat);
    }
}
