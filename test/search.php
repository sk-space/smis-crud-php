<?php
include('include/config.php');
include('include/class.php');
include('view.php');
?>
<style>
form .form-group{
	width: 50%;
	margin: auto;
	font-style: italic;
}
</style>
<div class="container">
	<section class="main">
		<form class="form">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon" id="basic-addon1"><b class="fa fa-search"><i> Search</i></b></div>
	 				<input type="text" id="search" name="search" class="form-control" placeholder="Type Department Name To Search..." aria-describedby="basic-addon1">
            	</div>
        	</div><section>
            <div id="result"></div></section>
		</form>
	</section>
</div>
<script>
	$(document).ready(function(){
		$('#search').keyup(function(){
			var txt = $(this).val();
			if(txt != ''){
				$.ajax({
					url: "fetch.php",
					method:"post",
					data: {search:txt},
					dataType: "text",
					success: function(data){
						$('#result').html(data);
					}
				});
			}
			else{
				$('#result').html('');
				$.ajax({
					url: "fetch.php",
					method:"post",
					data: {search:txt},
					dataType: "text",
					success: function(data){
						$('#result').html(data);
					}
				});
			}
		});
	});
</script>