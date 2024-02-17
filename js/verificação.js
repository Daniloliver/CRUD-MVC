function Cadastro(){

            // VALIDAÇÃO DO NOME
            
            let name = document.getElementById("name").value

            if (name.trim() === "" || name.length <= 3){
                alert('Nome inválido.');
                document.getElementById('name').focus();
                return false;
            }

            // VALIDAÇÃO DE EMAIL

            let email = document.getElementById("email").value

            let reg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if(!reg.test(email)){
                    alert("E-mail inválido.");
                    document.getElementById('email').focus();
                    return false;   
            }
            
            // VALIDAÇÃO DO GÊNERO

            let masculino = document.getElementById("masculino").checked;

            let feminino = document.getElementById("feminino").checked;

            if (!masculino && !feminino) {
                alert("Selecione o gênero.");
                return false;
            }

            return true
}