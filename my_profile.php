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

<div id="profile-table" class="container">
    <h2 style="text-align:center;">MY PROFILE</h2>          
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>First name:</td>
            <td><?php echo $fname ?></td>
        </tr>
        <tr>
            <td>Last name:</td>
            <td><?php echo $lname ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $email ?></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><?php echo $phone ?></td>
        </tr>
        <tr>
            <td>Carrier:</td>
            <td>
                <?php 
                if($carrier == 'V'){ echo 'Verizon';}
                elseif($carrier == 'T'){ echo 'T-Mobile';}
                elseif($carrier == 'AT'){ echo 'AT&T';}
                elseif($carrier == 'S'){ echo 'Sprint';}
                elseif($carrier == 'N'){ echo 'Nextel';}
                ?>
            </td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><?php echo $street.", ".$city.", ".$state.", ".$zip ?></td>
        </tr>
        </tbody>
    </table>

    <a href="edit_profile.php"><button class='btn btn-sm btn-primary btn-block'> Edit Profile Info </button><a>
</div>


<?php
include('footer.php');
?>