<?php
    $site_configs = parse_ini_file("config.ini");
?>
<footer id="footer">
	<div class="text-center" role="contentinfo">
		Copyright &copy; eFun
	</div>
</footer>
<script>
    var current_user_id = "<?php echo $_SESSION['USERID'];?>";
    var user_fullname = "<?php echo $_SESSION['fullname']; ?>";
    var WS_URL = "<?php echo $site_configs['WS_URL']; ?>";
</script>
<script src="js/select2.min.js"></script>
<script src="js/chat.js"></script>