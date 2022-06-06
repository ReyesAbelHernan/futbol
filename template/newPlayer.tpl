{include file="template/header.tpl"}

{if isset($username) && $username}
<div class="newPlayer">
    <form action="newPlayer" method="POST">
        <label>Player</label>
        <label>Name</label>
        <input type="text" name="name" class="name">
        <label>Sub Name</label>
        <textarea type="text" name="subname"></textarea>
        <label>number</label>
        <textarea type="text" name="number"></textarea>
        <label>Nationality</label>
        <textarea type="text" name="nationality"></textarea>
        <label>Team</label>
        <select name="id_team">
            {foreach from=$team item=teams}
                <option value={$teams->id}>{$teams->team}</option>
            {/foreach}
        </select>
        <br>
        <button type="submit">Send</button>
    </form>
</div>    
{/if}
{include file="template/footer.tpl"}