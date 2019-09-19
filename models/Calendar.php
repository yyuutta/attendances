<?php

class Calendar {
    public $holiday;
    function __construct() {
            // 祝日を取得
            $action = new Holiday();
            $this->holiday = $action->holiday;
    }
    
    function get_calendar($year, $month, $row) {
        // 月末日を取得
        $last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
        $calendar = array();
        $j = 0;

        // 月末日までループ
        for ($i = 1; $i < $last_day + 1; $i++) {
            // 曜日を取得
            $week = date('w', mktime(0, 0, 0, $month, $i, $year));
            $youbi = array();
            $youbi = array( "日", "月", "火", "水", "木", "金", "土" );
            
            $com = 0;
            foreach($this->holiday as $key => $value){
                $flag_date = $year . "/" . $month . "/" . $i;
                if ($key == $flag_date) {
                    $calendar[$j]['holiday'] = $value;
                    $com = 1;
                }
                if ($com != 1) {
                    $calendar[$j]['holiday'] = "";
                }
            }
            
            // 配列に日付と曜日をセット
            $calendar[$j]['day'] = $i;
            $calendar[$j]['week'] = $youbi[$week];

            // DB登録されてる日なら、そのデータを参照
            $com = 0;
            if ($row != 0) {
                foreach($row as $key => $value){
                    $flag_date = $year . "/" . $month . "/" . $i;
                    if ($value['date_id'] == $flag_date) {
                        $calendar[$j]['selected_start'] = $value['start'];
                        $calendar[$j]['selected_finish'] = $value['finish'];
                        $calendar[$j]['selected_rest'] = $value['rest'];
                        $calendar[$j]['selected_kei'] = $value['kei'];
                        $calendar[$j]['err'] = $value['err'];
                        $com = 1;
                    }
                    if ($com != 1) {
                        $calendar[$j]['selected_start'] = 0;
                        $calendar[$j]['selected_finish'] = 0;
                        $calendar[$j]['selected_rest'] = 0;
                        $calendar[$j]['selected_kei'] = 0;
                        $calendar[$j]['err'] = "";
                    }
                }
            } else {
                $calendar[$j]['selected_start'] = 0;
                $calendar[$j]['selected_finish'] =0;
                $calendar[$j]['selected_rest'] = 0;
                $calendar[$j]['selected_kei'] = 0;
                $calendar[$j]['err'] = "";
            }
            $j++;                                                                
        }
        return $calendar;
    }

    function get_times(){
        // ここに日付別に登録されている勤怠時間のデータを配列で入れる
        $options = array(
            '0' => '-',
            '11' => '11',
            '11.5' => '11.5',
            '12' => '12',
            '12.5' => '12.5',
            '13' => '13',
            '13.5' => '13.5',
            '14' => '14',
            '14.5' => '14.5',
            '15' => '15',
            '15.5' => '15.5',
            '16' => '16',
            '16.5' => '16.5',
            '17' => '17',
            '17.5' => '17.5',
            '18' => '18',
            '18.5' => '18.5',
        );
        return $options;
    }
    
    function get_times_rest(){
        // ここに日付別に登録されている勤怠時間のデータを配列で入れる
        $options_rest = array(
            '0' => '-',
            '0.5' => '0.5',
            '1' => '1',
        );
        return $options_rest;
    }
    
    function get_dates() {
        $dates = array();
        
        $dates['year'] = date('Y');
        $dates['year_now'] = date('Y');
        $dates['year_ago'] = $dates['year'] - 1;
        $dates['year_add'] = $dates['year'] + 1;
        $dates['month'] = date('n');
        if (isset($_GET['year'])) {
            $dates['year'] = $_GET['year'];
            if (isset($_GET['month'])) {
                $dates['month'] = $_GET['month'];
            }
        }
        
        // 翌月を取得
        $nextMonth = date('n', strtotime(date('Y-m-01').'+1 month'));
        
        // 年をまたぐ際の対応→翌月が1月なら年を翌年に設定
        if($nextMonth == 1) {
            $nextyear = date('Y') + 1;
        }else{
            $nextyear = date('Y');
        }
        
        // シフト入力画面で登録できるかできないかの判断
        if($dates['year'] == $nextyear && date('d') <= lastday && $dates['month'] == $nextMonth) {
            $dates['check'] = 1;
        } else {
            $dates['check'] = 0;
        }
        
        // 基準日情報の前日と翌日を取得
        // 基準日
        if (isset($_GET['year']) && isset($_GET['month']) && isset($_GET['day'])) {
            $base_date = $_GET['year'] . "-" . $_GET['month'] . "-" . $_GET['day'];

            $dates['ago'] = date("Y-m-d",strtotime($base_date . "-1 day"));
            $dates['ago_y'] = date("Y",strtotime($dates['ago']));
            $dates['ago_m'] = date("n",strtotime($dates['ago']));
            $dates['ago_d'] = date("j",strtotime($dates['ago']));

            $dates['later'] = date("Y-m-d",strtotime($base_date . "+1 day"));
            $dates['later_y'] =  date("Y",strtotime($dates['later']));
            $dates['later_m'] =  date("n",strtotime($dates['later']));
            $dates['later_d'] =  date("j",strtotime($dates['later']));
        }
        
        return $dates;
    }
    
}