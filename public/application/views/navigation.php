<header>	
	<div class="widthContainer">
		
		<div class="pull-left">
			<div id="hLogo">
				<a href="<?= isset($this->session->username) ? base_url("user/feed/" . $this->session->userdata('username')) : "user/login" ?>">Chirper</a>
			</div>
			
			<?php if (isset($this->session->username)) { ?>
			<div class="link<?= isset($selectedFeed) ? " selected" : ""?>">
				<a href="<?= base_url("user/feed/" . $this->session->username) ?>">Feed</a>
			</div>
			<?php } ?>
			
			<div class="link<?= isset($selectedSearch) ? " selected" : ""?>">
				<a href="<?= base_url("search") ?>">Search</a>
			</div>
			
		</div>
		
		<div class="pull-right">
			
			<div class="link">
				<div id="navSearch">
					<form action="<?= base_url() ?>search/dosearch" method="get">
						<input name="q" type="text" placeholder="Search Chirps..." autocomplete="off">
						<button type="submit">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</form>
				</div>
			</div>
			
			<?php if ($this->session->username) { ?>
			
			<div class="link" id="profileHover">
				<a href="<?= base_url("user/view/" . $this->session->username) ?>">
					<div id="hProfilePicture"></div>
					<div id="hProfileLink">
						<?= $this->session->username ?>
						<i class="fa fa-chevron-down" aria-hidden="true"></i>
					</div>
				</a>
				<div id="profileDropdown">
					<a href="<?= base_url("user/view/" . $this->session->username) ?>">Profile</a>
					<a href="<?= base_url("message") ?>">Compose</a>
					<a href="<?= base_url("user/logout") ?>">Logout</a>
				</div>
			</div>
			<?php } else { ?>
			
			<div class="link">
				<a href="<?= base_url() . "user/login" ?>">Login</a>
			</div>
			
			<?php } ?>
			
		</div>
	</div>
</header>