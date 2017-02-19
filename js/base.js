   
        $(document).ready(function(){
            $(window).load(function() {
                setInterval(function(){ reloadList(); }, 2000);
            });
            ///////////////////////////////////////////
            //Manejador del menu lateral
            $(".side-menu").hover(function(){
                showMenu();
            },function(){
                hideMenu();
            });

            $(".navbar-expand").click(function(){
                showMenu();
            });

            $(".navbar-expand-toggle").click(function(){
                hideMenu();
            });

            ///////////////////////////////////////////
            ///////////////////////////////////////////
            //Manejador del createUser
            $("#submitNew").click(function() { 
                var form = $("form#users-form");
                if($("#nombre").val() != "" && $("#email").val() != "" && $("#pass").val() != ""){
                    if($("#checkbox").is(':checked')){$("#rol").val(1)}
                    $.post("gestion.php?process=new",form.serialize())
                    .done(function(result) {
                        if(result){
                            alertas("alert-success","<strong>Good!</strong> Satisfactory registration.");
                        } else {
                            alertas("alert-danger","<strong>ERROR!</strong> Failed registration.");                   
                        }
                    })
                    .fail(function() {
                        console.log("server error");
                    });
                }else{
                    alert("Empty fields");
                }
            });

            ///////////////////////////////////////////
            //Manejador del listUser//
            //borra y edita un usuario
            $(document).on('click', 'a.all', (function() {
                //alert("jjj"+$(this).data('process'));
                var pro = $(this).data('process');
                var id = $(this).data('id');
                var action = true;

                //validamos que realmente se quiera eliminar el usuario
                if(pro == "del" && !confirm("Desea borrar el usuario?")){
                    action = false;
                }

                //generamos el modal que editara el usuario
                if(pro == "up"){
                    $(".modal .modal-title #idUser").html(id);
                    pro = pro+"&get=true";
                }


                if(action){
                    $.get(
                        "gestion.php?id="+id+"&process="+pro,
                        function (result) {
                            if(pro == "del"){
                                if(result){
                                    alertas("alert-success","<strong>Good!</strong> User deleted successfully.");
                                } else {
                                    alertas("alert-danger","<strong>ERROR!</strong> Process failed.");                   
                                }
                            }else{                                
                                jsonArray = JSON.parse(result);  
                                $("#id").val(jsonArray['id']);
                                $("#nombre").val(jsonArray['nombre']);
                                $("#email").val(jsonArray['email']);                                
                                $("#rol").attr('checked', jsonArray['rol']);

                            }
                        }
                    );
                }
            }));
            ///////////////////////////////////////////
            //Manejador del Update
            $("#submitUpdate").click(function() { 
                var form = $("form#users-form");
                if($("#nombre").val() != "" && $("#email").val() != ""){
                    $('#modalUser').modal('hide');
                    if($("#checkbox").is(':checked')){$("#rol").val(1)}
                    $.post("gestion.php?process=up",form.serialize())
                    .done(function(result) {
                        if(result){
                            alertas("alert-success","<strong>Good!</strong> Satisfactory update.");
                        } else {
                            alertas("alert-danger","<strong>ERROR!</strong> Failed update.");                   
                        }
                    })
                    .fail(function() {
                        console.log("server error");
                    });
                }else{
                    alert("Empty fields");
                }
            });
            ///////////////////////////////////////

            //////////////////////////////////////
            //muestra el menu
            function showMenu(){
                $(".side-menu").width("250px"); 
                $(".navbar-expand-toggle").show();  
                $(".side-menu .title").show();                 
            }

            //oculta el menu
            function hideMenu(){
                $(".side-menu").width("60px"); 
                $(".navbar-expand-toggle").hide();
                $(".side-menu .title").hide();                        
            }

            function clearInputs() {
                $("#nombre").val("");
                $("#email").val("");
                $("#pass").val("");
                $("#rol").attr('checked', false);
            }

            //manejador de alertas
            function alertas(clase,msj) {
                $(".alert").addClass(clase);
                $(".alert #content").html(msj);
                $(".alert").show();
                setTimeout(function(){ $(".alert").hide(); }, 4000);
            }

            //lista usuarios
            function reloadList() {
                $.get("gestion.php?process=getAll", function(response){  
                    //actualizamos los datos de la vista
                    $("#users-list #rowsUsers").html(response);

                });//$.get
            }
            ///////////////////////////////////////////

        });
/*$(document).ready(function(){
    ///////////////////////////////////////////
    //Manejador del menu lateral
    $(".side-menu").hover(function(){
        showMenu();
    },function(){
        hideMenu();
    });

    $(".navbar-expand").click(function(){
        showMenu();
    });

    $(".navbar-expand-toggle").click(function(){
        hideMenu();
    });

//manejador de alertas
function alertas(clase,msj) {
    $(".alert").show();
    $(".alert").addClass(class);
    $(".alert #content").html(msj);
    setTimeout(function(){ $(".alert").hide(); }, 4000);
}
///////////////////////////////////////////
//muestra el menu
function showMenu(){
    $(".side-menu").width("250px"); 
    $(".navbar-expand-toggle").show();  
    $(".side-menu .title").show();                 
}

//oculta el menu
function hideMenu(){
    $(".side-menu").width("60px"); 
    $(".navbar-expand-toggle").hide();
    $(".side-menu .title").hide();                        
}
///////////////////////////////////////////
});*/