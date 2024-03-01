<html>

<head>
    <title>
        News
    </title>
    <link rel = "stylesheet" href = "style1.css" > </link>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>



<?php
        $con = mysqli_connect("localhost", "root", "", "news");
        if (!$con) {
            die('Could not connect: ');
        }

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        

        //mysqli_query($con, "insert into Students values(3,'aaa','pass',23)");
        $result = mysqli_query($con, "SELECT * FROM Users");

        //echo "<html><body>";
        echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Password</th></tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        //echo "</body></html>";
        mysqli_close($con);
    ?>
    <body>
        <!-- greeting -->
        <h2>Hello! This are today's news:</h2>

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

        <form action="addNews.php" method="post">
            Title: <input type="text" name="title1">
            Content: <input type="text" name="content1">
            Producer: <input type="text" name="producer1">
            Date: <input type="date" name="date1">
            Category: <input type="text" name="category1">
            </br>
            <input class="btn btn-danger" type="submit" value="Submit by clicking here!">
        </form>


        
        <!-- news part-->
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
            echo '<div onclick="window.location.href=\'http://localhost/Projects/WP/news/update.php?newsid=' . $row['newsid'] . '\'" class="selectable">';
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
            
            echo "<button class='buttons'>Edit</button>
            <button class='buttons'>Delete</button>";
        echo "</div>";
        }
        
        //echo "</body></html>";
        mysqli_close($con);


        echo "<form method='post' action = 'welcome.html'>";
        echo "<input type='submit' class='btn btn-danger btn-block' value='Go back'>";
        echo "</form>";

        exit();

?>


</body>

</html>

