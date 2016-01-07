<?php
	session_start(); /* using this function to remember input fields -> Bonus  */
?>

<html>
<?php //implemeting javascript into php file -> this part validates 3 tags per image
	echo "  
		<script type='text/javascript'> //3.1 Check using Javascript
   		function validate1()
		{
			var lname = document.typein.landscape1.value;
			if(lname == null || lname == '')
			{
				alert('Type in landscape field! Please enter 3 tags for Image 1');
				/*return false; */ //we're not using false, because of the Bonus, we're allowing the form to proceed without dieing 
			}
	
			var cname = document.typein.city1.value;
			if(cname == null || cname == '' )
			{
				alert('Type in city field! Please enter 3 tags for Image 1');
				/*return false; */
			}
	
			var ename = document.typein.evening1.value;
			if(ename == null || ename == '' )
			{
				alert('Type in evening field! Please enter 3 tags for Image 1');
				/*return false; */
			}
	
			var mname = document.typein.movie.value;
			if(mname == null || mname == '' )
			{
				alert('Type in movie field! Please enter 3 tags for Image 2');
				/*return false; */
			}	
	
			var dname = document.typein.director.value;
			if(dname == null || dname == '' )
			{
				alert('Type in director field! Please enter 3 tags for Image 2');
				/*return false; */
			}

			var gname = document.typein.genre.value;
			if(gname == null || gname == '' )
			{
				alert('Type in genre field! Please enter 3 tags for Image 2');
				/*return false; */
			}
		
			var muname = document.typein.music.value;
			if(muname == null || muname == '' )
			{
				alert('Type in music field! Please enter 3 tags for Image 3');
				/*return false; */
			}
		
			var aname = document.typein.artist.value;
			if(aname == null || aname == '' )
			{
				alert('Type in artist field! Please enter 3 tags for Image 3');
				/*return false; */
			}	
	
			var mugname = document.typein.musicgenre.value;
			if(mugname == null || mugname == '' )
			{
					alert('Type in music genre field! Please enter 3 tags for Image 3');
					/*return false; */
			}

}

 </script>
 
 ";



?>
   <form name="typein" enctype='multipart/form-data' method='post' action='upload.php'> 
   <!--using upload.php, instead of gallery.php -> because we need to use PHP to verify 3 tags per image-->
    <h2>Image #1</h2>	
    <br>
       Landscape: <input type = "text" name = "landscape1"/>
    <br>
   	   City: <input type = "text" name = "city1"/>
    <br>
       Evening: <input type="text" name="evening1"/>
    <br>
    <input type='file' name='file1' /> <br>
    
   <h2>Image #2</h2>   
   <br>
       Movie: <input type = "text" name = "movie"/>
   <br>
   	   Director: <input type = "text" name = "director"/>
   <br>
       Genre: <input type="text" name="genre"/>
   <br>
   <input type='file' name='file2' /> <br>
    
   <h2>Image #3</h2>	
   <br>
       Music: <input type = "text" name = "music"/>
   <br>
   	   Artist: <input type = "text" name = "artist"/>
   <br>
       Music Genre: <input type="text" name="musicgenre"/>
   <br>
    <input type='file' name='file3' /> <br>

	<br> </br>
	
   <br>
   Type in your password: <input type = password name="yourpassword"/>
   </br>
   
   <input type="submit" onclick="validate1()"/> <!--using validate1() for javascript -->
	<br>
	<h2><a href="http://students.engr.scu.edu/~smangala/gallery.php">The Gallery</a></h2> <!--using to link to the gallery-->

  </form>
</html>

<?php /* 5. Checks Password */
   		$pass = ''; /*this is the password -> password not shown for secure reasons */
   	   if(isset($_POST['yourpassword'])) 
   	   {
    		$passw = $_POST['yourpassword'];
    		if(!($passw == $pass))
    		{
    		    echo "<br> Incorrect password! Please try again! </br>";
    		    die();
    		}
    		
    	}
		if ((!empty( $_POST['yourpassword'] )) && (!isset( $_SESSION['yourpassword'] ))) /*for bonus */
		/* if the password text field is not empty and if we haven't set the password yet for previous input*/
		{
			$_SESSION['yourpassword'] = $_POST['yourpassword']; /* we set the prefilled password*/
		}
		if(isset( $_SESSION['yourpassword']) && !empty( $_SESSION['yourpassword']) && empty($_POST['yourpassword'])) /*for bonus */
		/* if the prefilled password has already been set and the password field is empty*/
		{
			$_POST['yourpassword'] = $_SESSION['yourpassword']; /*we grab the prefilled password and put it in the password input field */
		}
