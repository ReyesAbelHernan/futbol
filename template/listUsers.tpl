{include file="template/header.tpl"}

{if $logged eq 'user'}
<div class="album py-5 bg-light">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="card-body">
            <h2>Sorry! you not have permission.</h2>  
        </div>
    </div>
</div>
{/if}

{if $logged eq 'admin'}
<div class="album py-5 bg-light">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="card-body">
            <div class="listUser">
                    <section>
                        <table>   
                            <div class="container">
                                <div class="col">
                                    <h2> LIST  OF  ALL  USERS </h2>  
                                </div>  
                                <div class="row">
                                    <div class="col">
                                        <h4>CURRENT ROL</h4>
                                    </div>
                                    <div class="col">
                                       <h4> USERNAME</h4>
                                    </div>
                                    <div class="col">
                                        <h4>CHANGE ROL</h4>
                                    </div>
                                    <div class="col">
                                       <h4> DELETE USER</h4>
                                    </div>
                                </div>
                            </div>  
                           

                                {foreach from=$users item=user}
                                <div class="container">
                                    <div class="row">   
                                        <div class="row row-cols-8"> 
                                            {if $user->admin eq 0}
                                                <div class="col">
                                                    User
                                                </div>
                                            {elseif $user->admin eq 1}
                                                <div class="col">
                                                    Admin
                                                </div>
                                            {/if}
                                            <div class="col">
                                                {$user->username}
                                            </div>  
                                            {if $user->admin eq 0}
                                                <div class="col">
                                                    <form action="admin/{$user->id}" method="POST">
                                                        <input id="input_admin" type="submit" value="Set Admin">
                                                    </form>
                                                </div> 
                                            {elseif $user->admin eq 1}
                                                <div class="col">
                                                    <form action="user/{$user->id}" method="POST">
                                                        <input id="input_admin" type="submit" value="Remove Admin">
                                                    </form>
                                                </div>     
                                            {/if}
                                            <div class="col">
                                                <a href="deleteUser/{$user->id}">Delete User</a> 
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                                {/foreach}

                        </table> 
                    </section>
            </div> 
        </div>
    </div>
</div>
{/if}
{include file="template/footer.tpl"}





