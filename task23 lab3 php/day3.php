<html>
   <body>

    <h1>AAST_BIS</h1>
    <h4 style="color:red">* Required Field</h4>

    <form action="<?php $_PHP_SELF ?>" method="POST">

        <table>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="name" value="<?php
                     if(!empty($_POST['name']) && ( empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) ) ) echo $_POST['name'];
                    ?>">
                    <span style="color:red">*</span> <!--required-->
                    <?php
                    if(isset($_POST['submit'])){
                    
                    if(empty($_POST['name'])){
                    
                        echo '<span style="color:red"> Name is Required</span> ';
                    }}
                    ?>
                </td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td>
                    <input type="text" name="email" value="<?php
                     if(!empty($_POST['email']) && ( empty($_POST['name']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) ) ) echo $_POST['email'];
                    ?>">
                    <span style="color:red">*</span> <!--required-->
                    <?php
                    if(isset($_POST['submit'])){
                    
                    if(empty($_POST['email'])){
                    
                        echo '<span style="color:red"> Email is Required</span> ';
                    }}
                    ?>
                </td>
            </tr>
            <tr>
                <td>Group:</td>
                <td>
                    <input type="text" name="group" value="<?php
                    if(!empty($_POST['group']) && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) ) )
                    {echo $_POST['group'];}
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Class Details:</td>
                <td>
                    <textarea name="details" id="" cols="30" rows="4">
                    <?php
                    if(!empty($_POST['details']) && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) ) )
                    {echo $_POST['details'];}
                    ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male" <?php if((isset($_POST['gender']) && $_POST['gender'] == 'Male') && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) ) ){?>checked<?php }?>>Male 
                    <input type="radio" name="gender" value="Female" <?php if((isset($_POST['gender']) && $_POST['gender'] == 'Female') && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) ) ){?>checked<?php }?>>Female
                    <span style="color:red">*</span> <!--required-->
                    <?php
                    if(isset($_POST['submit'])){
                    
                    if(empty($_POST['gender'])){
                        $_POST['gender']='';
                        echo '<span style="color:red"> Gender is Required</span> ';

                    }}
                    ?>
                </td>
            </tr>
            <tr>
                <td>Select Courses:</td>
                <td>
                    <select name="courses[]" multiple>
                        <option value="PHP" <?php
                        if(!empty($_POST['courses']) && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) )){
                            foreach($_POST['courses'] as $value){
                                if($value == 'PHP') echo "selected";
                            }
                        }?> >PHP</option>

                        <option value="Java Script" <?php
                        if(!empty($_POST['courses']) && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) )){
                            foreach($_POST['courses'] as $value){
                                if($value == 'Java Script') echo "selected";
                            }
                        }?> >Java Script</option>
                        
                        <option value="MySql" <?php
                        if(!empty($_POST['courses']) && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) )){
                            foreach($_POST['courses'] as $value){
                                if($value == 'MySql') echo "selected";
                            }
                        }?>>MySql</option>
                        
                        <option value="Html" <?php
                        if(!empty($_POST['courses']) && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) )){
                            foreach($_POST['courses'] as $value){
                                if($value == 'Html') echo "selected";
                            }
                        }?> >Html</option>

                        <option value="CSS" <?php
                        if(!empty($_POST['courses']) && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['agree']) || preg_match("/[^A-za-z]/",$_POST['name']) )){
                            foreach($_POST['courses'] as $value){
                                if($value == 'CSS') echo "selected";
                            }
                        }
                        ?> >CSS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Agree:</td>
                <td>
                    <input type="checkbox" name="agree" value="agree" <?php if(isset($_POST['agree']) && ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || preg_match("/[^A-za-z]/",$_POST['name']) ) ){?>checked='true'<?php }?>>
                    <span style="color:red">*</span> <!--required-->
                    <?php
                    if(isset($_POST['submit'])){
                    
                    if(empty($_POST['agree'])){
                        echo '<span style="color:red">You must agree to terms</span> ';

                    }}
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit"></td>
            </tr>    
        </table>

    </form>
      
   </body>
</html>

<?php

    if(isset($_POST['submit'])){

        if(preg_match("/[^A-za-z]/",$_POST['name'])){
            die ("<h3> Invalid Name and Name should be Characters Only</h3>");
        }
        
        else{
            echo "<h1>Your given values are as:</h1>";
            echo "Name: ".$_POST['name']."<br>";
            echo "E-mail: ".$_POST['email']."<br>";
            echo "Group: ".$_POST['group']."<br>";
            echo "Class details: ".$_POST['details']."<br>";
            echo "Gender: ".$_POST['gender']."<br>";
            echo "Your Courses are: ";
            if(!empty($_POST['courses'] )){
                foreach($_POST['courses'] as $value){
                    echo $value ." , ";
                }
            }
        }
    }  
?>