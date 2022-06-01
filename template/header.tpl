<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" main-content="width=device-width, initial-scale=1.0">
    <title>FUBOL</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>


<body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="home" class="nav-link px-2 text-white">Home</a></li>
          {if isset($username) && $username}
          <li><a href="renderNewTeam"  class="nav-link px-2 text-white">NewTeam</a></li>
          <li><a href="renderNewPlayer" class="nav-link px-2 text-white">NewPlayer</a></li>
          {/if} 
        </ul>

        <div class="text-end">
           {if isset($username) && $username} 
            <button type="button" class="btn btn-outline-light me-2">{$username}</button>
            <button type="button" class="btn btn-outline-light me-2"><a href="logout">Log Out</a></button>
          {else}
            <button type="button" class="btn btn-outline-light me-2"><a href="login">Login</a></button>
            <button type="button" class="btn btn-outline-light me-2"><a href="register">Sign up</a></button>
          {/if}  
        </div>
      </div>
    </div>
  </header>


<div class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
      <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">FULBO</span>
      </a>
    </div>
</div>


</body>

</html>
    	

        