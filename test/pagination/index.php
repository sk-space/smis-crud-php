<?php
include('db.php');
include('view.php');
$query = "SELECT * FROM `designation`";
$result = mysql_query($query);
$count = mysql_num_rows($result);
$limit = 3;
$total = ceil($count / $limit);
echo '<br><br>';
?>
<style>
.container{
  text-align: center;
}
.press ul li{
  padding: 10px;
  margin: 0px;
}
</style>
<script>
  $(document).ready(function(){
    function display(){
      $('#load').fadeIn('slow');
      // $('#load').html('<img src="clock-loading.gif">').css({'margin': '0px'});      
    }
    function hide(){
      $('#load').fadeOut('slow');
      // $('#load').html('<img src="clock-loading.gif">');      
    }
    $('.pagination li:first').css({'background': '#337ab7', 'color': '#f5f5f5'});
    display();
    $('#content').load('display.php?page=1', hide());
    $('.pagination li').click(function(){
      display();
      $('.pagination li').css({'background': '#f5f5f5', 'color': '#337ab7'});
      $(this).css({'background': '#337ab7', 'color': '#f5f5f5'});
      var num = this.id;
       $('#content').load('display.php?page='+num, hide());
    });
  });
</script>

<div class="container press">
  <div id="content"></div>
  <nav class="">
    <ul class="pagination"><?php
      for($i = 1; $i <= $total; $i++){?>
        <li id="<?php echo $i; ?>" class="btn btn-default"><?php echo $i; ?></li><?php
      }
      ?>
    </ul>
  </nav>
  <div id="load"></div>
</div>