{include file="template/header.tpl"}

<div class="signUp">
    <form action="registrar" method="POST">
        <h3>Create Acount</h3>
        <label>Username</label>
        <input type="text" placeholder="Enter Username" name="username">
        
        <label>Password</label>
        <input type="password" placeholder="Enter Password" name="password">
        
        <label>Re-enter password</label>
        <input type="password" placeholder="Re-enter Password" name="password2">
        
        <label>Email</label>
        <input type="text" placeholder="Your Email" name="email">
        
        <input type="submit" value="Sign up">
        <label>{$mensaje}</label>
    </form>
   
</div>

{include file="template/footer.tpl"}