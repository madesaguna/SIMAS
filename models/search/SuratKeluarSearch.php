<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratKeluar;

/**
 * SuratKeluarSearch represents the model behind the search form of `app\models\SuratKeluar`.
 */
class SuratKeluarSearch extends SuratKeluar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_jenis_surat'], 'integer'],
            [['no_suratkeluar', 'tanggal_surat', 'tujuan', 'narasi'], 'safe'],
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
        $query = SuratKeluar::find();

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
            'tanggal_surat' => $this->tanggal_surat,
            'id_jenis_surat' => $this->id_jenis_surat,
        ]);

        $query->andFilterWhere(['like', 'no_suratkeluar', $this->no_suratkeluar])
            ->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'narasi', $this->narasi]);

        return $dataProvider;
    }

    public static function count_some()
    {
        $count_query = static::find()->count();
        $jumlah_surat_keluar = $count_query;
        return $jumlah_surat_keluar;
    }
}
