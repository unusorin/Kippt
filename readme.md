# Kippt.php
- --
### API Client for Kippt.com written in PHP



##Installation

		<?php
		require_once 'src/kippt-bootstrap.php';
		\unusorin\Kippt\Kippt::initialize('<your_user_name>', '<your_api_token>');

		
## Usage

* Get a specific clip

		$myClip = \unusorin\Kippt\Models\Clip::get(<clip_id>);

* Get all clips from list

		$clipsArray = \unusorin\Kippt\Models\Clip::getAll(array('list'=>'/api/lists/<list_id>/'));
		
* Available models:
	* Clip
	* Comment
	* Lists
	* User	