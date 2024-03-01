<html>
<head>
    <link rel = "stylesheet" href = "style1.css" > </link>
</head>
</html>




<?php
	$con = mysqli_connect("localhost", "root", "", "news");
	if (!$con) 
    {
		die('Could not connect: ');
	}

    $id = $_GET['newsid'];

    //DELETE ARTICLE HERE
    echo "<form method='post' onSubmit='return confirm(\"Are you sure you want to delete this article?\")'>";
    echo "<input type='submit' name ='submit' value='Delete this article'>";
    echo "</form>";

    if (isset($_POST["submit"])) 
    {
        $query = "DELETE FROM news WHERE newsid = $id";
        
        //execute the query and handle any errors 
        $result = mysqli_query($con, $query);
        if (!$result)
        {
            die("Query execution failed: " . mysqli_error($connection));
        }

        mysqli_close($con);
        header("Location: newsService.php");
        exit();
    }

    //UPDATE ARTICLE HERE
    echo "<form method='post' onSubmit='return confirm(\"Are you sure you want to delete this article?\")'>";
    echo "Content: <input type='text' name='content1'>";
    echo "Producer: <input type='text' name='producer1'>";
    echo "Date: <input type='date' name='date1'>";
    echo "Category: <input type='text' name='category1'>";
    echo "<input type='submit' name='submit3' value='Submit by clicking here!'>";
    echo "</form>";

    if (isset($_POST["submit3"])) 
    {
        $content1 = $_POST['content1'];
        $producer1 = $_POST['producer1'];
        $date1 = $_POST['date1'];
        $category1 = $_POST['category1'];
        if(preg_match('/\d/', $_POST['producer1']) == 0 && preg_match('/\d/', $_POST['category1']) == 0)
         {
           $query = "UPDATE news SET content = '$content1', producer = '$producer1', date = '$date1', category = '$category1' WHERE newsid = $id;";

            //execute the query and handle any errors 
            $result = mysqli_query($con, $query);
            if (!$result)
            {
                die("Query execution failed: " . mysqli_error($connection));
            }
        }
    }
    
    echo "<form method='post' action = 'newsService.php'>";
    echo "<input type='submit' value='Go back'>";
    echo "</form>";

    exit();
?>
