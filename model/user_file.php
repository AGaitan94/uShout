<?php

class User{

	//Class Properties-----------------------------------------------------------------------------------

	/*
	* The name of the user
	*/
	private $username;

	/*
	* The comment array that contains each comment the user has made
	*/
	private $comment_array = array();

	/*
	* Stores the string that points to the location of the user´s current profile image
	*/
	private $img_string;

	/*
	* The array of music proyects the user has
	*/
	private $music_proyects_array = array();

	//Class-constructor----------------------------------------------------------------------------------

	/*
	* Creates a new user with a name and a default image if not set
	* @param: The username 
	* @param: The optional image location
	* POST: A new user has been created with a name
	*/
	function __construct($n_username, $n_img_string = "http://placehold.it/64x64") 
	{
      	$this->username = $n_username;
      	$this->img_string = $n_img_string;
    }

    //Class-methods--------------------------------------------------------------------------------------

    /*
    * Returns a string with the name of the user
    */
    function give_username()
    {
    	return $this->username;
    }

    /*
    * Returns the image string for the user profile
    */
    function give_img_string()
    {
    	return $this->img_string;
    }
}

?>