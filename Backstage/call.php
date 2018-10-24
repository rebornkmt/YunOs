<style>
body{font-family:Arial; font-size:14px;line-height:180%;padding-top: 20px;} /*总控制，可忽略此行*/
table tr:first-child{background:#0066CC; color:#fff;font-weight:bold;} /*第一行标题蓝色背景*/
table{border-top:1pt solid #C1DAD7;border-left:1pt solid #C1DAD7;margin: 0 auto;} 
td{ padding:5px 10px; text-align:center;border-right:1pt solid #C1DAD7;border-bottom:1pt solid #C1DAD7;}
tr:nth-of-type(odd){ background:#F5FAFA;} /* odd 标识奇数行，even标识偶数行 */

</style>
</head>
<body>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td>姓名</td>
    <td>性别</td>
    <td>职位</td>
    <td>电话</td>
    <td>办公室</td>
    <td>所在院系</td>
  </tr>
	
 <?php 
 require'link.php';
 $sql="select * from `call`";
 $query=mysql_query($sql);
 while ($row=mysql_fetch_array($query)) {
?>
<tr>
  <td><?php echo $row['name'] ?></td>
   <td><?php echo $row['sex'] ?></td>
     <td><?php echo $row['position'] ?></td>
      <td><?php echo $row['phone'] ?></td>
       <td><?php echo $row['office'] ?></td>
        <td><?php echo $row['courtyard'] ?></td>       
    </tr>
     <?php } ?>
     <tr>
     	<td colspan="6">
        <!--分页-->
<?php 
$pageSize=3;//每页5条
$bothNum=3;//当前页左右各显示4个页码
$cur_page=isset($_GET['cur_page'])?$_GET['cur_page']:1;//当前页数

$sql="select * from `call`";
$res=mysql_query($sql);
$total=mysql_num_rows($res);//总记录数
$pageNum=ceil($total/$pageSize);//总页数

$start=($cur_page-1)*$pageSize;
$sql="select * from Notice limit $start,$pageSize";

$pagestr="";
if($cur_page==1){
    $pagestr.="<span><br/><br/>上一页</span>";
}else{
    $lastPage=$cur_page-1;
    $pagestr.="<a href='forum.php?cur_page=$lastPage'>上一页</a>"."  ";
}

if($cur_page-$bothNum>1){
    $pagestr.="<a href='forum.php?cur_page=1'>首页</a>";
    $pagestr.="<span>...</span>";
}
//当前页的左边
for($i=$bothNum;$i>=1;$i--){
    if(($cur_page - $i) < 1 ) { // 当前页左边花最多 bothnum 个数字
         continue;
     }
    $lastPage=$cur_page-$i;
    $pagestr.="<a href='forum.php?cur_page=$lastPage'>$lastPage</a>"."  ";
}
//当前页
$pagestr.="<span>$cur_page</span>"."  ";
//当前页右边
for($i=1;$i<=$bothNum;$i++){
    if(($cur_page + $i) > $pageNum) { // 当前页右边最多 bothnum 个数字
        break;
    }
    $lastPage=$cur_page+$i;
    $pagestr.="<a href='forum.php?cur_page=$lastPage'>$lastPage</a>"."  ";

}

//尾页
if(($cur_page+$bothNum)<$pageNum){
    $pagestr.="<span>...</span>"."  ";
    $pagestr .= '<a href="?cur_page='.$pageNum.'">尾页</a>'."  ";
}
//下一页
 if($cur_page == $pageNum) {
       $pagestr .= '<span>下一页</span>';
   } else {
          $nextPage=$cur_page+1;
       $pagestr .= "<a href='forum.php?cur_page={$nextPage}'>下一页</a>";
   }
echo $pagestr;
echo "<hr/>";
echo '当前页数为：'.$cur_page.'，总页数为：'.$pageNum;

?>
               
        </td>
     </tr>
</table>

