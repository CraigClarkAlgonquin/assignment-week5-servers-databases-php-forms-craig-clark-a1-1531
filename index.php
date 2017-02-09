<?php
	// declare some variables
	$input_success = false;
	$output_message = null;

	
	if (isset($_POST["insert-data"])) { // sanitizing $_POST array - removes html
		foreach ($_POST as $k => $v) {
			$_POST[$k] = trim(filter_var($_POST[$k], FILTER_SANITIZE_STRING));
		}
		
		if ($_POST["full-name"]) { // check to see if the url $_POST has a value
			$full_name = $_POST["full-name"]; //$_POST is getting $full_name		
			} else {
			$output_message .= "<p>Full name is required.</p>";
		}
		
		if ($_POST["email"]) {
			if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$email = $_POST["email"];
			} else {
				$_POST["email"] = NULL;
			}
		}
		
		if (!isset($email)) {
			$output_message .= "<p>A valid email address is needed.</p>";
		}	
		
		if (isset($_POST ["student"])) {
			$student_checked = "checked";
		}
		
		if (isset($full_name) && isset($email) && !isset($student_checked)) {
			$input_success = true;
			$output_message = "<p>Hello $full_name.<br> Thank you for your submission. You are not registered in any of the current programs. We are going to email you at <a href=\"mailto:$email\">$email</a> if any new programs are opened.</p>";
		}
		
		if (isset($_POST["major"])) {
			$major = $_POST["major"];
		} else {
			$major = null;
		}
		
		if (isset($_POST["course-load"])) {
			$course_load = $_POST["course-load"];
		} else {
			$course_load = null;
		}
		
		if (isset($student_checked) && !isset($major)) {
			$output_message .= "<p>You need to select a major, either 'Web Scripting' or 'Web Design'.</p>";
		}
		
		if (isset($student_checked) && !isset($course_load)) {
			$output_message .= "<p>You need to select a course load, either 'Full-time' or 'Part-time'.</p>";
		}
		
		if (isset($full_name) && isset($email) && isset($major) && isset($course_load)) {
			$input_success = true;
			$output_message = "<p>Hello $full_name. You are registered as follows:</p>
								<ul>
									<li><strong>Name:</strong> $full_name</li>
									<li><strong>Email:</strong> $email</li>
									<li><strong>Major:</strong> $major</li>
									<li><strong>Course load:</strong> $course_load</li>
								</ul>
								<p>We are going to email you at <a href=\"mailto:$email\">$email</a> if there are any changes with your program.</p>
								";
		}
		
		
		
		
	}
	
	
	?>

<!DOCTYPE html>

<html lang="<?php include './php/global-variables.php'; print $language;?>">
<head>
    <title>
    	<?php 
            $page_title = "Student Registration";
            print $page_title;
         ?>
    </title>
    
    <?php include './php/head.php';?>
    
</head>

<body>
    <header>
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
            <form method="post" action="index.php">
                <fieldset>
                    <legend><i class="fa fa-pencil" aria-hidden="true"></i><?php print $page_title; ?></legend>

                    <div>
                        <label for="full-name"><i class="fa fa-user" aria-hidden="true"></i>Full name</label> 
                        <input type="text" name="full-name" id="full-name" value="<?php if (!$input_success && isset($full_name)) { print $full_name;} ?>">
                    </div>

                    <div>
                        <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i>Email</label> 
                        <input type="text" name="email" id="email" value="<?php if (!$input_success && isset($email)) { print $email;} ?>">
                    </div>

                    <div>
                        <input type="checkbox" name="student" id="student" value="is-a-student" <?php if (!$input_success && isset($student_checked)) { print $student_checked;} ?>>
                        <label for="student"><i class="fa fa-desktop" aria-hidden="true"></i>Student of Multimedia</label>
                        <div class="hidden-info">
	                        <input type="radio" name="major" id="major" value="Web Scripting" <?php if (!$input_success && isset($major) && $major === "Web Scripting") { print "checked";} ?>>
	                        <label for="web-scripting"><i class="fa fa-code" aria-hidden="true"></i>Web Scripting</label><br>
	                        <input type="radio" name="major" id="major" value="Web Design" <?php if (!$input_success && isset($major) && $major === "Web Design") { print "checked";} ?>>
	                        <label for="web-design"><i class="fa fa-paint-brush" aria-hidden="true"></i>Web Design</label>
	                        <select name="course-load">
	                            <option value="" disabled selected>
	                                <label>Course load</label>
	                            </option>
	
	                            <option id="course-load" value="Full-time" <?php if (!$input_success && isset($course_load) && $course_load === "Full-time") { print "selected=true";} ?>>
	                                <label for="full-time">Full-time</label>
	                            </option>
	
	                            <option id="course-load" value="Part-time <?php if (!$input_success && isset($course_load) && $course_load === "Part-time") { print "selected=true";} ?>">
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
	                
		            if (empty($output_message)) {
		                print "Please enter your full name and a valid email address.";
		            }
		                
	                
					print $output_message;
					//SHOW ARRAY FOR TESTING
					//print "<hr><pre>\$_GET ";
					//print_r($_POST);
					//print "</pre>";
	        
	            ?>
            </div>
        </article>
        
    </section><?php include './php/footer.php';?>
</body>
</html>