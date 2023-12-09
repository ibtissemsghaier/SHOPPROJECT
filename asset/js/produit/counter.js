$('.counter-plus').click(function(e){
    let qty=$(e.currentTarget).siblings('#qty');
    let qtyValue=parseInt(qty.val())+1;
     //pour que la valeur ne depasse pas 99
     if(qtyValue>=99){
        qtyValue=99;
    }
    qty.val(qtyValue);
    
});

$('.counter-minus').click(function(e){
    let qty=$(e.currentTarget).siblings('#qty');
    let qtyValue=parseInt(qty.val())-1;
    //pour que la valeur ne soit pas negative
    if(qtyValue<0){
        qtyValue=0;
    }
    qty.val(qtyValue);
    
});