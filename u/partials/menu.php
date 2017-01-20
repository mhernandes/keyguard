<nav class="menu">
	<a href="" class="menu__username">
		<?php echo $_SESSION["name"]; ?>
	</a>

	<ul class="menu__links">
		<li class="menu__links_unit">
			<a href="index.php">
				<i class="menu__links_unit_icon" icon=""></i>
				Home
			</a>
		</li>

		<li class="menu__links_unit">
			<a href="create.php">
				<i class="menu__links_unit_icon" icon=""></i>
				Create
			</a>
		</li>
	</ul>
</nav>