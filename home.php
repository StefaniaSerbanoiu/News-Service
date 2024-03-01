<html>

<head>
    <title>
        Home
    </title>
    <html>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel = "stylesheet" href = "style1.css" > </link>
    <style>
        body {
            background-image: linear-gradient(to right, red , yellow);
        }
    </style>

    
</head>

<body>
    <?php
    define("title", "News");
    $news = '';
    if (isset($_GET['news'])) {
        $news = $_GET['news'];
    }
    $producer = "-";
    //declare new empty date variable
    $date1 = null;
    $category = "";
    ?>

<form method='post' action = 'welcome.html'>
    <input type='submit' class="btn btn-light btn-lg" value='Go back'>
    </form>

    <form action = "advanced.php">
        <input type="submit" class="btn btn-light btn-lg" name="Advanced Search" value="Filter" />
    </form>

<?php
	$con = mysqli_connect("localhost", "root", "", "news");
	if (!$con) 
    {
		die('Could not connect: ');
	}

	$result = mysqli_query($con, "SELECT * FROM news");

	//echo "<html><body>";
	echo "<h2 style='color:black'>Breaking News!!!</h2>";

	while($row = mysqli_fetch_array($result)){
        echo "<div style='border: 5px solid white; padding: 10px;'>";
		echo "<tr>";
		echo "<td>" . $row['producer'] . "</td>-----";
		echo "<td>" . $row['date'] . "</td>-----";
        echo "<td>" . $row['category'] . "</td>";
		echo "</tr>";
        echo "</table>";
        echo "<h3>" . $row['title'] .  "</h3>";
        echo "<h4>" . $row['content'] ."</h4>";
	}
	
	mysqli_close($con);
?>


   

</body>

</html>