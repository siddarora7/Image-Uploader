<?php
  include("login.php"); //to include the login.php file
?>
<?php
include("header.php");
?>

<div id="content">
	<form method="post" action="index.php" enctype="multipart/form-data">
	<input   type="hidden" accept =".jpeg,.png,.gif" name="size" value="10000000">
		<div>
		<input type="file" name="image">
		</div>
		<div>
			<textarea name="text" cols="30" rows="3" placeholder=" Enter Your desired caption...">
				
			</textarea>
		</div>
		<div>
			<input type="submit" name="upload" value="Upload Image">
		</div>
	</form>
	

<?php  
//UPLOADING 
error_reporting(0);
 $message = "";
 //check if the upload button is pressed
if (isset($_POST['upload'])) 
{
	//We are specifing where to store the images
	$target = "".basename($_FILES['image']['name']);

//now connect to database
	$db = mysqli_connect($dbhost, $dbuser, $dbpass , "photos");


	//Transfer all the data collected from the form to the database

	$image = $_FILES['image']['name'];
	$text = $_POST['text'];


	$sql = "INSERT INTO images (image, text) VALUES ('$image' , '$text')";
	mysqli_query($db, $sql);
	//This is uses to upload the submitted form data to the database : images

	// TO copy the images to ta folder called assignment_1

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target )) 
	{
	$message = "Image has been uploaded succcessfully";
	}
	else
	{
		$message = " There was a problem uploading image";
	}

mysqli_close($db);
}



?>
<?php
	//CREATING PAGINATION AND DISPLAYING IMAGES
	$db_1 = mysqli_connect($dbhost, $dbuser, $dbpass, "photos"); //connecting to database
	$tbl_name="images";
	$adjacents = 3;
	$num=0;
	$query = "SELECT COUNT(*) as num FROM $tbl_name ORDER BY id DESC"; //getting in data in descending order
	//echo num;
	$total_pages = mysqli_fetch_array(mysqli_query($db_1,$query));
	$total_pages = $total_pages[$num];

	$t_page = "index.php";
	$limit = 10;
	$page = $_GET['page'];
	if ($page) 
	{
		$start = ($page - 1)* $limit;

	}
	else
	{
		$start = 0;

	}
	$col_name = "SELECT image , text FROM $tbl_name ORDER BY id DESC LIMIT $start , $limit ";

	if($page == 0)
	{
		$page = 1;

	}
	$prev = $page - 1;
	$next = $page + 1;
	$l_page = ceil($total_pages/$limit);
	$lpm1 = $l_page - 1;

	$page_it = "";
	//Conditions for next , previous and "1" , "2", ...... page links
	if($l_page>1)
		{//For Previous link
			$page_it .="<div class=\"page_it\">";
			if ($page > 1) 
			{
				$page_it.= "<a href=\"$t_page?page=$prev\"> Previous </a>";
			}
			else
			{
				$page_it.= "<span class=\"disabled\">Previous </span>";
			}

			if ($l_page < 7 + ($adjacents*2)) 
			{
				for ($page_no=1; $page_no < 4 + ($adjacents*2); $page_no++) 
				{ 
					if ($page_no == $page) 
					{
						$page_it.= "<span class=\"current\">$page_no </span>";
					}
					else
					{
						$page_it.= "<a href=\"$t_page?page=$page_no\">$page_no </a>";
					}
				}
				

			}
			elseif ($l_page>5 + ($adjacents *2)) 
			{
				if($page < 1 + ($adjacents*2))
				{
					for ($page_no=1; $page_no < 4 + ($adjacents*2); $page_no++) 
					{ 
						if ($page_no == $page) 
						{
							$page_it.= "<span class =\"current\">$page_no </span>";
						}
						else
						{
							$page_it.= "<a href=\"$t_page?page=$page_no\">$page_no </a>";
						}
						$page_it.= "..";
						$page_it.= "<a href=\"$t_page?page=$lpm1\">$lpm1 </a>";
						$page_it.="a href=\"$t_page?page=$l_page\">$l_page </a>";	
					}

				}
			
			elseif($l_page - ($adjacentss * 2) > $page && $page > ($adjacentss * 2))
			{
				$page_it.= "<a href=\"$t_page?page=1\">1 </a>";
				$page_it.= "<a href=\"$t_page?page=2\">2 </a>";
				$page_it.= "...";
				for ($page_no = $page - $adjacentss; $page_no <= $page + $adjacentss; $page_no++)
				{
					if ($page_no == $page)
						{
							$page_it.= "<span class=\"current\">$page_no </span>";
						}
					else
					{
						$page_it.= "<a href=\"$t_page?page=$page_no\">$page_no </a>";					
					}
				}
				$page_it.= "...";
				$page_it.= "<a href=\"$t_page?page=$lpm1\">$lpm1 </a>";
				$page_it.= "<a href=\"$t_page?page=$l_page\">$l_page </a>";

			}
			else
			{
				$page_it.= "<a href=\"$t_page?page=1\">1 </a>";
				$page_it.= "<a href=\"$t_page?page=2\">2 </a>";
				$page_it.= "...";
				for ($page_no = $l_page - (2 + ($adjacentss * 2)); $page_no <= $l_page; $page_no++)
				{
					if ($page_no == $page)
						$page_it.= "<span class=\"current\">$page_no </span>";
					else
						$page_it.= "<a href=\"$t_page?page=$page_no\">$page_no </a>";					
				}
			}    
    
    }
    	//Code for Next link
    if($page < $page_no-1)		
    {
    		$page_it.= "<a href=\"$t_page?page=$next\"> Next</a>";
			}
		else
		{
			$page_it.= "<span class=\"disabled\"> Next</span>";
		}
		$page_it.= "</div>\n";	
	}

	//Displaying images
	$result = mysqli_query($db_1, $col_name);
	while ($row = mysqli_fetch_array($result))
		{
          echo "<div id ='img_div'>";
          		echo "<img src='".$row['image'
          		]."'>";
          		echo "<p>".$row['text']."</p>";
          echo "</div>";
		}		
mysqli_close($db_1);


?>
<?=$page_it?>
</div>
	<?php
	include("footer.php");
	?>

	
