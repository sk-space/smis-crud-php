<?php
include_once('db.php');
include_once('function.php');

if(isset($_POST['pageId']) && !empty($_POST['pageId'])){
   $id=$_POST['pageId'];
}else{
   $id='0';
}
$pageLimit=PAGE_PER_NO*$id;
$query="select post,postlink from pagination order by id desc
limit $pageLimit,".PAGE_PER_NO;
$res=mysql_query($query);
$count=mysql_num_rows($res);
$HTML='';
if($count > 0){
while($row=mysql_fetch_array($res)){
   $post=$row['post'];
   $link=$row['postlink'];
   $HTML.='<div>';
   $HTML.='<a href="'.$link.'" target="blank">'.$post.'</a>';
   $HTML.='</div><br/>';
}
}else{
    $HTML='No Data Found';
}
echo $HTML;
?>