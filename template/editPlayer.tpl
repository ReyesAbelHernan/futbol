{include file="template/header.tpl"}

<div class="">
    <form action="updateBlog/{$player->id}"  method="POST">

        <label>name</label>
        <input type=text name="title" placeholder="{$player->name}">
        <label>subname<label>
        <input type=text name="blog" placeholder="{$player->subname}">
        <label>number</label>
        <input type=text name="title" placeholder="{$player->number}">
        <label>team<label>
        <select name="id_team">
            {foreach from=$team item=teams}
                <option value={$teams->id}>{$teams->team}</option>
            {/foreach}
        </select>
        <label>nationality</label>
        <input type=text name="title" placeholder="{$player->nationality}">
    </form>
        <button type="submit">Send</button>
</div>
{include file="template/footer.tpl"}