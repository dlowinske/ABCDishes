<!DOCTYPE html>
<style>#title {text-align: center;color: darkgoldenrod;}</style>
<html>
    <head>
        <title>ABC Dishes</title>
        <style>
        input {
            text-align: center;
        }
        </style>
</head>


<body>
<?php
   
?>
<h1>Temporary Preferences</h1>
<p>Login for permanent preferences</p>

<?php

//for preset values in database
include("cookie_preset.php");

if( isset($_COOKIE['numberOfRows'])){

    echo ""; 
    }else{
        echo "<h1>Note: This is your first time letting us know your preferences. Please update the suggested values.</h1>";
    }



?>



<div class="container">
        <!--Check the CeremonyCreated and if Failed, display the error message-->
        
        <form action="modify_the_cookie.php" method="POST">
        <table style="width:500px">
        <tr>
            <th style="width:200px"></th>
            <th>Current Value</th> 
            <th>Update Value</th>
        </tr>
        <tr>
            <td style="width:200px">Number of Disges Per Row:</td>
            <td><input disabled type="int" maxlength="4" size="10" value="<?php 
            
            //echo $_COOKIE['numberOfRows'];
            if( isset($_COOKIE['numberOfRows'])){

                echo $_COOKIE['numberOfRows']; 
                }else{
                    echo $num_rows;
                }
            
            ?>" 
            
            title="Current value"></td> 
            <td><input required type="int" name="new_rows" 
            value= "<?php 

            

            if( isset($_COOKIE['numberOfRows'])){

                echo $_COOKIE['numberOfRows']; 
                }else{
                    echo $num_rows;
                }
            
            ?>" 
            
            maxlength="4" size="10" title="Enter a number"></td>
        </tr>
        <tr>
            <td style="width200px">Number of Dishes to show:</td>
            <td><input disabled type="int" maxlength="4" size="10" 
            
            value="<?php //echo $_COOKIE['numberOfDresses']; 
                
                if( isset($_COOKIE['numberOfDishes'])){

                    echo $_COOKIE['numberOfDishes']; 
                    }else{
                        echo $num_show;
                    }
            
            
            ?>" 
            title="Current value"></td> 
            <td><input required type="int" name="new_dishes" 
            value="<?php 
            
            

            if( isset($_COOKIE['numberOfDishes'])){

                echo $_COOKIE['numberOfDishes']; 
                }else{
                    echo $num_show;
                }
            
            ?>
            
            " maxlength="4" size="10" title="Enter a number"></td>
        </tr>

        <tr>
            <td style="width200px">Name of favorite dish:</td>
            <td><input disabled type="text" maxlength="20" size="10" value="<?php echo $_COOKIE['favoriteDish']; ?>" title="Current value"></td> 
            <!--
            <td><input required type="text" name="new_favorite" value="<?php //echo $_COOKIE['favoriteDress']; ?>"  maxlength="20" size="10" title="Enter a dress name"></td>
            -->
            
            <td><select type="text" name="new_favorite" title="Enter fav dress">

            <?php
                //loop to get all choices into the drop down
                for($c=0;$c<$count_dishes;$c++){

                    $dish = $dish_names[$c]['name'];
                    echo "
                        <option value='$dish'>$dish</option>
                    ";
                }
            ?>
            
            </select></td>


        </tr>
        
        



        <tr>
            <td style="width200px">Default view for home page:</td>
            <td><input disabled type="text" maxlength="20" size="10" 
            value="<?php echo $_COOKIE['defaultView']; ?>" title="Current value"></td> 
            

            <td><select type="text" name="new_defaultView" title="Enter view type">
                <option value="Grid">Grid</option>
                <option value="List">List</option>
                <option value="Carousal">Carousal</option>
            
            </select></td>
        </tr>

        <tr>
            <td style="width200px">Image Height In Grid:</td>
            <td><input disabled type="int" maxlength="4" size="10" 
            value="<?php 
            
            if( isset($_COOKIE['heightGrid'])){

                echo $_COOKIE['heightGrid']; 
                }else{
                    echo $height_grids;
                }
            
            ?>"
            
             title="Current value"></td> 
            <td><input required type="int" name="new_HeightGrid" 

            value="<?php
            
            

            if( isset($_COOKIE['heightGrid'])){

                echo $_COOKIE['heightGrid']; 
                }else{
                    echo $height_grids;
                }
            
            ?>"
            
            
             maxlength="4" size="10" title="Enter a number"></td>
        </tr>


        <tr>
            <td style="width200px">Image Width In Grid:</td>
            <td><input disabled type="int" maxlength="4" size="10" 
            value="<?php 
            
            if( isset($_COOKIE['widthGrid'])){

                echo $_COOKIE['widthGrid']; 
                }else{
                    echo $width_grids;
                }
            ?>" 
            title="Current value"></td> 
            <td><input required type="int" name="new_WidthGrid" 

            value="<?php 
            
            

            if( isset($_COOKIE['widthGrid'])){

                echo $_COOKIE['widthGrid']; 
                }else{
                    echo $width_grids;
                }
            
            ?>
            
            " maxlength="4" size="10" title="Enter a number"></td>
        </tr>



        <tr>
            <td style="width200px">Image Hieght in Carousal:</td>
            <td><input disabled type="int" maxlength="4" size="10" 
            value="<?php 
            
            
            if( isset($_COOKIE['heightCar'])){

                echo $_COOKIE['heightCar']; 
                }else{
                    echo $height_cars;
                }
            ?>" 
            title="Current value"></td> 
            <td><input required type="int" name="new_HeightCar"
             
             value="<?php
             
             

             if( isset($_COOKIE['heightCar'])){

                echo $_COOKIE['heightCar']; 
                }else{
                    echo $height_cars;
                }
             
             ?>
             
             " maxlength="4" size="10" title="Enter a number"></td>
        </tr>

        <tr>
            <td style="width200px">Image Width in Carousal:</td>
            <td><input disabled type="int" maxlength="4" size="10" 
            value="<?php 
             
            if( isset($_COOKIE['widthCar'])){

                echo $_COOKIE['widthCar']; 
                }else{
                    echo $width_cars;
                }
            ?>" 
            
            title="Current value"></td> 
            <td><input required type="int" name="new_WidthCar"

              value="<?php
              
              if( isset($_COOKIE['widthCar'])){

              echo $_COOKIE['widthCar']; 
              }else{
                  echo $width_cars;
              }
              
              ?>
              
              
              " maxlength="4" size="10" title="Enter a number"></td>
        </tr>
    




        </table><br>
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Preferences</button>
        <button href="index.php" class="btn btn-primary btn-md align-items-center">Back to Homepage</button>
        </form>
    </div>


</body>
</html> 