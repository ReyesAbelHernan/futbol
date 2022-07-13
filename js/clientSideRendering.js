"use strict"

let app = new Vue({
    el: '#Vue-comments',
    data: {
        comments: [] ,
        subtitle: "COMMENTS" 
    },
    methods: {
        getComentarios: function() {
            getComentarios();
        },
        deleteComentario(id) {
            fetch(`api/comentarios/${id}`, {
                method: "DELETE",
                headers: { "Content-Type": "application/json" },
            })
                .then(response => getComentarios())
                .catch(error => console.log(error));

        },
    }
});

app.getComentarios();
  

document.addEventListener('DOMContentLoaded', () => {  

    document.querySelector('#botonComentario').addEventListener('click', e => {
        e.preventDefault();
        addComentario();
    });

});

function getComentarios() {
    let urlParts = window.location.href.split("/");
    let id = urlParts[urlParts.length - 1];
    let url = "api/comentarios/" + id;
    fetch(url)
      .then((response) => response.json())
      .then((comments) => (app.comments = comments))
      .then((console.log(app.comments)))
      .catch((error) => console.log(error));
  }


function addComentario() {
    if (validarComentario() == true){
        let dataC = {
            comments: document.querySelector('input[name="input_textoComentario"]').value,
            tier: checkValoracion(),
            id_player: document.getElementById("id").value
        }

        fetch('api/comentarios', {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(dataC)
        })
            .then(response => response.json())
            .then(comments => app.comments.push(comments))
            .then(response => getComentarios())
            .catch(error => console.log(error));
    ResetComentario();
    }

}


function checkValoracion(){
    for (let i = 1; i <= 5; i++){
        if (document.querySelector(`input[id="radio${i}"]`).checked){
            return (document.querySelector(`input[id="radio${i}"]`).value);
        }
    }  
}

function validarComentario(){
    if (document.querySelector('input[name="input_textoComentario"]').value != ""){
        if (checkValoracion() > 0){
            return true;
        }else return false;
    }else return false;
}

function ResetComentario(){

    document.querySelector('input[name="input_textoComentario"]').value = "";
    for (let i = 1; i <= 5; i++) {
        let selector = "radio"+i;
        console.log(selector);
        document.getElementById(selector).checked = false;
    }
}


