{include file="template/header.tpl"}

<div class="album py-5 bg-light">
    <div class="newTeam">
        {if isset($username) && $username}
            <form action="newTeam" method="POST">
                <h3>New Team</h3>
                <label for="team">Name:</label>
                <input type="text" name="name">
                <input type="submit" value="Enter">
            </form>
        {/if}

    </div>
    <div class="Teams">
        <div class="container">
        {foreach from=$team item=teams}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"><rect width="100%" height="100%" fill="#55595c"></rect><text x="40%" y="50%" fill="#eceeef" dy=".3em">{$teams->team}</text></svg>        
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                {if isset($username) && $username}
                                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="deleteTeam/{$teams->id}"> Delete </a></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="editTeam/{$teams->id}"> Edit </a></button>
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {/foreach}  
        </div>
    </div>
</div>
{include file="template/footer.tpl"}