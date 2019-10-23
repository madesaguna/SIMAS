<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratMasuk;

/**
 * SuratMasukSearch represents the model behind the search form of `app\models\SuratMasuk`.
 */
class SuratMasukSearch extends SuratMasuk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_suratmasuk', 'no_urut', 'pengirim', 'tanggal_masuk', 'tanggal_surat', 'perihal_surat', 'upload_berkas', 'jenis_surat'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SuratMasuk::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tanggal_masuk' => $this->tanggal_masuk,
            'tanggal_surat' => $this->tanggal_surat,
        ]);

        $query->andFilterWhere(['like', 'jenis_surat', $this->jenis_surat])
			->andFilterWhere(['like', 'no_suratmasuk', $this->no_suratmasuk])
            ->andFilterWhere(['like', 'no_urut', $this->no_urut])
            ->andFilterWhere(['like', 'pengirim', $this->pengirim])
            ->andFilterWhere(['like', 'perihal_surat', $this->perihal_surat])
            ->andFilterWhere(['like', 'upload_berkas', $this->upload_berkas]);

        return $dataProvider;
    }

    public static function count_some()
    {
        $count_query = static::find()->count();
        $jumlah_surat_masuk = $count_query;
        return $jumlah_surat_masuk;
    }
}
