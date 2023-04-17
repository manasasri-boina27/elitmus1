<?php
session_start();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["t1"];
    $pwd = $_POST["t2"];
} else {
    header('Location:admin.php');
}
?>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: aliceblue;
            color: #fff;
            padding: 35px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            float: right;
            font-size: 120%;
        }

        nav li {
            display: inline-block;
            margin-right: 16px;
        }

        nav a {
            color: #fff;
        }

        input[type="submit"] {
            background-color: white;
            width: 130%;
            height: 3%;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }

        th,
        td {
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: aliceblue;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
        input[type=submit]
        {
            width: 150px;
            height: 25px;
            color:black;
            background-color: blanchedalmond;
            font-size:large;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <form action="logout1.php" method="post">
                        <input type="submit" class="w-100 btn btn-lg btn-primary"  value="logout">
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <?php

    $host = 'localhost';
    $uname = 'root';
    $password = "";
    $dbname = "manasa";

    $conn = mysqli_connect($host, $uname, $password, $dbname);
    $v1 = "SELECT * FROM admi";
    $r = mysqli_query($conn, $v1);
    $row1 = mysqli_fetch_assoc($r);
    if ($row1['auser'] == $name and $row1['apass'] == $pwd) {
        $v = "SELECT * FROM users";
        $result = mysqli_query($conn, $v);
    ?>
        <h2 align="center">User Profile</h2>
        <br>
        <br>
        <table border=3 align="center" cellpadding=10 cellspacing=0>
            <tr>
                <th><b>Email</b></th>
                <th><b>password</b?</th>
            </tr>
            <?php
            if ($v) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                }
                echo "<br>";
            }
        }
        ?>
</body>

</html>
