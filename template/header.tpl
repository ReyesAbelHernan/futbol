<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}/home">
    <meta charset="UTF-8">
    <meta name="viewport" main-content="width=device-width, initial-scale=1.0">
    <title>FUBOL</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <link rel="stylesheet" href="./css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>



<body>

<header class="p-3 bg-dark text-white">
    <div class="containerr">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="home" class="nav-link px-2 text-white">Home</a></li>
          {if isset($username) && $username}
          <li><a href="renderNewTeam"  class="nav-link px-2 text-white">NewTeam</a></li>
          <li><a href="renderNewPlayer" class="nav-link px-2 text-white">NewPlayer</a></li>
          {/if} 
        </ul>

        <div class="text-end">
           {if isset($username) && $username} 
            <button type="button" class="btn btn-outline-light me-2"><a href="listUsers">{$username}</a></button>
            <button type="button" class="btn btn-outline-light me-2"><a href="logout">Log Out</a></button>
          {else}
            <button type="button" class="btn btn-outline-light me-2"><a href="login">Login</a></button>
            <button type="button" class="btn btn-outline-light me-2"><a href="register">Sign up</a></button>
          {/if}  
        </div>
      </div>
    </div>
  </header>

<div class="title">
  <div class="py-3 mb-4 border-bottom">
      <div class="container d-flex flex-wrap justify-content-center">
        <a href="home" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
          <h4>FULBO</h4>
        </a>
      </div>
  </div>
</div>


</body>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin = "anonymous" >
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
</script>



</html>
    	

        