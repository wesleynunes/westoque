$(document).ready(function(){  
    
    //formatar datas     
    $("#dataproduto").kendoDatePicker({
         format: "dd/MM/yyyy",         
     }); 
        
    //mascara para datas colocar barras    
    $("#dataproduto").mask("99/99/9999",{placeholder:" "});
        
    //traduzir kendo para portuques           
    kendo.culture("pt-BR");              
   
});

//nao permitir letras em datas 
function SomenteNumero(e){
   var tecla=(window.event)?event.keyCode:e.which;
   if((tecla>47 && tecla<58)) return true;
   else{
       if (tecla==8 || tecla==0) return true;
       else  return false;
   }
}