?>


<?php /* 3.2 Check using PHP */
   if((!isset($_POST['landscape1'])) || trim($_POST['landscape1']) == "") /* if it's not set or if it's empty field -> same goes for others*/
   {
   		echo "<br> Type in landscape field! </br>";
   		echo "<br> Please enter 3 tags for Image #1 </br>";
		//die(); //we're not using die(), because of the Bonus, we're allowing the form to proceed without dieing 
   }
   
   else if((!isset($_POST['city1'])) || trim($_POST['city1']) == "")
   {
   		echo "<br> Type in city field! </br>";
   		echo "<br> Please enter 3 tags for Image #1 </br>";
		//die();
	}
	else if((!isset($_POST['evening1'])) || trim($_POST['evening1']) == "")
   {
   		echo "<br> Type in evening field! </br>";
   		echo "<br> Please enter 3 tags for Image #1 </br>";
		//die();
	}

    else if((!isset($_POST['movie'])) || trim($_POST['movie']) == "")
   {
   		echo "<br> Type in movie field! <br>";
   		echo "<br> Please enter 3 tags for Image #2 </br>";
		//die();
	}
    else if((!isset($_POST['director'])) || trim($_POST['director']) == "")
   {
   		echo "<br> Type in director field! </br>";
   		echo "<br> Please enter 3 tags for Image #2 </br>";
		//die();
	}
    else if((!isset($_POST['genre'])) || trim($_POST['genre']) == "")
   {
   		echo "<br> Type in genre field! </br>";
   		echo "<br> Please enter 3 tags for Image #2 </br>";
		//die();
	}
    else if((!isset($_POST['music'])) || trim($_POST['music']) == "")
   {
   		echo "<br> Type in music field! </br>";
   		echo "<br> Please enter 3 tags for Image #3 </br>";
		//die();
	}
    else if((!isset($_POST['artist'])) || trim($_POST['artist']) == "")
   {
   		echo "<br> Type in artist field! </br>";
   		echo "<br> Please enter 3 tags for Image #3 </br>";
		//die();
	}
    else if((!isset($_POST['musicgenre'])) || trim($_POST['musicgenre']) == "")
   {
   		echo "<br> Type in musicgenre field! </br>";
   		echo "<br> Please enter 3 tags for Image #3 </br>";
		//die();
	}
 
?>

<?php /*For bonus */
	if ((!empty( $_POST['landscape1'] )) && (!isset( $_SESSION['landscape1'] )))/*for bonus */
		/* if the password text field is not empty and if we haven't set the password yet for previous input*/
	{
		$_SESSION['landscape1'] = $_POST['landscape1']; /* we set the prefilled landscape1 field*/
	}
	if(isset( $_SESSION['landscape1']) && !empty( $_SESSION['landscape1']) && empty($_POST['landscape1']))/*for bonus */
		/* if the prefilled password has already been set and the password field is empty*/
	{
		$_POST['landscape1'] = $_SESSION['landscape1']; /*we grab the prefilled password and put it in the password input field */
	}
	
	
	if ((!empty( $_POST['city1'] )) && (!isset( $_SESSION['city1'] )))
	{
		$_SESSION['city1'] = $_POST['city1'];
	}
	if(isset( $_SESSION['city1']) && !empty( $_SESSION['city1']) && empty($_POST['city1']))
	{
		$_POST['city1'] = $_SESSION['city1'];
	}
	
	
	if ((!empty( $_POST['evening1'] )) && (!isset( $_SESSION['evening1'] )))
	{
		$_SESSION['evening1'] = $_POST['evening1'];
	}
	if(isset( $_SESSION['evening1']) && !empty( $_SESSION['evening1']) && empty($_POST['evening1']))
	{
		$_POST['evening1'] = $_SESSION['evening1'];
	}
	
	
	if ((!empty( $_POST['movie'] )) && (!isset( $_SESSION['movie'] )))
	{
		$_SESSION['movie'] = $_POST['movie'];
	}
	if(isset( $_SESSION['movie']) && !empty( $_SESSION['movie']) && empty($_POST['movie']))
	{
		$_POST['movie'] = $_SESSION['movie'];
	}
	
	
	if ((!empty( $_POST['director'] )) && (!isset( $_SESSION['director'] )))
	{
		$_SESSION['director'] = $_POST['director'];
	}
	if(isset( $_SESSION['director']) && !empty( $_SESSION['director']) && empty($_POST['director']))
	{
		$_POST['director'] = $_SESSION['director'];
	}
	
	
	if ((!empty( $_POST['genre'] )) && (!isset( $_SESSION['genre'] )))
	{
		$_SESSION['genre'] = $_POST['genre'];
	}
	if(isset( $_SESSION['genre']) && !empty( $_SESSION['genre']) && empty($_POST['genre']))
	{
		$_POST['genre'] = $_SESSION['genre'];
	}
	
	
	if ((!empty( $_POST['music'] )) && (!isset( $_SESSION['music'] )))
	{
		$_SESSION['music'] = $_POST['music'];
	}
	if(isset( $_SESSION['music']) && !empty( $_SESSION['music']) && empty($_POST['music']))
	{
		$_POST['music'] = $_SESSION['music'];
	}
	
	
	if ((!empty( $_POST['artist'] )) && (!isset( $_SESSION['artist'] )))
	{
		$_SESSION['artist'] = $_POST['artist'];
	}
	if(isset( $_SESSION['artist']) && !empty( $_SESSION['artist']) && empty($_POST['artist']))
	{
		$_POST['artist'] = $_SESSION['artist'];
	}
	
	
	if ((!empty( $_POST['musicgenre'] )) && (!isset( $_SESSION['musicgenre'] )))
	{
		$_SESSION['musicgenre'] = $_POST['musicgenre'];
	}
	if(isset( $_SESSION['musicgenre']) && !empty( $_SESSION['musicgenre']) && empty($_POST['musicgenre']))
	{
		$_POST['musicgenre'] = $_SESSION['musicgenre'];
	}

