<?php

use Illuminate\Database\Seeder;

class PrefecturesTableSeederFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scenario = 'dummy';

        $prefectures = [
            '北海道', '青森', '岩手', '宮城', '秋田', '山形', '福島', '茨城', '栃木', '群馬', '埼玉', '千葉', '東京', '神奈川', '新潟', '富山', '石川', '福井', '山梨', '長野', '岐阜', '静岡', '愛知', '三重', '滋賀', '京都', '大阪', '兵庫', '奈良', '和歌山', '鳥取', '島根', '岡山', '広島', '山口', '徳島', '香川', '愛媛', '高知', '福岡', '佐賀', '長崎', '熊本', '大分', '宮崎', '鹿児島', '沖縄',
        ];
        foreach ($prefectures as $id => $name) {
            $params = [
                'id' => 1 + $id,
                'name' => $name,
                'surfix' => $this->getSurfix(),
            ];
            factory(App\Prefecture::class, $scenario)->create($params);
        }
    }
    /**
     * Run the database seeds.
     *
     * @param String
     * @return String
     */
    private function getSurfix(String $name) {

        $exceptionDo = ['北海道'];
        $exceptionTo = ['東京'];
        $exceptionFu = ['京都', '大阪'];

        if (in_array($name, $exceptionDo)) {
            $surfix = '';
        } elseif (in_array($name, $exceptionTo)) {
            $surfix = '都';
        } elseif (in_array($name, $exceptionFu)) {
            $surfix = '府';
        } else {
            $surfix = '県';
        }
        return $surfix;
    }
}
