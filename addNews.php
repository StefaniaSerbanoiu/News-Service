<?php
	$con = mysqli_connect("localhost", "root", "", "news");
	if (!$con) 
    {
		die('Could not connect: ');
	}

    if(isset($_POST['title1']) && isset($_POST['content1']) && isset($_POST['producer1']) && isset($_POST['date1']) && isset($_POST['category1']))
    {
    $title1 = $_POST['title1'];
    echo $title1;
    $content1 = $_POST['content1'];
    $date1 = $_POST['date1'];
    $producer1 = $_POST['producer1'];
    $category1 = $_POST['category1'];
    $random_number = rand(1, 100);
    if(preg_match('/\d/', $_POST['producer1']) == 0 && preg_match('/\d/', $_POST['category1']) == 0)
    {
        $result = mysqli_query($con, "INSERT INTO news (newsid, title, content, producer, date, category) values ('".$random_number."','".$title1."','".$content1."','".$producer1."','".$date1."','".$category1."')");

        if (!$result) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }

        echo "<h2 style='color:firebrick'>Breaking News!!!</h2>";
    }
    
    }
    

	mysqli_close($con);
    header("Location: newsService.php");
    exit();
?>