?>	    


<?php
  //Must include this PHP snippet for PHP versions lower than 5 (e.g. on the DC servers)
  if(!function_exists('file_put_contents')) {
    function file_put_contents($filename, $data, $file_append = false) {
      $fp = fopen($filename, (!$file_append ? 'w+' : 'a+'));
        if(!$fp) {
          trigger_error('file_put_contents cannot write in file.', E_USER_ERROR);
          return;
        }
      fputs($fp, $data);
      fclose($fp);
    }
  }
?>


<?php
	//for first file upload
	if(isset($_FILES['file1'])) 
	{
		$validExt = array("jpg", "jpeg", "png", "gif"); 
		$validMime = array("image/jpg", "image/jpeg", "image/png", "image/gif");
		$temp = explode(".", $_FILES["file1"]["name"]); //split a string by string so scan1.jpeg -> scan1, ., jpeg
		$extension = end($temp); //points to the last element of the array, which is jpeg
		$error = ((in_array($_FILES["file1"]["type"], $validMime)) && (in_array($extension, $validExt)));
		//in_array Checks if a value exists in an array
		//so (in_array($_FILES["file1"]["type"], $validMime) makes sure that "image/jpeg" from $validMime exists in  the file
		//and (in_array($extension, $validExt)) makes sure that "jpeg" from $validExt exists in extension value
		$filetype = $_FILES["file1"]["type"];
        
		if($error == True)
		{
			$file1 = $_FILES['file1']['tmp_name'];
	
			$destination = "./uploads/" . $_FILES["file1"]["name"];
			if (move_uploaded_file($file1, $destination)) {
				$foldername="./uploads/";
				$filename=$_FILES["file1"]["name"];
				
				if($extension == "jpeg" || $extension == "JPEG")
				{
					$jname = substr($filename, 0, (strlen($filename)-4)); 
				}
				else
				{
					$jname = substr($filename, 0, (strlen($filename)-3)); 
				}
				
				$pname = $jname."txt";
				$landscape1 = $_POST["landscape1"];
				$city1 = $_POST["city1"];
				$evening1 = $_POST["evening1"];
				//writing to a file
				file_put_contents($foldername.$pname, $landscape1.', '.$city1.', '.$evening1); //putting contents in the text file
				echo "<p>(1) The text file ". $pname . " has been created and the file ". $_FILES["file1"]["name"] . " has been uploaded.</p>";

		  }
		}
		else {
			echo "<p>(1) Sorry, there was an error uploading your file.</p>";
			echo "<p>(1) only JPG, JPEG, PNG, OR GIF files can be uploaded.</p>";
		}
      
	}
	else
	{
		echo "<p>(1) No file uploaded yet</p>";
		//for bonus, but unable to prefill the input for files field 
	/* if ((!isset( $_SESSION['file1'] ))) 
	    {
			$_SESSION['file1'] = $_FILES['file1'];
			//echo $_SESSION['landscape1'] ;
	    }
	    else
	    {
	    	if(!empty( $_SESSION['file1']))
	    	{
	    		$_FILES['file1'] = $_SESSION['file1'];
	    	}
	    }
		*/
	}
	
	
   //for second upload
   	if(isset($_FILES['file2'])) 
	{
		$validExt1 = array("jpg", "jpeg", "png", "gif"); 
		$validMime1 = array("image/jpg", "image/jpeg", "image/png", "image/gif");
		$temp1 = explode(".", $_FILES["file2"]["name"]); //split a string by string so scan1.jpeg -> scan1, ., jpeg
		$extension1 = end($temp1); //points to the last element of the array, which is jpeg
		$error1 = ((in_array($_FILES["file2"]["type"], $validMime1)) && (in_array($extension1, $validExt1)));

		if($error1 == True)
		{
			$file2 = $_FILES['file2']['tmp_name'];
	
			$destination1 = "./uploads/" . $_FILES["file2"]["name"];

			if (move_uploaded_file($file2, $destination1)) {
				$foldername1="./uploads/";
				$filename1=$_FILES["file2"]["name"];
				$checkforjpeg1 = $_FILES["file2"]["type"];
				
				if($extension1 == "jpeg" || $extension1 == "JPEG")
				{
					$jname1 = substr($filename1, 0, (strlen($filename1)-4)); 
				}
				else
				{
					$jname1 = substr($filename1, 0, (strlen($filename1)-3)); 
				}
				$pname1 = $jname1."txt";

				$movie = $_POST["movie"];
				$director = $_POST["director"];
				$genre = $_POST["genre"];
				//writing to a file
				file_put_contents($foldername1.$pname1, $movie.', '.$director.', '.$genre);

				echo "<p>(2) The text file ". $pname1 . " has been created and the file ". $_FILES["file2"]["name"] . " has been uploaded.</p>";
		  }
		}
		else {
			echo "<p>(2) Sorry, there was an error uploading your file.</p>";
			echo "<p>(2) only JPG, JPEG, PNG, OR GIF files can be uploaded.</p>";
		}
      
	}
	else
	{
		echo "<p>(2) No file uploaded yet</p>";
		/*
	    if ((!isset( $_SESSION['file2'] )))
	    {
			$_SESSION['file2'] = $_FILES['file2'];
	    }
	    else
	    {
	    	if(!empty( $_SESSION['file2']))
	    	{
	    		$_FILES['file2'] = $_SESSION['file2'];
	    	}
	    }
		*/
	}




    //for third upload
    if(isset($_FILES['file3'])) 
	{
		$validExt2 = array("jpg", "jpeg", "png", "gif"); 
		$validMime2 = array("image/jpg", "image/jpeg", "image/png", "image/gif");
		$temp2 = explode(".", $_FILES["file3"]["name"]); //split a string by string so scan1.jpeg -> scan1, ., jpeg
		$extension2 = end($temp2); //points to the last element of the array, which is jpeg
		$error2 = ((in_array($_FILES["file3"]["type"], $validMime2)) && (in_array($extension2, $validExt2)));

		if($error2 == True)
		{
		$file3 = $_FILES['file3']['tmp_name'];
	
		$destination2 = "./uploads/" . $_FILES["file3"]["name"];

		if (move_uploaded_file($file3, $destination2)) {
				$foldername2="./uploads/";
				$filename2=$_FILES["file3"]["name"];
				
				if($extension2 == "jpeg" || $extension2 == "JPEG")
				{
					$jname2 = substr($filename2, 0, (strlen($filename2)-4)); 
				}
				else
				{
					$jname2 = substr($filename2, 0, (strlen($filename2)-3)); 
				}
				
				$pname2 = $jname2."txt";
				
				$music = $_POST["music"];
				$artist = $_POST["artist"];
				$musicgenre = $_POST["musicgenre"];
				//writing to a file
				file_put_contents($foldername2.$pname2, $music.', '.$artist.', '.$musicgenre);

			echo "<p>(3) The text file ". $pname2 . " has been created and the file ". $_FILES["file3"]["name"] . " has been uploaded.</p>";
			
		  }
		}
		else {
			echo "<p>(3) Sorry, there was an error uploading your file.</p>";
			echo "<p>(3) only JPG, JPEG, PNG, OR GIF files can be uploaded.</p>";

		}
      
	}
	else
	{
		echo "<p>(3) No file uploaded yet</p>";
		/*
	    if ((!isset( $_SESSION['file3'] )))
	    {
			$_SESSION['file3'] = $_FILES['file3'];
			//echo $_SESSION['landscape1'] ;
	    }
	    else
	    {
	    	if(!empty( $_SESSION['file3']))
	    	{
	    		$_FILES['file3'] = $_SESSION['file3'];
	    	}
	    }
		*/
	}
?>
