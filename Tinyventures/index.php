<?php
    
    // Header
    require_once('php_templates/header.php');

?>

<nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-primary">
	<a class="navbar-brand" href="#">tinyventures</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="main_nav">
		<div class="navbar-nav">
			<a class="nav-item nav-link" href="parts_index.php">parts</a>
			<a class="nav-item nav-link" href="#">modes</a>
			<a class="nav-item nav-link" href="#">locations</a>
		</div>
	</div>
</nav>

<?php
    
    // Footer
    require_once('php_templates/footer.php');

?>