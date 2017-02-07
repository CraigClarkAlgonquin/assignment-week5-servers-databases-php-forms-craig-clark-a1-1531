<?php
	$input_success = false;
	$output_message = "Please enter your name and email address";
	
	if (isset($_GET["insert-data"])) { // sanitizing $_GET array - removes html
		foreach ($_GET as $k => $v) {
			$_GET[$k] = trim(filter_var($_GET[$k], FILTER_SANITIZE_STRING));
		}
		
		if ($_GET["full-name"]) { // check to see if the url $_GET has a value
			$full_name = $_GET["full-name"]; //$_GET is getting $full_name from the URL
		} else {
			$output_message = "<p>Full name is required</p>";
		}
		
		
	}
	
	
	?>

<!DOCTYPE html>

<html lang="<?php include './php/global-variables.php'; print $language;?>">
<head>
    <title>
    	<?php 
            $page_title = "Student Registration Form";
            print $page_title;
         ?>
    </title>
    
    <?php include './php/head.php';?>
    
</head>

<body>
    <header>
        <h1><?php print $page_title; ?></h1>
        <?php include './php/navigation.php';?>
    </header>

    <aside>
        <blockquote>
            <p>Age is an issue of mind over matter. If you don't mind, it doesn't matter.<br>
            - Mark Twain</p>
        </blockquote>
    </aside>

    <section>
        <article>
            <form method="get" action="index.php">
                <fieldset>
                    <legend><i class="fa fa-pencil" aria-hidden="true"></i>Student Registration</legend>

                    <div>
                        <label for="full-name"><i class="fa fa-user" aria-hidden="true"></i>Full name</label> 
                        <input type="text" name="full-name" id="full-name" value="<?php if (!$input_success && isset($full_name)) { print $full_name;} ?>">
                    </div>

                    <div>
                        <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i>Email</label> 
                        <input type="text" name="email" id="email" value="">
                    </div>

                    <div>
                        <input type="checkbox" name="student" id="student" value="is-a-student">
                        <label for="student"><i class="fa fa-desktop" aria-hidden="true"></i>Student of Multimedia</label>
                        <div class="hidden-info">
	                        <input type="radio" name="major" id="web-scripting" value="web-scripting">
	                        <label for="web-scripting"><i class="fa fa-code" aria-hidden="true"></i>Web Scripting</label><br>
	                        <input type="radio" name="major" id="web-design" value="web-design">
	                        <label for="web-design"><i class="fa fa-paint-brush" aria-hidden="true"></i>Web Design</label>
	                        <select name="course-load">
	                            <option value="" disabled selected>
	                                <label>Course load</label>
	                            </option>
	
	                            <option id="ful-time" value="full-time">
	                                <label for="full-time">Full-time</label>
	                            </option>
	
	                            <option id="part-time" value="part-time">
	                                <label="part-time">Part-time</label>
	                            </option>
	                        </select>
                    	</div>

                    </div>

                    <div>
                        <input type="submit" id="insert-data" name="insert-data" value="Insert Data">
                    </div>
                </fieldset>
            </form>

            <div id="data" class="data">
	            
             
                <?php
	                
		        print $output_message . "<br> ";
	        
	                ?>
                <p><a href="index.php"><strong>Reset form</strong></a></p>

            </div>
        </article>
    </section><?php include './php/footer.php';?>
</body>
</html>