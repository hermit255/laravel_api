<?php

namespace App\Mock;

use App\Contracts\UseCase;
use App\Exceptions\MyException;

class GetCalendarUsecase implements \App\Contracts\GetCalendarInterface
{
    private $weekdays = ['日', '月', '火', '水', '木', '金', '土'];
    /**
     * 処理実行
     * @return array
     * @param
     * @throws App\Exceptions\MyException
     */
    public function __invoke(
        int $year = null,
        int $month = null,
        string $format = 'Y/m/d',
        int $startWeekday = 0
    ) : Array
    {
        // 1.{指定月}の1日を\DateTimeImmutable取得
        $firstDayOfMonth = $this->getFirstDayOfMonth($year, $month);
        // 2.{1の日付}が開始曜日でなければ開始曜日まで遡って取得
        $firstDayOfPage = $this->getFirstDayOfPage($firstDayOfMonth, $startWeekday);
        // 3.{指定月}の最終日を取得
        $lastDayOfMonth = $this->getLastDayOfMonth($firstDayOfMonth);
        // 4.{2の日付}が{開始曜日}-1でなければ{開始曜日}-1まで取得
        $lastDayOfPage = $this->getLastDayOfPage($lastDayOfMonth, $startWeekday);
        // 5.{2の日付}から{6の日付}まで7日単位で配列として順に変数へ格納
        // 6.{5の変数}を返却
        return $this->getPage($firstDayOfPage, $lastDayOfPage, $format);
    }
    /**
     * @return datetimeimmutable
     */
    private function getFirstDayOfMonth($year, $month) : \DateTimeImmutable
    {
        $year = (!empty($year) || is_numeric($year)) ? $year : date('Y');
        $month = (!empty($month) || is_numeric($month)) ? $month : date('m');
        return new \DateTimeImmutable($year. '-'. $month);
    }
    /**
     * @return datetimeimmutable
     */
    private function getLastDayOfMonth(\DateTimeImmutable $firstDayOfMonth) : \DateTimeImmutable
    {
        return $firstDayOfMonth->modify('last day of this months');
    }
    /**
     * @return datetimeimmutable
     */
    private function getFirstDayOfPage(\DateTimeImmutable $firstDayOfMonth, int $startWeekday) : \DateTimeImmutable
    {
        $diff  = ($firstDayOfMonth->format('w') - $startWeekday + 7) % 7;
        return $firstDayOfMonth->modify("-${diff} days");
    }
    /**
     * @return datetimeimmutable
     */
    private function getLastDayOfPage(\DateTimeImmutable $lastDayOfMonth, int $startWeekday) : \DateTimeImmutable
    {
        $lastWeekday = (($startWeekday - 1) + 7) % 7;
        $diff  = ($lastWeekday - $lastDayOfMonth->format('w') + 7) % 7;
        // 初日との間隔取得のため1秒足しておく
        return $lastDayOfMonth->modify("+${diff} days + 1 second");
    }
    /**
     * カレンダーページを取得する
     * @return datePeriod
     */
    private function getPage(\DateTimeImmutable $firstDayOfPage, \DateTimeImmutable $lastDayOfPage, string $format) : Array
    {
        $interval = new \DateInterval('P1D');
        $period = new \DatePeriod($firstDayOfPage, $interval, $lastDayOfPage);
        $rows = [];
        foreach($period as $index => $date) {
            $content = new \stdClass();
            $content->date = $date->format($format);
            $content->weekDay = $this->weekdays[$date->format('w')];
            $content->year = $date->format('Y');
            $content->month = $date->format('n');
            $content->day = $date->format('j');

            // ゼロ除算しないように1加算
            $rowNumber = ceil(($index + 1) / 7);
            $rows[$rowNumber][] = $content;
        }
        return $rows;
    }
}
