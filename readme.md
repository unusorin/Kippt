# Kippt.php
- --
### API Client for Kippt.com written in PHP

![Kippt](https://si0.twimg.com/profile_images/2275864328/2hnkee9et7cp8bnz12yr.png)


##Installation

		<?php
		require_once 'src/kippt-bootstrap.php';
		\unusorin\Kippt\Kippt::initialize('<your_user_name>', '<your_api_token>');

		
## Usage

* Get a specific clip

		$myClip = \unusorin\Kippt\Models\Clip::get(<clip_id>);

* Get all clips from list

		$clipsArray = \unusorin\Kippt\Models\Clip::getAll(array('list'=>'/api/lists/<list_id>/'));

* Add a new list

        $clip = new \unusorin\Kippt\Models\Lists();
        $clip->title = 'Some list title';
        $clip->save();

* Modify existing list

        $clip = \unusorin\Kippt\Models\Clip::get(<clip_id>);
        $clip->title = 'Some new title';
        $clip->save();

* Delete existing list

        $clip = \unusorin\Kippt\Models\Clip::get(<clip_id>);
        $clip->delete();

* Available models:
	* Clip
	* Comment
	* Lists
	* User	
