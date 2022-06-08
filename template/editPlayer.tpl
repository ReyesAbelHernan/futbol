{include file="template/header.tpl"}

{if isset($username) && $username}
    <div class="editPlayer">
        <form action="updatePlayer/{$player->id}"  method="POST">
            <h3>Edit Player</h3>
            <label>Name</label>
            <input type=text name="name" placeholder="{$player->name}">
            <label>Subname<label>
            <input type=text name="subname" placeholder="{$player->subname}">
            <label>Number</label>
            <input type=text name="number" placeholder="{$player->number}">
            <label>Nationality</label>
            <input type=text name="nationality" placeholder="{$player->nationality}">
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