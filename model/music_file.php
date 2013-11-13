<?php

class Music{

	//Class Properties

	/*
	* The title of the music files
	*/
	private $title;

	/*
	* The music file that contains  
	*/
	private $music_file;

	/*
	* The string that points to the location of the user´s current profile image
	*/
	private $music_img_string;

	/*
	* The array of comments the music-pryects has
	*/
	private $music_proyect_comments = array();

	//Class-constructor

	/*
	* Creates a new user with a name and a default image if not set
	* @param: The username 
	* @param: The optional image location
	* POST: A new user has been created with a name
	*/
	function __construct($n_username, $n_img_string = "http://placehold.it/64x64") 
	{
      	this->$username = $n_username;
      	this->$img_string = $n_img_string;
    }

    //Class-methods

    /*
    * Returns a string with the name of the user
    */
    function give_music_proyect_name()
    {
    	return $this->title;
    }
}

?>