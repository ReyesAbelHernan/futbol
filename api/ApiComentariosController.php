<?php

require_once "./model/commentsModel.php";
require_once "ApiController.php";
require_once "api.view.php";

class ApiComentariosController extends ApiController
{

    function __construct()
    {
        parent::__construct();
        $this->model = new commentsModel();
        $this->view = new APIView();
    }

    


    public function GetComentarios($params = [])
    {
        $id = $params[':ID'];

        $comentarios = $this->model->GetComentarioforPlayer($id);
   
        $this->view->response($comentarios, 200);
    }

    public function InsertComentario()
    {
        $body = $this->GetData();

        $comentario = $this->model->InsertComentario($body->comments, $body->tier, $body->id_player);

        if (!empty($comentario))
            $this->view->response($this->model->GetComentarios($comentario), 200);
        else
            $this->view->response("Error", 404);
    }

    public function deleteComentario($params = [])
    {
        $id = $params[':ID'];
        $comment = $this->model->GetComentarios($id);
        if ($comment) {
            $this->model->DeleteComentario($id);
            $this->view->response($comment, 200);
        } else {
            $this->view->response("Error", 500);
        }
    }       

    
}
