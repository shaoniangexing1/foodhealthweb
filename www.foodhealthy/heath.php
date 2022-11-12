<?php
$link = require_once 'conn.php';
$page = $_GET['page'] ?? 1;//当前页码
$pagecount = 3;//每页显示条数
//查询总条数
$count_sql = 'select count(*) as total from health';
$res = mysqli_query($link, $count_sql);
$arr = mysqli_fetch_assoc($res);

$count = $arr['total'];//得到查询总数
$pages = ceil($count / $pagecount);//查询总数向上取整(总页数)
$offset = ($page - 1) * $pagecount;//根据当前页计算limit后面的偏移量参数
$limit = "LIMIT $offset,$pagecount";
$sql = "select * from health  order by id " . $limit;
$healths = mysqli_query($link, $sql);
$datarr = mysqli_fetch_all($healths, MYSQLI_ASSOC);
//添加导航
$pageinfo = "";
$pageinfo .= "<a href='heath.php?page=1'>首页</a>";//首页导航
if ($page != 1) {
    $prev = $page - 1;
    $pageinfo .= "<a href='heath.php?page=$prev'>上一页</a>";//上一页导航
}
//总页数小于等于7时，显示所有数字
if ($pages <7) {
    for ($i = 1; $i <= $pages; $i++) {
        if ($page == $i) {
            //当前页
            $pageinfo .= "<a class='current' href='heath.php?page=$i'>$i</a>";
        } else {
            $pageinfo .= "<a href='heath.php?page=$i'>$i</a>";
        }
    }
} else if ($page <= 5) {//总数大于7，当前页小于等于5显示
    for ($i = 1; $i <= 7; $i++) {
        if ($page == $i) {
            $pageinfo .= "<a class='current' href='heath.php?page=$i'>$i</a>";
        } else {
            $pageinfo .= "<a href='heath.php?page=$i'>$i</a>";
        }
    }
    $pageinfo .= "<a href='javascript:return false;' onclick='return false'>...</a>";
} else {
    $pageinfo .= "<a href='heath.php?page=1'>1</a>";
    $pageinfo .= "<a href='heath.php?page=2'>2</a>";
    $pageinfo .= "<a href='javascript:return false;' onclick='return false'>...</a>";

    if ($page > $pages - 3) {
        for ($i = $pages - 4; $i <= $pages; $i++) {
            if ($page == $i) {
                $pageinfo .= "<a class='current' href='heath.php?page=$i'>$i</a>";
            } else {
                $pageinfo .= "<a href='heath.php?page=$i'>$i</a>";
            }
        }
    } else {
        for ($i = $page - 2; $i <= $page + 2; $i++) {
            if ($page == $i) {
                $pageinfo .= "<a class='current' href='heath.php?page=$i'>$i</a>";
            } else {
                $pageinfo .= "<a href='heath.php?page=$i'>$i</a>";
            }
        }
    }
}
if ($page != $pages) {
    $next = $page + 1;
    $pageinfo .= "<a href='heath.php?page=$next'>下一页</a>";
}
$pageinfo .= "<a href='heath.php?page=$pages'>末页</a>";
require_once 'heath.html';
mysqli_free_result($healths);
mysqli_close($link);
