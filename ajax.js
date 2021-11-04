let aumentar = 0;
let diminuir = 0;
let mes = new Date;
let mesAtual = mes.getMonth();
mesAtual++;
let f = {
    mesAtual: mesAtual
}
$.ajax({
    url: "calendario.php",
    data: f,
    dataType: "html",
    type: "POST",
    success: (data) => {
        $(".date").html(data);

        document.querySelectorAll(".diasnumber").forEach(element => {
            let day = {
                dia: element.getAttribute("dia")
            }
            $.ajax({
                url: "event.php?req=1",
                data: day,
                dataType: "JSON",
                type: 'POST',
                success: (data) => {
                    if (data.length > 0) {
                        element.classList.add("lembrete");
                        let numero = element.innerHTML;
                        element.addEventListener("mouseover", () => {
                            let div = document.createElement("div");
                            div.innerHTML = `<div class='alerta'><div>${data[0].Nome}</div><div>${data[0].Descricao}</div><div>${data[0].Horario}</div></div>`;
                            element.appendChild(div);
                        });
                        element.addEventListener("mouseout", () => {
                            element.innerHTML = numero;
                        });
                    }
                }
            });
        })
    }
})

$(".mesanterior").click(() => {
    if (mesAtual - 1 != 0) {
        mesAtual--;
    }
    let obj = {
        mesAtual: mesAtual
    }
    $.ajax({
        url: "calendario.php",
        data: obj,
        dataType: "html",
        type: 'POST',
        success: (data) => {
            $(".date").html(data);

            document.querySelectorAll(".diasnumber").forEach(element => {
                let day = {
                    dia: element.getAttribute("dia")
                }
                $.ajax({
                    url: "event.php?req=1",
                    data: day,
                    dataType: "JSON",
                    type: 'POST',
                    success: (data) => {
                        if (data.length > 0) {
                            element.classList.add("lembrete");
                            let numero = element.innerHTML;
                            element.addEventListener("mouseover", () => {
                                let div = document.createElement("div");
                                div.innerHTML = `<div class='alerta'><div>${data[0].Nome}</div><div>${data[0].Descricao}</div><div>${data[0].Horario}</div></div>`;
                                element.appendChild(div);
                            });
                            element.addEventListener("mouseout", () => {
                                element.innerHTML = numero;
                            });
                        }
                    }
                });
            })
        }
    });
})
$(".mesposterior").click(() => {
    if (mesAtual + 1 != 13) {
        mesAtual++;
    }
    let obj = {
        mesAtual: mesAtual
    }
    $.ajax({
        url: "calendario.php",
        data: obj,
        dataType: "html",
        type: "POST",
        success: (data) => {
            $(".date").html(data);

            document.querySelectorAll(".diasnumber").forEach(element => {
                let day = {
                    dia: element.getAttribute("dia")
                }
                $.ajax({
                    url: "event.php?req=1",
                    data: day,
                    dataType: "JSON",
                    type: 'POST',
                    success: (data) => {
                        if (data.length > 0) {
                            element.classList.add("lembrete");
                            let numero = element.innerHTML;
                            element.addEventListener("mouseover", () => {
                                let div = document.createElement("div");
                                div.innerHTML = `<div class='alerta'><div>${data[0].Nome}</div><div>${data[0].Descricao}</div><div>${data[0].Horario}</div></div>`;
                                element.appendChild(div);
                            });
                            element.addEventListener("mouseout", () => {
                                element.innerHTML = numero;
                            });
                        }
                    }
                });
            })
        }
    });
})

let formulario = (element, action) => {
    action.preventDefault();

    let date = $("#Horario").val();
    let date_replace = date.replaceAll("/", "_");
    let obj = {
        Data: date_replace,
        Nome: $("#Nome").val(),
        Descricao: $("#Descricao").val()
    };
 
    $.ajax({
        url: "enviar.php",
        type: "POST",
        data: obj,
        dataType: "html",
        success: (data) => {
            document.location.reload(true);
        }
    })

}