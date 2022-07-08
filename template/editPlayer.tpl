{include file="template/header.tpl"}

{if isset($username) && $username}
    <div class="editPlayer">
        <form action="updatePlayer/{$player->id}"  method="POST">
            <h3>Edit Player</h3>
            <label>Name</label>
            <input type=text name="name" value="{$player->name}">
            <label>Subname<label>
            <input type=text name="subname" value="{$player->subname}">
            <label>Number</label>
            <input type=text name="number" value="{$player->number}">
            <label>Nationality</label>
            <input type=text name="nationality" value="{$player->nationality}">
            <label>Team<label>
            <select name="id_team">
                {foreach from=$team item=teams}
                    {if $teams->id != $player->id_team}
                    <option value={$teams->id}>{$teams->team}</option>
                    {else}
                     <option selected value = "{$teams->id}">{$teams->team}</option>
                    {/if}
                {/foreach}
            </select>
            
            <br>
            <input type="submit" value="Send">
        </form>
    </div>
{/if}
{include file="template/footer.tpl"}