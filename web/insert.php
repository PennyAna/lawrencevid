<?php
require("dbConnect.php");
$db = get_db();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lawrence Video</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css">
	<script src="./lawVid.js"></script>
</head>
    <body>
    <nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
            	<div class="navbar-header row">
                	<a href="index.php" class="navbar-brand nav-justified">Lawrence Family Video</a>
				</div>
				<div class="row">
            		<button class="btn navbar-btn" onclick="location.href='insert.php'">Add New Movie</button>
					<button class="btn navbar-btn" onclick="location.href='alpha.php'">Search Alphabetically</button>
				</div>
			</div>
    	</nav>
        <div class="container-fluid">
            <div class="row">
                <form name="newMovieForm" class="form-group col-9 changeMovieForm" id="newMovieForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <fieldset>
                        <legend>New Movie</legend>
                        <label for="titleName0" class="sr-only">Movie Title: </label>
                        <h5>Add New Movie Name</h5>
                        <input type="text" id="titleName0"  name="titleName0" placeholder="Movie Title"required>
                        </input>
                        <label for="titleInfo0" class="sr-only">Movie Description: </label>
                        <h5>Add New Movie Description</h5>
                        <textarea rows="5"cols="20" id="titleInfo0" name="titleInfo0"  placeholder="Brief Movie Description"></textarea>
                        <label for="genreName0" class="sr-only">Movie Genre: </label>
                        <h5>Add New Movie Genre</h5>
                        <select id="genreName0" name="genreName0">                           <option value="" selected>Choose Genre</option>
                            <option name="genre0" value='genre0' selected>Choose Genre</option>
                            <option name="horror" value='horror'>Horror</option>
                            <option name="fantasy" value='fantasy'>Fantasy</option>
                            <option name="action"
                            value='action'>Action</option>
                            <option name="adventure" value='adventure'>Adventure</option>
                            <option name="comedy" value='comedy'>Comedy</option>
                            <option name="drama" value='drama'>Drama</option>
                            <option name="historical" value='historical'>Historical</option>
                            <option name="mystery" value='mystery'>Mystery</option>
                            <option name="documentary" value='documentary'>Documentary</option>
                            <option name="romance" value='romance'>Romance</option>
                            <option name="science fiction" value='science fiction'>Science Fiction</option>
                            <option name="thriller" value='thriller'>Thriller</option>
                            <option name="western" value='western'>Western</option>
                            <option name="animation" value='animation'>Animation</option>
                            <option name="kids" value='kids'>Kids</option>
                            <option name="television" value='television'>Television</option>
                            <option name="musical" value="musical">Musical</option>
                        </select>
                        <button type="submit" class="btn" id="addBtn0" name="addBtn0">Add New Movie</button>
                        <button type="reset" class="btn" id="resetBtn0">Reset Movie Info</button>
                    </fieldset> 
                </form> 
                <br><br>
                <div id="newMovieResults" name="newMovieResults">
                    <?php 
                        if (isset($_POST['titleName0']) && $_POST['titleName0'] != "") {
                        try {
                            $name = strtolower($_POST['titleName0']);
                            $info = strtolower($_POST['titleInfo0']);
                            $genre = strtolower($_POST['genreName0']);
                            $query5 = "INSERT INTO title (titlename, titleinfo, genre) VALUES ('$name', '$info', '$genre')";
                            if ($db->exec($query5)) {
                                echo "<p> '$name' was added successfully! </p>";
                                echo "<div class='table-responsive'> <table class='table'>";
                                echo "<thead><tr><th>Movie Title</th><th>Movie Description</th><th>Movie Genre</th></tr></thead>";
                                echo "<tbody><tr><td>";
                                echo ucwords($name); 
                                echo "</td><td>";
                                echo ucfirst($info);
                                echo "</td></tr></tbody></table></div>";
                            }
                        }       
                        catch(PDOException $ex) {
                            echo "Error connecting to DB. Details: $ex";
                            die();
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
