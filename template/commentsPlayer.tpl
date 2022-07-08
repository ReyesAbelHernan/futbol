{include file="template/header.tpl"}



    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="{$player->photo}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="35%" y="50%" fill="#eceeef" dy=".3em">{$player->subname}  {$player->name}</text></svg>
                            <div class="card-body">
                                {if ({$player->photo}) }
                                <div class="w-100 p-3" ><img src="{$player->photo}" class="card-img-top" alt="..."></div>
                                {/if}
                                    <label class="playerNumber">Number - {$player->number} </label>
                                    {foreach from=$team item=teamss}
                                        {if ({$player->id_team}=={$teamss->id})}
                                            <br>
                                            <label class="playerTeam">Team - {$teamss->team}</label>
                                        {/if}
                                    {/foreach}
                                    <br>
                                    <label class="playerNationality">Country - {$player->nationality} </label>
                            </div>
                        </div>
                        
                        <input type="hidden" id="id" value={$player->id}>
                        <form id="form_comentario" action="insert" method="POST">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="valoracion">
                                        <h3>Insertar comentario:</h3>
                                    </div>
                                    <input name="input_textoComentario" type="textarea" name="message" rows="10" cols="20">
                                    <br>
                                    <h3>Insertar valoracion del 1 al 5:</h3>
                                            <p class="tier">
                                                <input id="radio1" type="radio" name="radio1" value="5">
                                                <!--
                                            --><label for="radio1">★</label>
                                                <!--
                                            --><input id="radio2" type="radio" name="radio1" value="4">
                                                <!--
                                            --><label for="radio2">★</label>
                                                <!--
                                            --><input id="radio3" type="radio" name="radio1" value="3">
                                                <!--
                                            --><label for="radio3">★</label>
                                                <!--
                                            --><input id="radio4" type="radio" name="radio1" value="2">
                                                <!--
                                            --><label for="radio4">★</label>
                                                <!--
                                            --><input id="radio5" type="radio" name="radio1" value="1">
                                                <!--
                                            --><label for="radio5">★</label>
                                            </p>
                                            <button id="botonComentario"> Enviar </button>
                        </form>

                                        <div>
                                        {include file="template/vue/coment.vue"}

                                        </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="js/clientSideRendering.js"></script>

</body>

</html




