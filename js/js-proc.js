document.addEventListener("DOMContentLoaded", function () {
    const formLogin = document.getElementById("formLogin");

    formLogin.addEventListener("submit", function (event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const senha = document.getElementById("senha").value;

        
        fetch("php/proc-js.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `email=${email}&senha=${senha}`,
        })
            .then(response => response.text())
            .then(data => {
                if (data === "login_sucesso") {
                    window.location.href = "index.html";
                } else {
                    alert("Falha. Verifique os dados inseridos.");
                }
            })
            .catch(error => {
                console.error("Erro ao processar o login: " + error);
            });
    });
});
