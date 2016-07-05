<?php

date_default_timezone_set('PRC'); 
/**
* 日历类
*/
class Calendar
{
    private $rightYear; //左边年份标识
    private $leftYear;  //右边年份标识
    public $nowYear; //当前设置年份
    public $nowMonth; //当前设置月份
    public $days; //当前天数
    /**
     * 获取当前年份
     * @return [type] [description]
     */
    public function getNowYear()
    {
        if(!empty($_GET['year'])){
            $this->nowYear = $_GET['year'];
        }else{
            $this->nowYear = date('Y');
        }
        return $this->nowYear;
    }

    /**
     * 获取当前月份
     * @return [type] [description]
     */
    public function getNowMonth()
    {
        if(!empty($_GET['month'])){
            $this->nowMonth = $_GET['month'];
        }else{
            $this->nowMonth = (int)date('m');
        } 
        // 前后月份
        $this->lastMonth = $this->nowMonth - 1;
        $this->nextMonth = $this->nowMonth + 1;

        // 月份回归
        if($this->lastMonth < 1){
            $this->lastMonth = 12;
            $this->leftYear = $this->nowYear - 1;
        }else{
            $this->leftYear = $this->nowYear;
        }
        // 月份回归
        if ($this->nextMonth > 12) {
            $this->nextMonth = 1;
            $this->rightYear = $this->nowYear + 1;
        }else{
            $this->rightYear = $this->nowYear;
        }

        return $this->nowMonth;
    }

    /**
     * 获取当前日期的天数
     * @return [type] [description]
     */
    public function getDays()
    {
        $this->days = date('t',strtotime($this->nowYear.'-'.$this->nowMonth));
        return $this->days;
    }

    /**
     * 制作显示
     * @return [type] [description]
     */
    public function make()
    {   
        $this->getNowYear();
        $this->getNowMonth();
        
        $html = '<div>
                    <a href="?year='.($this->nowYear - 1).'&month='.$this->nowMonth.'"><<<a>
                    <a href="?year='.$this->leftYear.'&month='.($this->lastMonth).'"><<a>
                    <span>'.$this->nowYear.'</span>年<span>'.$this->nowMonth.'</span>月
                    <a href="?year='.$this->rightYear.'&month='.($this->nextMonth).'">><a>
                    <a href="?year='.($this->nowYear + 1).'&month='.$this->nowMonth.'">>><a>
                </div>';

        $this->getDays();
        $html .= '<table>
                    <tr>
                        <td>日</td>
                        <td>一</td>
                        <td>二</td>
                        <td>三</td>
                        <td>四</td>
                        <td>五</td>
                        <td>六</td>
                    </tr>';        

        for ($i = 1; $i <= $this->days; $i++) { 
            $day = date('w', strtotime($this->nowYear.'-'.$this->nowMonth.'-'.$i));
            if($i == 1){
                $html .= '<tr>';
                $html .= str_repeat('<td></td>', $day);
            }
            if($day == 0){
                $html .= '<tr>';
            }
            // 判断是否是今天
            if(strtotime($this->nowYear.'-'.$this->nowMonth.'-'.$i) == strtotime(date('Y-m-d'))){
                $html .= '<td><font color="red">'.$i.'</font></td>';
            }else{
                $html .= '<td>'.$i.'</td>';
            }
            
            if($day == 6){
                $html .= '</tr>';
            }
        }
        $html .= '</table>';
        $html .= '<a href="?year='.date('Y').'&month='.(int)date('m').'">今天</a>';
        echo $html;
    }
}

$calendar = new Calendar();
$calendar->make();

?>