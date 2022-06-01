{include file="template/header.tpl"}

    <div class="album py-5 bg-light">
        <div class="container">

           
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            {foreach from=$player item=players}
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">{$players->subname}  {$players->name}</text></svg>
                       
                        <div class="card-body">
                                <label class="playerNumber">Number - {$players->number} </label>
                                {foreach from=$team item=teamss}
                                    {if ({$players->id_team}=={$teamss->id})}
                                        <br>
                                        <label class="playerTeam">Team - {$teamss->team}</label>
                                    {/if}
                                {/foreach}
                                <br>
                                <label class="playerNationality">Country - {$players->nationality} </label>
                            

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    {if isset($username) && $username}
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="deletePlayer/{$players->id}"> Delete </a></button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="editPlayer/{$players->id}"> Edit </a></button>
                                    {/if}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            {/foreach}
            </div>
        </div>
    </div>
    

