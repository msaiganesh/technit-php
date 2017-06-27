<!DOCTYPE html>
    <html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>
        View Admin Webpage
    </title>
    <?
    include("jqueryfile.php");
    ?>
</head>
<body>

<div class="container">
    <?php
    include("header.html");
    include"conn.php";
    $s="select * from admin";
    $result=mysqli_query($conn,$s);
    $t="<table class='table table-hover'>";
    $t=$t."<tr><td><h4>User Name</h4></td><td><h4>Full Name</h4></td><td><h4>Mobile</h4></td>
    <td><h4>Gender</h4></td><td><h4>Email Address</h4></td><td><h4>Photo</h4></td></tr>";
    while($row=mysqli_fetch_array($result))
    {
$t=$t."<tr>";
        $t=$t."<td>".$row[0]."</td>";
        $t=$t."<td>".$row[2]."</td>";
        $t=$t."<td>".$row[3]."</td>";
        $t=$t."<td>".$row[4]."</td>";
        $t=$t."<td>".$row[5]."</td>";
        $t=$t.'<td><img class="img img-responsive" src="'.$row[6].'" height="100" width="100"></td>';
        $t=$t."</tr>";
    }

$t=$t."</table>";
    echo $t;

    ?>
</div>
</body>


</html>