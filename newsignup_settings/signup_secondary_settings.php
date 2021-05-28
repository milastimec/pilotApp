<?php
    require "../header.php";


    if(isset($_SESSION['newuser'])){ 
        if(isset($_GET['error']) =="emptyRole"){
            echo '<p>Role must not be empty! </p>';
            }
        echo '<main>
             <div id= "secondarySettings">
             <section>
             <form action="includeSettings/secondary_settings.inc.php" method="post">
                    <input type="text" name="company" placeholder="Company">
                    <input type="text" name="place" placeholder="City">
                    <select name="role">
                        <option> Choose Role </option>
                        <option value="other"> Other </option>
                        <option value="pilot"> Pilot </option>
                        <option value="mechanic"> Mechanic </option>
                        <option value="manager"> Operation Manager </option>
                        
                    </select>
                    
                    <button type="submit" name="secondaryInfo"> Add info </button>
                </form>
                </section>
                 </div>

             </main>';
    }
    require "../footer.html";
?>