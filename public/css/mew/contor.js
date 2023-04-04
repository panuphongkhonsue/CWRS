function create_tr(table_id1,table_id2){
    let table_body = document.getElementById(table_id1,table_id2);
    first_tr = table_body.firstElementChild
    tr_clone = first_tr.cloneNode(true);

table_body.append(tr_clone);
}

function remove_tr(this){
    console.log(this.closest('tbody').childElementCount);
    /* this.closest('tr').remove(); */
}
