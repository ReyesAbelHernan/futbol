{include file="template/header.tpl"}


<div class="newTeam">
    {if isset($username) && $username}
        <form action="newTeam" method="POST">
            <label>New Team</label>
            <input type="text" name="name">
            <button type="submit">Send</button>
        </form>
    {/if}

    {foreach from=$team item=teams}
        <form>{$teams->team}</form>
        <a href="deleteTeam/{$teams->id}"> Delete </a>
    {/foreach}

</div>
{include file="template/footer.tpl"}