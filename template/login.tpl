{include file="template/header.tpl"}

     


<div class="logincaja">
    <form action="verifyUser" method="POST">
        <h3>LOGIN</h3>
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" name="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name='password'>

        <input type="submit" value="Enter">
    </form>
    <a href="register">You dont acount?</a>
</div>
<a>{$mensaje}</a>
{include file="template/footer.tpl"}
   
  