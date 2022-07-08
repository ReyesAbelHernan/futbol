{include file="template/header.tpl"}

{if isset($username) && $username}
<div class="newPlayer">
    <form action="newPlayer" method="POST" enctype="multipart/form-data">
        <h3>New Player</h3>
        <label>Name</label>
        <input type="text" name="name">
        <label>Sub Name</label>
        <textarea type="text" name="subname"></textarea>
        <label>Number</label>
        <textarea type="text" name="number"></textarea>
        <label>Nationality</label>
        <textarea type="text" name="nationality"></textarea>
        <label>Team</label>
        <select name="id_team">
            {foreach from=$team item=teams}
                <option name="id_team" value={$teams->id}>{$teams->team} </option>
            {/foreach}
        </select>
        <label>Photo</label>
        <input type="file" name="photo" id="photo">
        <br>
          <input type="submit" value="Send" href="home">
    </form>
</div>   
{/if}

{include file="template/footer.tpl"} 

