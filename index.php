<?php

error_reporting(-1);

use classes\User;
use classes\UserDB;
require 'db_connection.php';
require_once 'json.php';
require_once 'classes/User.php';
require_once 'classes/UserDB.php';


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">

</head>
<body>
    <div>
        <button class = "table-verification-button">Table 'users'</button>
    </div>
    <div>
        <button class = "create-table hidden" onclick="<?php $dbh->createTable() ?>">Create table 'users'</button>
        <p class = 'tableMessage hidden'>Table 'users' is created</p>
    </div>
    <div class="created_table hidden">
        <p>Table 'users' is created</p>
    </div>

    <hr>
    <button class = "show-form-insert" >Form for input data</button>
    <form class = "form-insert hidden" action="index.php" method="post">
        <p>
            Name
            <input type="text" name="name" class = "name"/>
        </p>
        <p>
            Surname
            <input type="text" name="surname" class = "surname" />
        </p>
        <p>
            Age
            <input type="text" name="age" class = "age"/>
        </p>
        <p>
            Email
            <input type="email" name="email" class = "email"/>
        </p>
        <p>
            Phone
            <input type="checkbox" class="phone-checkbox" />
            <input type="text" name="phone" class = "phone"/>
        </p>
    </form>
    <button class = 'table-add-information hidden'>Add to table</button>
    <p class="result" style="color:blue"> </p>

<!--    <hr>-->

<script type="text/javascript" src = script.js></script>
</body>
</html>
