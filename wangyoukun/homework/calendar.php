<?php
////判断$Year和$Month是否为空,如果为空就获取系统当前日期,否则用$_GET获取
$Year = empty($_GET['Year']) ? date("Y"): $_GET["Year"];
$Month = empty($_GET['Month']) ? date("m"): $_GET["Month"];
////获取当前日期////
$Today = date("Ymj");
////初始化日期数组////
$Maxday = array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20",
    "21","22","23","24","25","26","27","28","29","30","31");
$Maxday_count = count($Maxday);
////初始化星期数组////
$Weekday = array("<font color='red'>Sun</font>","Mon","Tue","Wed","Thu","Fri","<font color='red'>Sat</font>");
$Weekday_count = count($Weekday);
$daynum = 0;
$space = "<td> </td>";
$col = 0;
////打印表格头部////
?>
<form action="calendar.php" method="post" name="linked">
<table><tr><td colspan=3 align=center><a href="?Year=<?php if($Year-1 > 1900)echo $Year-1;else echo $Year;?>&Month=<?php echo $Month?>" onClick="javascript:document.linked.submit();" name="Year"><<</a> <?php echo $Year?> <a href="?Year=<?php if($Year+1 <2999) echo $Year+1;else echo $Year;?>&Month=<?php echo $Month?>" onClick="javascript:document.linked.submit();" name="Year">>></a></td>
<td> </td><td colspan=3 align=center><a href="?Year=<?php echo $Year?>&Month=<?php if($Month-1 >0) if($Month-1 < 10)echo "0".($Month-1); else echo $Month-1; else echo $Month;?>" onClick="javascript:document.linked.submit();" name="Month"><<</a> <?php echo $Month;?> <a href="?Year=<?php echo $Year?>&Month=<?php if($Month+1 <13) if($Month+1 <10) echo "0".($Month+1);else echo ($Month+1); else echo $Month;?>" onClick="javascript:document.linked.submit();" name="Month">>></a></td></tr><tr><td colspan="8"></td></tr><tr>
<?php
////打印星期列表////
while(list(,$Weekvalue) = each($Weekday))
    echo "<td align=center> ".$Weekvalue." </td>";
echo "</tr>";
////打印日期列表////
//当月份为4,6,9,11的时候,从数组末尾删除一个值,也就是删除31这个值.
if($Month == 4 or $Month == 6 or $Month == 9 or $Month == 11)
{
    array_pop($Maxday);
    $Maxday_count--;
}
//先判断月份是否为2月,如果是的话再判断年份是否为闰年,如果是的话就从数组尾部移除2个值,否则就移除3个值.
if($Month == 2)
{
    if($Year % 4 == 0)
    {
        array_pop($Maxday);
        array_pop($Maxday);
        $Maxday_count-=2;
    }
    else
    {
        array_pop($Maxday);
        array_pop($Maxday);
        array_pop($Maxday);
        $Maxday_count-=3;
    }
}
////打印日期////
while($daynum < $Maxday_count)
{
    echo "<tr>";
    while(list($colnum,$Dayvalue) = each($Maxday))
    {
        //判断当前日期为一星期中的哪一天
        $DayWeek = date("w",strtotime($Year."-".$Month."-".$Dayvalue));
        //当当前日期处于第1个,也就是每个月的第1天的时候,在它前面补上相应的空格子
        if($Dayvalue == 1)
            for($i=0;$i<$DayWeek;$i++)
                echo $space;//打印每个月空出的几个格子
        $daynum++;
        //当打印日期的时候与当前日期字符串进行比较,如果相等就将字体标为红色.
        if($Year.$Month.$Dayvalue == $Today)
        {
            $u1 = "<b><u>";
            $u2 = "</b></u>";
        }
        else
        {
            $u1 = "";
            $u2 = "";
        }
        if($DayWeek == 0 or $DayWeek == 6)
            $color = "red";
        else
            $color = "black";
        echo "<td align=center><font color=".$color."> ".$u1.$Dayvalue.$u2." </font></td>";
        //用本周第几天这个值加1,如果是7的倍数就换行退出此轮循环(换行打印)
        if(($DayWeek+1) % 7 == 0)
        {
            $col++;
            break;
        }
    }
    echo "</tr>";
}
?>
