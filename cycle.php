<?php

date_default_timezone_set("Asia/Taipei");

class LotteryGenerateCycle
{
    public function cycleLogic($totalCycle, $oneceTime, $startTimeStr)
    {
        $startTmp = strtotime(date("Y-m-d") . " " . $startTimeStr);
        $empty = [];

        for ($i = 1; $i <= $totalCycle; $i++) {
            if ($i == 1) {
                $_startTime = $startTmp;
                $_endTime = $startTmp + ($oneceTime * ($i));
            } else {
                $_startTime = $startTmp + ($oneceTime * ($i - 1));
                $_endTime = $startTmp + ($oneceTime * ($i));
            }

            $empty[] = array(
                'start' => $_startTime,
                'end' => $_endTime,
                'startDate' => date("Y-m-d H:i:s", $_startTime),
                'endDate' => date("Y-m-d H:i:s", $_endTime),
            );
        }
        return $empty;
    }

    public function generateKenoTW()
    {
        $totalCycle = 203;
        $oneceTime = 300;
        $startTimeStr = "07:00:00";
        $kenoResult = $this->cycleLogic($totalCycle, $oneceTime, $startTimeStr);
        $resArray = [];
        foreach ($kenoResult as $no => $row) {
            $row['no']=  date("Ymd").sprintf("%02d",$no+1);
            $resArray[] =$row;
        }
        return $resArray;
    }

}


$c = new LotteryGenerateCycle();
$res = $c->generateKenoTW();
print_r($res);
