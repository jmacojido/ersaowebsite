<div class="footer">
	<div class="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="logo">
						<a href="<?php echo BASE_URL; ?>"><img src="<?php echo IMG_URL; ?>ersao_logo_footer.png"/></a>
					</div>
					<div class="social">
						<?php
							$social = unserialize(SOCIAL);

							foreach( $social AS $name => $url ){
								echo '<a href="'.$url.'">';
								echo '<img src="'.IMG_URL.'social_'.$name.'.png"/>';
								echo '</a>';
							}
						?>
					</div>
					<div class="nav">
						<ul>
							<?php
								$menu = unserialize(MENU);

								foreach( $menu AS $id => $page ){
									echo '<li>';

									if ( $pageId == $id ){
										echo '<a class="btn btn-line btn-wide active" href="'.$page[1].'">';
									}
									else{
										echo '<a class="btn btn-line btn-wide" href="'.$page[1].'">';
									}

									echo $page[0];
									echo '</a>';
									echo '</li>';
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<img src="<?php echo IMG_URL; ?>creato_logo.png"/> Design and Developed by Creato Consultancy Inc. | ERSAO © Copyright <?php echo date('Y'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
