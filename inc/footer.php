<?php
echo '
</div>

</main>

<footer id="footer">

<div class="container">&copy; '.date('Y', time()+3600*7).' <a href="">Tokoku</a></div>

</footer>

<script type="text/javascript" src="assets/js/jquery-3.2.1.js"></script>

<script type="text/javascript" src="assets/js/popper.min.js"></script>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">$(document).ready(function() {
	$(\'[data-toggle="img"]\').click(function() {
		$(\'body\').toggleClass(\'img-active\');
	});
	
});</script>

</body>

</html>';