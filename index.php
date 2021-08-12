<?php

error_reporting(-1);

require 'db_connection.php';
require_once 'json.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">

</head>
<body>
<div>
    <button class="table-verification-button">Table 'users'</button>
</div>
<div>
    <button class="create-table hidden">Create table 'users'</button>
    <p class='tableMessage hidden'>Table 'users' is created</p>
</div>
<div class="created_table hidden">
    <p>Table 'users' is created</p>
</div>

<hr>
<button class="show-form-insert">Form for input data</button>
<form class="form-insert hidden" action="index.php" method="post">
    <p>
        Name
        <input type="text" name="name" class="name field" required/>
    </p>
    <p>
        Surname
        <input type="text" name="surname" class="surname field" required/>
    </p>
    <p>
        Age
        <input type="text" name="age" class="age field" required/>
    </p>
    <p>
        Email
        <input type="email" name="email" class="email field" required/>
    </p>
    <p>
        Phone
        <input type="checkbox" class="phone-checkbox"/>
        <input type="text" name="phone" class="phone hidden"/>
    </p>
</form>
<button class='table-add-information hidden'>Add to table</button>

<p class='result'></p>
<hr>

<!--    <button class="all-id">Вывести все id из БД</button>-->

<div class="all-id-div">
    <label>Choose user to show</label>
    <select class="selectUserId">
    </select>
    <button class="showUserButton">Show User</button>
</div>

<hr>

<div class="all-id-div delete">
    <label>Choose user(s) to delete</label>
    <select class="selectDeleteUser" multiple="multiple">
    </select>
    <button class="deleteUserButton">Delete User</button>
    <p class='result-deleted'></p>
</div>

<script type="text/javascript" src=script.js></script>
</body>
</html>
