{include file="template/header.tpl"}


<div class="filtrando">
    <form action="filtrar" method="POST">
        <label>Teams</label>
        <select name="inputFiltrar" class="selectfiltrar">
                {foreach from=$team item=teams}
                    <option value={$teams->id}>{$teams->team}</option>
                {/foreach}
        </select>
            <button type="submit" class="buttonFilter">Filter</button>
    </form>
</div>


    {foreach from=$player item=players}
        <div class="containerPlayer">
            <h2 class="playerName">{$players->subname},{$players->name}</h2>
            <label class="playerNumber">Number:{$players->number} </label>
            {foreach from=$team item=teamss}
                {if ({$players->id_team}=={$teamss->id})}
                     <br>
                     <label class="playerTeam">Team:{$teamss->team}</label>
                {/if}
            {/foreach}
            <br>
            <label class="playerNationality">Country:{$players->nationality} </label>
            {if isset($username) && $username}
                <a href="deletePlayer/{$players->id}"> Delete </a>
                <a href="editPlayer/{$players->id}"> Edit </a>
            {/if}
        </div>
    {/foreach}

