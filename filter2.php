<html>

<head>
    <title>
        Search Results
    </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel = "stylesheet" href = "style1.css" > </link>
</head>

<body>

<?php
	$con = mysqli_connect("localhost", "root", "", "news");
	if (!$con) 
    {
		die('Could not connect: ');
	}

    //$_SESSION['categ'] = $_GET['categ'];
    $category0 = $_POST['categ'];
	$result = mysqli_query($con, "SELECT * FROM news where news.category like '%$category0%'");

	//echo "<html><body>";
	echo "<h2 style='color:firebrick'>Breaking News!!!</h2>";

	while($row = mysqli_fetch_array($result)){
        echo "<table border='1'><tr><th>newsid</th><th>Producer</th><th>Date</th><th>Category</th></tr>";
		echo "<tr>";
		echo "<td>" . $row['newsid'] . "</td>";
		echo "<td>" . $row['producer'] . "</td>";
		echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
		echo "</tr>";
        echo "</table>";
        echo "<h3>" . $row['title'] .  "</h3>";
        echo "<h4>" . $row['content'] ."</h4>";
	}
	
	//echo "</body></html>";
	mysqli_close($con);
?>

</body>

</html>