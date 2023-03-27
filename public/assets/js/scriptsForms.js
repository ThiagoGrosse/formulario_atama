$(document).ready(function () {

    var basicUrl = window.location
    var origin = basicUrl.origin
    var pathname = basicUrl.pathname

    var obs = pathname.split('/')

    var linkBase = origin + '/' + obs[1] + '/' + obs[2]


    addCheck = (id) => {

        if (id.classList.contains('visibility-hidden')) {

            id.classList.remove('visibility-hidden')
            id.classList.add('visibility-visible')
        }

        atualizaProgressBarForm()
    }

    //  ENVIA DADOS DE NOVO FORMULÁRIO
    $("#novoFormulario").submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('tipoProjeto', $('#tipo-projeto').val())

        $.ajax({
            url: linkBase + '/create',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {
                location.reload()
            }, error: function (error) {
                location.reload()
            }

        })
    })



    //  ENVIA DADOS FORMULÁRIO (IDENTIDADE VISUAL)
    $("#formIdVisual").submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        var token = document.querySelector("#input-token").value
        var linkDrive = document.querySelector("#linkDrive").value
        var corPrimaria = document.querySelector("#cor-primaria").value
        var corSecundaria = document.querySelector("#cor-secundaria").value
        var corTerciaria = document.querySelector("#cor-terciaria").value
        var naoUsarCor = document.querySelector("#cor-nao-usar").value

        if (corPrimaria.indexOf("#") < 0) {

            corPrimaria = getColor(document.querySelector("#cor-primaria").value)
        }

        if (corSecundaria.indexOf("#") < 0) {

            corSecundaria = getColor(document.querySelector("#cor-secundaria").value)
        }

        if (corTerciaria.indexOf("#") < 0) {

            corTerciaria = getColor(document.querySelector("#cor-terciaria").value)
        }

        dados.append('token', token)
        dados.append('linkDrive', linkDrive)
        dados.append('corPrimaria', corPrimaria)
        dados.append('corPrimaria', corPrimaria)
        dados.append('corSecundaria', corSecundaria)
        dados.append('corTerciaria', corTerciaria)
        dados.append('naoUsarCor', naoUsarCor)

        $.ajax({
            url: linkBase + '/save-id-visual',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#idVisualCheck')
                addCheck(id)

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    //  ENVIA DADOS FORMULÁRIO (INFORMAÇÕES SOBRE O TEMA)
    $("#formInfoTema").submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('token', $("#input-token").val())
        dados.append('nomeLoja', $("#nomeLoja").val())
        dados.append('produtoServico', $("#produtoServico").val())
        dados.append('diferencial', $("#diferencial").val())
        dados.append('linkConcorrente', $("#linkConcorrente").val())
        dados.append('sitesInteressantes', $("#sitesInteressantes").val())
        dados.append('facebook', $("#facebook").val())
        dados.append('instagram', $("#nomeLoja").val())
        dados.append('tiktok', $("#nomeLoja").val())
        dados.append('enderecoRodape', $("#enderecoRodape").val())
        dados.append('atencaoRodape', $("#atencaoRodape").val())
        dados.append('observacaoRodape', $("#observacaoRodape").val())

        $.ajax({
            url: linkBase + '/save-info-tema',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#infoTemaCheck')
                addCheck(id)

            },
            error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    //  ENVIA DADOS FORMULÁRIO (ACESSOS PLATAFORMA)
    $("#formAcessosPlataforma").submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('cd-loja-tray', $('#cd-loja-tray').val())
        dados.append('email-acesso-tray', $('#email-acesso-tray').val())
        dados.append('senha-acesso-tray', $('#senha-acesso-tray').val())
        dados.append('emailGoogle', $('#emailGoogle').val())
        dados.append('token', $('#input-token').val())

        $.ajax({
            url: linkBase + '/save-acesso-plataforma',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#acessosPlataformaCheck')
                addCheck(id)

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    //  ENVIA DADOS FORMULÁRIO (DOMINIO)
    $("#formDominio").submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('dominio', $('#dominio').val())
        dados.append('fornecedor_dominio', $('#aquisicao-dominio').val())
        dados.append('agenciaDominio', $('#seleciona-agencia option:selected').val())
        dados.append('usuarioDominio', $('#usuarioDominio').val())
        dados.append('senhaDominio', $('#senhaDominio').val())
        dados.append('token', $('#input-token').val())

        $.ajax({
            url: linkBase + '/save-dominio',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#dominioCheck')
                addCheck(id)

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    //  ENVIA DADOS FORMULÁRIO (MARKETPLACE)
    $("#formMarketplace").submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('token', $('#input-token').val())
        dados.append('americanas', $('#op-mktp-am option:selected').val())
        dados.append('loginAm', $('#am-login').val())
        dados.append('senhaAm', $('#am-senha').val())
        dados.append('magalu', $('#op-mktp-mg option:selected').val())
        dados.append('loginMg', $('#mg-login').val())
        dados.append('senhaMg', $('#mg-senha').val())
        dados.append('mercadoLivre', $('#op-mktp-ml option:selected').val())
        dados.append('loginMl', $('#ml-login').val())
        dados.append('senhaMl', $('#ml-senha').val())
        dados.append('cadastroMktp', $('#op-mktp-cadastro option:selected').val())

        $.ajax({
            url: linkBase + '/save-marketplaces',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#marketplacesCheck')
                addCheck(id)

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    // ENVIA DADOS FORMULÁRIO (QUEM SOMOS)
    $('#formQuemSomos').submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('token', $('#input-token').val())
        dados.append('quemSomos', $('#quemSomos').val())
        dados.append('slogan', $('#slogan').val())

        $.ajax({
            url: linkBase + '/save-quem-somos',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#sobreEmpresaCheck')
                addCheck(id)

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    // ENVIA DADOS FORUMLÁRIO (CONTATOS)
    $('#formContato').submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('token', $('#input-token').val())
        dados.append('chat', $('#seleciona-chat option:selected').val())
        dados.append('telefoneFixo', $('#telefoneFixo').val())
        dados.append('whatsapp', $('#whatsapp').val())
        dados.append('emailProfissional-01', $('#emailProfissional-01').val())
        dados.append('emailProfissional-02', $('#emailProfissional-02').val())
        dados.append('emailProfissional-03', $('#emailProfissional-03').val())
        dados.append('emailProfissional-04', $('#emailProfissional-04').val())
        dados.append('emailProfissional-05', $('#emailProfissional-05').val())

        $.ajax({
            url: linkBase + '/save-contato',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#contatosCheck')
                addCheck(id)

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    // ENVIA DADOS FORMULÁRIO (PAGAMENTO)
    $("#formMeioPagamento").submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('token', $('#input-token').val())
        dados.append('meioPagamento', $('#seleciona-pagamento option:selected').val())
        dados.append('loginVindi', $('#loginVindi').val())
        dados.append('senhavindi', $('#senhavindi').val())
        dados.append('cd_filiacao', $('#cd_filiacao').val())
        dados.append('usuarioMiop', $('#usuarioMiop').val())
        dados.append('senhaMoip', $('#senhaMoip').val())
        dados.append('tokenMoip', $('#tokenMoip').val())
        dados.append('cd_afiliacao_getnet', $('#cd_afiliacao_getnet').val())
        dados.append('cd_terminal_getnet', $('#cd_terminal_getnet').val())
        dados.append('usuario_captura', $('#usuario_captura').val())
        dados.append('senha_captura', $('#senha_captura').val())
        dados.append('outro_pagamento', $('#outroPagamento').val())

        $.ajax({
            url: linkBase + '/save-pagamento',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#pagamentosCheck')
                addCheck(id)

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    // ENVIA DADOS FORMULÁRIO (ENVIO)
    $("#formEnvio").submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('token', $('#input-token').val())
        dados.append('cepEnvio', $('#cepEnvio').val())
        dados.append('ruaEnvio', $('#ruaEnvio').val())
        dados.append('numeroEnvio', $('#numeroEnvio').val())
        dados.append('bairroEnvio', $('#bairroEnvio').val())
        dados.append('complementoEnvio', $('#complementoEnvio').val())
        dados.append('cidadeEnvio', $('#cidadeEnvio').val())
        dados.append('ufEnvio', $('#ufEnvio').val())
        dados.append('retiradaEmMaos', $('#select-retirada-em-mao option:selected').val())
        dados.append('motoboy', $('#select-motoboy option:selected').val())
        dados.append('gatewayFrete', $('#select-gateway-frete option:selected').val())
        dados.append('nomeGateway', $('#gatewayFrete').val())
        dados.append('loginGatewayFrete', $('#loginGatewayFrete').val())
        dados.append('senhaGatewayFrete', $('#senhaGatewayFrete').val())
        dados.append('correios', $('#select-correios option:selected').val())
        dados.append('jadlog', $('#select-jadlog option:selected').val())

        $.ajax({
            url: linkBase + '/save-envio',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#enviosCheck')
                addCheck(id)

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    // ENVIA DADOS FORUMLÁRIO (DESCONTOS)
    $('#formPrecoDesconto').submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('token', $('#input-token').val())
        dados.append('opDescBoleto', $('#op-desc-boleto').val())
        dados.append('descBoleto', $('#desc-boleto').val())
        dados.append('opDescontoPix', $('#op-desc-pix').val())
        dados.append('descPix', $('#desc-pix').val())
        dados.append('parcelamento', $('#parcelamento').val())
        dados.append('valorMinimo', $('#valor-minimo').val())
        dados.append('opDescProg', $('#op-desc-prog').val())
        dados.append('regraDescProg', $('#regra-desc-prog').val())
        dados.append('opFreteGratis', $('#op-fg').val())
        dados.append('regraFreteGratis', $('#regra-fg').val())

        $.ajax({
            url: linkBase + '/save-precos-descontos',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                let id = document.querySelector('#precosDescontosCheck')
                addCheck(id)

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })





    // ENVIA DADOS NOVO USUARIO (USUARIOS)
    $('#formNewUser').submit(function (e) {
        e.preventDefault()

        var dados = new FormData(this)

        dados.append('nomeUsuario', $('#nomeUsuario').val())
        dados.append('email', $('#email').val())
        dados.append('senha', $('#senha').val())
        dados.append('tipoUsuario', $('#tipoUsuario option:selected').val())

        $.ajax({
            url: linkBase + '/usuarios/novo-usuario',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                // sweetAlertSuccess(data)

                location.reload()

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })



    // EDITA USUARIO
    $('#userEdit').submit(function (e) {
        e.preventDefault()

        let dados = new FormData(this)

        dados.append('idUsuario', $('#idUserEdit').val())
        dados.append('nome', $('#nomeUsuarioEdit').val())
        dados.append('email', $('#emailEdit').val())
        dados.append('senha', $('#senhaEdit').val())
        dados.append('type', $('#tipoUsuarioEdit option:selected').val())

        $.ajax({
            url: linkBase + '/usuarios/edit',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                // sweetAlertSuccess(data)

                location.reload()

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })

    // EDITAR PROPRIO PERFIL
    $('#formEditUserProfile').submit(function (e) {
        e.preventDefault()

        let dados = new FormData(this)

        dados.append('nome', $('#nomePerfil').val())
        dados.append('email', $('#emailPerfil').val())
        dados.append('senha', $('#senhaEdit').val())

        $.ajax({
            url: linkBase + '/perfil/editar',
            data: dados,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                // sweetAlertSuccess(data)

                location.reload()

            }, error: function (error) {

                sweetAlertError(error.responseJSON)
            }
        })
    })


    // ALTERAR SENHA
    $('#editSenhaPerfil').submit(function (e) {
        e.preventDefault()

        let dados = new FormData(this)
        
        $.ajax({
            url: linkBase + '/perfil/alterar/senha',
            data: dados,
            type: "POST",
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                sweetAlertSuccess(data)

                $('#newPassword').val('')
                $('#confirmNewPassword').val('')

                $('#alterarSenha').modal('hide')

            }, error: function (error) {

                sweetAlertError(error)
            }
        })
    })



    // MARCA FORMULÁRIO COMO CONCLUÍDO
    let formularioConcluido = document.querySelector('#setFormConcluded')

    if (formularioConcluido !== null) {

        formularioConcluido.addEventListener('click', () => {

            chekedCompletedForm()
        })
    }


    // ARQUIVA FORMULÁRIO
    let btnArquivar = document.querySelector('#arquivarForm')

    if (btnArquivar) {

        let token = document.querySelector('#input-token').value

        btnArquivar.addEventListener('click', () => {

            let http = new XMLHttpRequest()

            http.open("GET", linkBase + '/set-archived/' + token)
            http.send()
            http.onload = () => sweetAlertSuccess(JSON.parse(http.response))

            location.reload()
        })
    }
})


// BUSCA HEXADECIMAL DA COR
function getColor(string) {

    return listColorsHex[string];
}


sweetAlertSuccess = (msg) => {

    var Toast = Swal.mixin({
        position: 'top-end',
        toast: true,
        width: '300',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    })

    Toast.fire({
        icon: 'success',
        title: msg
    })
}

sweetAlertError = (msg) => {

    var Toast = Swal.mixin({
        position: 'top-end',
        toast: true,
        width: '300',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    })

    Toast.fire({
        icon: 'error',
        title: msg
    })
}
