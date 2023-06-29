<?php 
   require_once('./php/handlePage.php');   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/page.css">
    <title>Events</title>
</head>
<body>
    <header>
        <div class="logo">
            STUDENT SYSTEM
        </div>
        <div class="menu">
            <ul>
                <li><a href="postEvent.php" class="filter active">Book a Visit</a></li>
                <li><a href="getEvents.php" class="filter">Completed Visits</a></li>
            </ul>
        </div>
        <div class="buttons">
            <a href="login.php" class="button">Logout</a>
        </div>
    </header>
    <div id="section">
        <div id="add-event">
            <form method="post" action="addEvent.php" class="form-box" id="eventForm">
                <h4>Full Name</h4>
                <input 
                    type="text"
                    name="studentName" 
                    value="<?php echo $studentName?>" 
                    <?php echo $disableField?>
                />
                <h5 class="form-error" id="studentNameE"><h5>
                <h4> Matric Number </h4>
                <input 
                    type="text" 
                    name="matric"
                    value="<?php echo $studentMatric?>"
                    disabled
                />
                <h5 class="form-error" id="matricE"></h5>
                <h4> Department </h4>
                <select 
                    name="department" 
                    <?php echo $disableField?>
                >
                    <?php
                        echo $departments;
                    ?>
                </select>
                <h5 class="form-error" id="departmentE"></h5>
                <h4>Title</h4>
                <input
                    type="text"
                    name="title"
                    id="title"
                />
                <h5 class="form-error" id="titleE"></h5>
                <h4> Date</h4>
                <input
                    type="date"
                    name="date"
                    id="date"
                />
                <h5 class="form-error" id="dateE"></h5>
                <h4>Location</h4>
                <select 
                    name="venue"
                    id="venue"
                >
                    <option>Shell </option>
                    <option>Oando </option>
                    <option>System Specs Limited </option>
                    <option>Paystack</option>
                    <option>Afrilight </option>
                    <option>KPMG </option>
                    <option>Jumia </option>
                    <option>Konga</option>
                    <option>LG</option>
                    <option>Samsung</option>
                </select>
                <h5 class="form-error" id="venueE"></h5>
                <h4>Visit Description</h4>
                <textarea 
                    name="description" 
                    placeholder="Visit Description"
                ></textarea>
                <h5 class="form-error" id="descriptionE"></h5>
                <div id="error"></div>
                <input type="submit" value="Submit Visit Request" id="submit-event">
            </form>
        </div>
    </div>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/handlePage.js"></script>
</body>
</html>