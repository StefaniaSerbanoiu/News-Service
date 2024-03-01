<html>


<head>
    <title>
       Search
    </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel = "stylesheet" href = "style1.css" > </link>
</head>


<body>
    <h2>Filter the news to match your interests</h2>
    <br>
    
    <form method = "post" action = "filter1.php">
        Start date: <input type = "date" name = "start"/>
        End date: <input type = "date" name = "end"/>
        <br>
        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Filter by date" name="filter1">
    </form>
    <br>
    <br>
    <form method = "post" action = "filter2.php" >
         Category: <input type = "text" name = "categ"/>
        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Filter by category" name="filter2">
    </form>
    <script>
    // Get the URL query string
    var queryString = window.location.search;

    // Parse the query string to get the parameter values
    var urlParams = new URLSearchParams(queryString);
    var startDate = urlParams.get('start');
    var endDate = urlParams.get('end');
    var category = urlParams.get('category');

    // Set the values of the date range filter inputs
    document.getElementById('start').value = startDate;
    document.getElementById('end').value = endDate;

    // Set the value of the category filter input
    document.getElementById('category').value = category;
  </script>

</body>

</html>