<?php

namespace App\Mock;

use App\Contracts\UseCase;
use App\Exceptions\MyException;

class GetCalendarUseCase implements \App\Contracts\GetCalendarInterface
{
    /**
     * 処理実行
     * @return array
     * @param
     * @throws App\Exceptions\MyException
     */
    public function __invoke() : Array
    {
        // 1.{指定月}の1日を\DateTimeImmutable取得
        $firstDayOfMonth = $this->getFirstDayOfMonth();
        // 2.{1の日付}が開始曜日でなければ開始曜日まで遡って取得
        $firstDayOfPage = $this->getFirstDayOfPage();
        // 3.{指定月}の最終日を取得
        $lastDayOfMonth = $this->getLastDayOfMonth();
        // 4.{2の日付}が{開始曜日}-1でなければ{開始曜日}-1まで取得
        $lastDayOfPage = $this->getLastDayOfPage();
        // 5.{2の日付}から{6の日付}まで7日単位で配列として順に変数へ格納
        // 6.{5の変数}を返却
        return $this->getPage();
    }
    /**
     * @return datetimeimmutable
     */
    private function getFirstDayOfMonth() : \DateTimeImmutable
    {
        return new \DateTimeImmutable('2019/9/1');
    }
    /**
     * @return datetimeimmutable
     */
    private function getLastDayOfMonth() : \DateTimeImmutable
    {
        return new \DateTimeImmutable('2019/9/30');
    }
    /**
     * @return datetimeimmutable
     */
    private function getFirstDayOfPage() : \DateTimeImmutable
    {
        return new \DateTimeImmutable('2019/8/26');
    }
    /**
     * @return datetimeimmutable
     */
    private function getLastDayOfPage() : \DateTimeImmutable
    {
        return new \DateTimeImmutable('2019/10/6');
    }
    /**
     * カレンダーページを取得する
     * @return datePeriod
     */
    private function getPage() : Array
    {
        $dummy = (object) [
            'date' => '9/1',
            'weekDay' => '日',
            'year' => '2019',
            'month' => '9',
            'day' => '1',
        ];
        return [
            // 1行目
            [ $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy ],
            // 2行目
            [ $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy ],
            // 3行目
            [ $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy ],
            // 4行目
            [ $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy ],
            // 5行目
            [ $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy ],
        ];
    }
}
