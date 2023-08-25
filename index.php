<?php
error_reporting(-1);


function month_print(int $month): void
{
    $arr = ['Пн','Вт','Ср','Чт','Пт','Сб','Вс'];
    if ($month>12 || $month<1)return;
    $day_in_month = cal_days_in_month(CAL_GREGORIAN,$month, 2023);
    $day_of_week = date("l", mktime(0, 0, 0, $month, 1, 2023));
    var_dump($day_of_week);
    $col = match($day_of_week){
        'Monday'=>0,
        'Tuesday'=>1,
        'Wednesday'=>2,
        'Thursday'=>3,
        'Friday'=>4,
        'Saturday'=>5,
        'Sunday'=>6
    };
    $day = 1;
    echo '<table border="1" width="100%">';
    echo "<tr>";
    for ($i=0; $i<7; $i++){
        if($i==5||$i==6) echo "<td style='color: red'>$arr[$i]</td>";
        else echo "<td>$arr[$i]</td>";
    }
    $number_of_weeks = ($day_in_month+$col)/7.0;

    var_dump($number_of_weeks);
    echo "</tr>";
    for ($i=0;$i<$number_of_weeks;$i++){
        echo "<tr>";
        for ($j=0;$j<=6;$j++){

            if ($i==0&&$j<$col)echo "<td> </td>";
            elseif($day<=$day_in_month) {
                if($j==5||$j==6) echo "<td style='color: red'>$day</td>";
                else echo "<td>$day</td>";
                $day++;
                $col=0;
            }else echo "<td> </td>";

        }

        echo "</tr>";
    }

    echo '</table>';

}

month_print(3);



