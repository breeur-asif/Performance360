<?php

function getfavourites($cid) {

    $conn = dbconnect();
    $sql = "SELECT wprw_provider.name, wprw_provider.pid FROM wprw_provider INNER JOIN wprw_favourites WHERE wprw_provider.pid = wprw_favourites.pid AND wprw_favourites.cid = '$cid' AND wprw_provider.type = 'Pharmacy'";
    $result = mysqli_query($conn, $sql);
    
    $message = $message . "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12' >
    <div class='col-xl-3 col-lg-3 col-md-4 col-sm-6'>
                    <h3 class='wow fadeInUp'>Pharmacy</h3>";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $message = $message . "<a href='viewprovider.php?providerid=" . $row["pid"] . "'>" . $row["name"] . "</a><br />";
        }
    }
    else{
            $message = $message . "No favourite added yet. <a href=\"/customerbookservice/\">Add Now</a><br />";
    }
    
    $message = $message . "<br /><br /></div>";
    
    $sql = "SELECT wprw_provider.name, wprw_provider.pid FROM wprw_provider INNER JOIN wprw_favourites WHERE wprw_provider.pid = wprw_favourites.pid AND wprw_favourites.cid = '$cid' AND wprw_provider.type = 'Physiotherapy'";
    $result = mysqli_query($conn, $sql);
    
    $message = $message . "<div class='col-xl-3 col-lg-3 col-md-4 col-sm-6'>
                    <h3 class='wow fadeInUp'>Physiotherapy</h3>";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $message = $message . "<a href='viewprovider.php?providerid=" . $row["pid"] . "'>" . $row["name"] . "</a><br />";
        }
    }
    else{
            $message = $message . "Coming Soon ...<br />";
    }
    
    $message = $message . "<br /><br /></div>";
    
    $sql = "SELECT wprw_provider.name, wprw_provider.pid FROM wprw_provider INNER JOIN wprw_favourites WHERE wprw_provider.pid = wprw_favourites.pid AND wprw_favourites.cid = '$cid' AND wprw_provider.type = 'Chiropractor'";
    $result = mysqli_query($conn, $sql);
    
    $message = $message . "<div class='col-xl-3 col-lg-3 col-md-4 col-sm-6'>
                    <h3 class='wow fadeInUp'>Chiropractor</h3>";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $message = $message . "<a href='viewprovider.php?providerid=" . $row["pid"] . "'>" . $row["name"] . "</a><br />";
        }
    }
    else{
            $message = $message . "Coming Soon ...<br />";
    }
    
    $message = $message . "<br /><br /></div>";
    
    $sql = "SELECT wprw_provider.name, wprw_provider.pid FROM wprw_provider INNER JOIN wprw_favourites WHERE wprw_provider.pid = wprw_favourites.pid AND wprw_favourites.cid = '$cid' AND wprw_provider.type = 'Naturopath'";
    $result = mysqli_query($conn, $sql);
    
    $message = $message . "<div class='col-xl-3 col-lg-3 col-md-4 col-sm-6'>
                    <h3 class='wow fadeInUp'>Naturopath</h3>";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $message = $message . "<a href='viewprovider.php?providerid=" . $row["pid"] . "'>" . $row["name"] . "</a><br />";
        }
    }
    else{
            $message = $message . "Coming Soon ...<br />";
    }
    
    $message = $message . "<br /><br /></div>";
    
    $sql = "SELECT wprw_provider.name, wprw_provider.pid FROM wprw_provider INNER JOIN wprw_favourites WHERE wprw_provider.pid = wprw_favourites.pid AND wprw_favourites.cid = '$cid' AND wprw_provider.type = 'Counselling'";
    $result = mysqli_query($conn, $sql);
    
    $message = $message . "<div class='col-xl-3 col-lg-3 col-md-4 col-sm-6'>
                    <h3 class='wow fadeInUp'>Counselling</h3>";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $message = $message . "<a href='viewprovider.php?providerid=" . $row["pid"] . "'>" . $row["name"] . "</a><br />";
        }
    }
    else{
            $message = $message . "Coming Soon ...<br />";
    }
    
    $message = $message . "<br /><br /></div>";
    
    $sql = "SELECT wprw_provider.name, wprw_provider.pid FROM wprw_provider INNER JOIN wprw_favourites WHERE wprw_provider.pid = wprw_favourites.pid AND wprw_favourites.cid = '$cid' AND wprw_provider.type = 'Chiropodist/Podiatrist'";
    $result = mysqli_query($conn, $sql);
    
    $message = $message . "<div class='col-xl-3 col-lg-3 col-md-4 col-sm-6'>
                    <h3 class='wow fadeInUp'>Chiropodist/Podiatrist</h3>";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $message = $message . "<a href='viewprovider.php?providerid=" . $row["pid"] . "'>" . $row["name"] . "</a><br />";
        }
    }
    else{
            $message = $message . "Coming Soon ...<br />";
    }
    
    $message = $message . "<br /><br /></div>";
    
    $sql = "SELECT wprw_provider.name, wprw_provider.pid FROM wprw_provider INNER JOIN wprw_favourites WHERE wprw_provider.pid = wprw_favourites.pid AND wprw_favourites.cid = '$cid' AND wprw_provider.type = 'Speech Language Pathologist'";
    $result = mysqli_query($conn, $sql);
    
    $message = $message . "<div class='col-xl-3 col-lg-3 col-md-4 col-sm-6'>
                    <h3 class='wow fadeInUp'>Speech Language Pathologist</h3>";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $message = $message . "<a href='viewprovider.php?providerid=" . $row["pid"] . "'>" . $row["name"] . "</a><br />";
        }
    }
    else{
            $message = $message . "Coming Soon ...<br />";
    }
    
    $message = $message . "<br /><br /></div>";
    
    $sql = "SELECT wprw_provider.name, wprw_provider.pid FROM wprw_provider INNER JOIN wprw_favourites WHERE wprw_provider.pid = wprw_favourites.pid AND wprw_favourites.cid = '$cid' AND wprw_provider.type = 'Dentist'";
    $result = mysqli_query($conn, $sql);
    
    $message = $message . "<div class='col-xl-3 col-lg-3 col-md-4 col-sm-6'>
                    <h3 class='wow fadeInUp'>Dentist</h3>";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $message = $message . "<a href='viewprovider.php?providerid=" . $row["pid"] . "'>" . $row["name"] . "</a><br />";
        }
    }
    else{
            $message = $message . "Coming Soon ...<br />";
    }
    
    $message = $message . "<br /><br /></div>";
    
    mysqli_close($conn);
    
    return $message;
    
}

?>