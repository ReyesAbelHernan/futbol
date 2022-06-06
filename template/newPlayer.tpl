{include file="template/header.tpl"}

{if isset($username) && $username}
<div class="newPlayer">
    <form action="newPlayer" method="POST">
        <h3>New Player</h3>
        <label>Name</label>
        <input type="text" name="name" class="name">
        <label>Sub Name</label>
        <textarea type="text" name="subname"></textarea>
        <label>Number</label>
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
          <input type="submit" value="Send">
    </form>
</div>   
{/if}

{include file="template/footer.tpl"} 

