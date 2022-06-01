{include file="template/header.tpl"}

{if isset($username) && $username}
<div class="newTeam">
    <form action="newTeam" method="POST">
        <label>New Team</label>
        <input type="text" name="team">
        <button type="submit">Send</button>
    </form>
    {/if}

    {foreach from=team item=team}
    <form>{$team->team}</form>
    <a href="deleteTeam/{$category->id}"> Delete </a>
    {{/foreach}}

</div>
