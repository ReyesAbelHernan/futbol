{include file="template/header.tpl"}
    {if isset($username) && $username}  
        <div class="newTeam">
                <form action="updateTeam/{$team->id}" method="POST">
                    <h3>Edit Team<h3>
                    <label for="team">{$team->team}</label>
                    <input type="text" name="team" value="{$team->team}">
                    <input type="submit" value="Enter">
                </form>
        </div>
    {/if}
{include file="template/footer.tpl"}
