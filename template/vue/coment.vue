{literal}
    <section id="Vue-comments">

    

        <h1> {{subtitle}} </h2>


        <ul class="list-none">


            <li v-for="comment in comments">


                Comment :  {{ comment.comments }}
                <br>
               
                Tier :  {{ comment.tier }}
                <br>
                
{/literal}

  {if $logged eq 'admin'}

{literal}
                <span>
                    <br>
                    <button v-on:click="deleteComentario(comment.id)"> DELETE COMMENT </button>
                </span>
                <br>
{/literal}

     {/if}

{literal}
                
            </li>
        </ul>

    </section>
{/literal}