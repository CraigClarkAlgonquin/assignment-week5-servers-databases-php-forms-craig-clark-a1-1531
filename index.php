<!DOCTYPE html>

<html lang="<?php include './php/global-variables.php'; print $language;?>">
<head>
    <title><?php 
            $page_title = "Student Registration Form";
            print $page_title;
            ?></title><?php include './php/head.php';?>
</head>

<body>
    <header>
        <h1><?php print $page_title; ?></h1><?php include './php/navigation.php';?>
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
                        <input type="text" name="full-name" id="full-name" value="">
                    </div>

                    <div>
                        <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i>Email</label> 
                        <input type="text" name="email" id="email" value="">
                    </div>

                    <div>
                        <input type="checkbox" name="student" id="student" value="is-a-student">
                        <label for="student"><i class="fa fa-desktop" aria-hidden="true"></i>Student of Multimedia</label>
                    </div>

                    <div class="hidden-info">
                        <input type="radio" name="major" id="web-scripting" value="web-scripting">
                        <label for="web-scripting"><i class="fa fa-code" aria-hidden="true"></i>Web Scripting</label><br>
                        <input type="radio" name="major" id="web-design" value="web-design">
                        <label for="web-design"><i class="fa fa-paint-brush" aria-hidden="true"></i>Web Design</label>
                    </div>

                    <div class="hidden-info">
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
       

                    <div>
                        <input type="submit" id="insert-data" name="insert-data" value="Insert Data">
                    </div>
                </fieldset>
            </form>

            <div id="data" class="data">
                <p>Lorem ipsum dolor sit.</p>

                <p>Lorem ipsum dolor sit.</p>
            </div>
        </article>
    </section><?php include './php/footer.php';?>
</body>
</html>
