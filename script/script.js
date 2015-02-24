
   function llamarAPI()
    {
        var usuario = $("#usuarioVal").val();
        var password = $("#passwordVal").val();
        $.ajax({
            type: "POST",
            url: "http://jingle.nop.al/API/usuarios/login",
            data: "",
            dataType: "json",
            beforeSend: function (xhr){
                xhr.setRequestHeader("Authorization", make_base_auth(usuario,password));
            },
            success: function (data)
            {
				window.location.href = "index.html"
            },
			error : function(data){
				$('#errorMessage').html("Usuario o Contraseña Incorrectos");
			}
        });
    }
    function make_base_auth(user, password)
    {
        var tok = user + ':' + password;
        var hash = btoa(tok);
        return "Basic " + hash;
    }