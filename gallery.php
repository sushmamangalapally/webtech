<?php
function getimage() //7.  Image Display: Display all images 
{
	foreach (glob("uploads/*.*") as  $path)
	{
	       // echo $filename;
	       // echo   "<br/>";  
	     // echo basename($path, "uploads/");  //prints out tree.jpg 
	        $filename = basename($path, "uploads/"); //prints out each image name like tree.jpg
	        $ext =  explode(".", $filename); //will separate using the period 
	      // echo $ex[1];
	       // echo "<br/>";
	      // echo $ext[0];
	        $title = $ext[0]; //prints the title of the image
	        $check = $ext[1]; //prints out type of the image like jpg, jpeg...
	        $pname = $title.".txt"; //then we use this to grab the text file to print out the name
	       if($check == "jpeg" || $check == "jpg" || $check == "png" || $check == "gif") //makes sure the file is valid for image type
	        {
	        		$string = $_SERVER['QUERY_STRING']; //retrieves & gets query string from URL in PHP
	        		if($string == "" || $string = NULL) //if the website does not have query string yet -> http://students.engr.scu.edu/~smangala/gallery.php
	        		{
	                   echo '<div class="forimage">'; //for mulit-column layout
			      	   	echo "<img class='imge' src='" . $path  . "' alt='".$title."'>"; //prints out the image
				      	 echo '<div class="fortext">'; //print words on the bottom of the image
				      		readTagFile($pname); //then prints out the words related to the picture
		               	 echo '</div>';
		               echo '</div>';
		            }
		            else 
		            {
		              if(isset($_GET["sea"])) //for searching text
		              {
		               	$sea = $_GET["sea"];
	   					$stri = file_get_contents('uploads/'.$pname); //grabs the text file
	        			$spos1 = strpos($stri, $sea); //goes through the words in the text and compares the word
	        			if($spos1 !== false) //if the word exist
						{
	                    	echo '<div class="forimage">';
			      	   			echo "<img class='imge' src='uploads/" . $title.".".$check  . "'alt='".$title."'>"; //prints out the image
				       				echo '<div class="fortext">'; //print words on the bottom of the image
				      					readTagFile($pname); //then prints out the words related to the picture
		               				echo '</div>';
		               		echo '</div>';
		               } 

		              }
		              else //if we click the words from the navigation bar
		              {
		               	$tagin = substr($_SERVER['QUERY_STRING'], 4); //sea=word -> this removes 4 characters, which leaves behind 'word'
		               	$tagin1 = str_replace('%20',' ' , $tagin); //since the URL replaces whitespace with %20 so I used str_replace function to replace %20 with whitespace
	        			$str = file_get_contents('uploads/'.$pname); //grabs the text file
	        			$spos = strpos($str, $tagin1);//goes through the words in the text and compares the word
						if($spos !== false) //if the word exist
						{
	                    	echo '<div class="forimage">';
			      	   			echo "<img class='imge' src='uploads/" . $title.".".$check  . "'alt='".$title."'>"; 
				       				echo '<div class="fortext">';
				      					readTagFile($pname);
		               			echo '</div>';
		               		echo '</div>';
		               } 
		            }
		      }
	 	}
	 }
}

function readTagFile($jname)  //8.  Tag Display: Display an image’s tags underneath the image
{
     /*  echo $jname."<br>"; */
      $mname = "uploads/".$jname; //grabs title to find in the folder
     /*  echo $mname."<br>"; */
       $fp = fopen($mname, "r") or die("Unable to open file!"); //opens the file 
	   echo "<br/>";
	   
	   while(!feof($fp)) //use while loop and stops up to the end of the file
	   {
	   		$get = fgets($fp, 4096); //grabs string of each line
	   		$parse = explode(",", $get); //separates the comma
	   		for($i=0; $i < count($parse); $i++) //goes through list of 3 words
	   		{
	   			echo $parse[$i]."	"; //prints word
	   		}
	   }
	   
       fclose($fp); //closes fp 
}

function printtagforsidebar() //9. Filtering: Display all tags as a sidebar
{
	foreach (glob("uploads/*.*") as  $path) //goes each files in the folder of upload
	{
	        $filename = basename($path, "uploads/"); //prints out each image name like tree.jpg
	        $ext =  explode(".", $filename);  //will separate using the period
	        $title = $ext[0]; //prints the title of the image
	        $check = $ext[1]; /*prints out type of the image */
	        $pname = $title.".txt";
	        if($check == "jpeg" || $check == "jpg" || $check == "png" || $check == "gif") //again, makes sure it's correct image file
	        {
				       $mname = "uploads/".$pname;
       				   $fp = fopen($mname, "r") or die("Unable to open file!");
	   					while(!feof($fp))
	   					{
					   		$get = fgets($fp, 4096);
					   		$parse = explode(",", $get);
					   		for($i=0; $i < count($parse); $i++)
	   						{
	   							echo '<br><a href= "gallery.php?tag='.$parse[$i].'">'.$parse[$i].'</a></br>'; //10. Filtering: Make the tags in the sidebar links
	   							//if the tag, which is from SERVER[QUERY_STRING], matches the word from the text 
	   							echo "<br>";
	   						}
	   					}
	   
       					fclose($fp);
		               echo "<br/>";
			 }
	}
}


function printresult() //for formatting/stying 
{
  echo "<br>";
	if($_SERVER['QUERY_STRING'] != NULL)
	{
		if(isset($_GET["sea"])) //for searching
		{
			echo "Only showing images with tag: <b>".$_GET["sea"]."</b>";
		}
		else //for clickable links on the navigation bar
		{
			$fortag1 = substr($_SERVER['QUERY_STRING'], 4);
			$fortag2 = str_replace('%20',' ' , $fortag1);
			$fortag3 = str_replace('+',' ' , $fortag2);
			echo "Only showing images with tag: <b>".$fortag3."</b>";
		}

	}
}

?>
   
<html>
  <head lang = "en">
	<link rel="stylesheet" href = "gallerystyle.css" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width" />
	<title>The Gallery</title>
  </head>

   <!--<h2>Accessing and Reading Files</h2>-->
  <body>
    <div id="header">
   		<h3> The Gallery </h3>
   	</div>
    <nav> 
      <h2>Tags</h2>  
           
      <?php
         printtagforsidebar();
       ?>

    </nav>
  	<div id="wrapper">
  			<div class = "fortop"> 
  				<form action='gallery.php' method='GET'>
  					Search for specific tags: <input type='text' name="sea"/>
   					<input type="submit" value="Submit!"/>
  		  		<?php
  					printresult();
  				?>
  				</form>
  			</div>  
  		<div class="main">
  			<div class="transbox1">
   				<?php
   		    		getimage();
          		?>
			</div>
		</div>
  	</div>
  </body>

</html>





