<?php
    
    // Header
    require_once('php_templates/header.php');

?>

<nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-primary">
	<a class="navbar-brand" href="index.php">part list</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="main_nav">
		<div class="navbar-nav">
			<a class="nav-item nav-link" href="#">engine</a>
			<a class="nav-item nav-link" href="#">chassis</a>
			<a class="nav-item nav-link" href="#">gears</a>
			<a class="nav-item nav-link" href="#">steering</a>
			<a class="nav-item nav-link" href="#">brakes</a>
			<a class="nav-item nav-link" href="#">suspension</a>
			<a class="nav-item nav-link" href="#">tyres</a>
			<a class="nav-item nav-link" href="#">body</a>
			<a class="nav-item nav-link" href="#">visual</a>
			<a class="nav-item nav-link" href="#">special</a>
		</div>
	</div>
</nav>

<?php
    
    // Footer
    require_once('php_templates/footer.php');

?>