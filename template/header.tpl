<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" main-content="width=device-width, initial-scale=1.0">
    <title>FUBOL</title>
    <link rel="stylesheet" href="./css/style.css">
</head>


<body>

    <div class="topnav" id="barraNavegacion">
        <a href="home" class="button-menu">Home</a>
        {if isset($username) && $username}
            <a href="renderNewPlayer" class="button-menu"> New Player</a>
            <a href="renderNewTeam" class="button-menu"> New Team</a>
            <a class="button-login" href="logout">Logout</a>
            <a class="button-login">{$username}</a>    
        {else}
            <a href="login"  class="button-login"> Login </a>
        {/if}
            <a href="#" class="icon" onclick="cambioClaseNavegacion()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <h1>FUBOL</h1>
</body>

</html>
    	