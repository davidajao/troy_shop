<?php
include('session.php');
include('header.php');


$sql = "SELECT * FROM customers where userID='$sessionID'";
$result = $db->query($sql);

while($row = mysqli_fetch_array($result))
{ 
$fname=$row['first_name'];
$lname=$row['last_name'];
$email=$row['email'];
$phone=$row['phone'];
$carrier=$row['carrier'];
$street=$row['street'];
$city=$row['city'];
$state=$row['state'];
$zip=$row['zip'];
}
?>

<div class="container">
    <h2 style="text-align:center;">MY PROFILE</h2>          
    <div id="login" class="container">
            <form class="blue_border center" action="update_profile.php" method="POST">
                <div id="details" >
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="first_name"  value="<?php echo $fname ?>" required>	
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $lname ?>" required>	
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Carrier:</label>
                        <select class="form-control" name="carrier" required>
                            <option></option>
                            <option value="V">Verizon</option>
                            <option value="T">T-mobile</option>
                            <option value="AT">AT&T</option>
                            <option value="S">Sprint</option>
                            <option value="N">Nextel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Street address:</label>
                        <input type="text" class="form-control" name="street" value="<?php echo $street ?>" required>
                    </div>
                    <div class="form-group">
                        <label>City:</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $city ?>" required>
                    </div>
                    <div class="form-group">
                        <label>State:</label>
                        <select class="form-control" placeholder="State" name="state" required>
                                    <option value="<?php echo $state ?>"><?php echo $state ?></option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Zip code:</label>
                        <input type="text" class="form-control" placeholder="" name="zip" value="<?php echo $zip ?>" required>	
                    </div>
                </div>

                
                <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Update">
                     
            </form>
        </div>
</div>


<?php
include('footer.php');
?>