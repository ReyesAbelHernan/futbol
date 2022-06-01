{include file="template/header.tpl"}

{if isset($username) && $username}
<div class="newTeam">
    <form action="newTeam" method="POST">
        <label>New Team</label>
        <input type="text" name="name">
        <button type="submit">Send</button>
    </form>
    {/if}

    {foreach from=$team item=teams}
    <form>{$teams->team}</form>
    <a href="deleteTeam/{$teams->id}"> Delete </a>

    {{/foreach}}

</div>
