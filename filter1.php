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

	$start0 = $_POST['start'];
	$end0 = $_POST['end'];
	$result = mysqli_query($con, "SELECT * FROM news where news.date between '$start0' and '$end0'");

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
	
	mysqli_close($con);
?>

</body>

</html>