{literal}
    <section id="Vue-comments">

    

        <h1> {{subtitle}} </h2>


        <ul class="list-none">


            <li v-for="comment in comments">


               Comentario :  {{ comment.comments }}
                <br> 
                Valoracion :  {{ comment.tier }}
                <br>
               
                  
            </li>
        </ul>


    </section>
{/literal}
