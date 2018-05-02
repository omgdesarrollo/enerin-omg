<?php


class AsignacionTemaRequisitoPojo {
    //put your code here
    
    private $id_asignacion_tema_requisito;
    private $id_clausula='';
    private $requisito='';
    


function getId_asignacion_tema_requisito() {
    return $this->id_asignacion_tema_requisito;
}

function setId_asignacion_tema_requisito($id_asignacion_tema_requisito) {
    $this->id_asignacion_tema_requisito = $id_asignacion_tema_requisito;
}


 function getId_clausula() {
    return $this->id_clausula;
}

function setId_clausula($id_clausula) {
    $this->id_clausula = $id_clausula;
}


 function getRequisito() {
    return $this->requisito;
}

 function setRequisito($requisito) {
    $this->requisito = $requisito;
}

}
