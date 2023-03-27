$(document).ready(function () {

    /**
     * BUSCA LINK BASE
     */

    var basicUrl = window.location
    var origin = basicUrl.origin
    var pathname = basicUrl.pathname

    var obs = pathname.split('/')

    const linkBase = origin + '/' + obs[1] + '/' + obs[2]

    /**
     * ---- FUNÇÕES ----
     */

    // FUNCAO FORMATA CEP
    formatarCep = (e) => {

        var v = e.target.value.replace(/\D/g, "")

        v = v.replace(/^(\d{5})(\d)/, "$1-$2")

        e.target.value = v;

    }

    // FUNÇÃO QUE BUSCA DADOS DO CEP
    getCep = async (cep) => {

        cep.replace('-', '')

        let response = await fetch(`https://viacep.com.br/ws/${cep}/json/`)
        let data = await response.json()

        return data

    }

    // CARREGA IMAGEM DO UPLOAD FILE
    var inputFiles = document.querySelectorAll('.upload-file')

    inputFiles.forEach((i) => {
        i.addEventListener('input', (e) => {

            var idImagem = e.target.id

            if (e.target.files && e.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.querySelector(`#preview-${idImagem}`).src = e.target.result
                }
                reader.readAsDataURL(e.target.files[0])
            }
        })
    })


    chekedCompletedForm = () => {

        if (document.querySelector('#setFormConcluded')) {

            let token = document.querySelector('#input-token').value

            let http = new XMLHttpRequest()

            http.open("GET", linkBase + '/set-completed/' + token)
            http.send()
            http.onload = () => console.log(http.response)

            let modal = document.querySelector('#fireworksEffect')

            let myModal = new bootstrap.Modal(modal)

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

            myModal.show()

            $("#fireworksEffect").fireworks()
            jQuery("#fireworksEffect").before(jQuery("canvas"))
        }

    }


    atualizaProgressBarForm = () => {

        let totalForms = document.querySelectorAll('form')
        let completedForm = document.querySelectorAll('.visibility-visible')

        if (completedForm.length > 0) {

            let countForms = totalForms.length
            let countCompleted = completedForm.length
            let calc = countCompleted / countForms * 100

            var bar1 = new ldBar("#progBar")
            var bar2 = document.querySelector('#progBar').ldBar
            bar1.set(calc)

            if (calc == 100) {

                chekedCompletedForm()

                let btnSaveForm = document.querySelectorAll('button.btn-primary')
                let inputs = document.querySelectorAll('input.form-control')
                let selecForm = document.querySelectorAll('select')
                let textAreaForm = document.querySelectorAll('textarea')

                btnSaveForm.forEach((i) => {
                    i.disabled = true
                })

                inputs.forEach((i) => {
                    i.disabled = true
                })

                selecForm.forEach((i) => {
                    i.disabled = true
                })

                textAreaForm.forEach((i) => {
                    i.disabled = true
                })
            }
        }
    }

    if (document.querySelector('#progBar')) {

        atualizaProgressBarForm()
    }



    /**
     * ---- OPERAÇÕES ----
     */


    // PEGA VALOR INPUT COLOR E ALIMENTA NO INPUT
    var inputColor = document.querySelectorAll('.input-color')

    if (inputColor !== null) {

        inputColor.forEach((i) => {
            i.addEventListener('input', () => {
                var id = i.id
                var hexaCor = i.value
                var inputDestino = id.replace('input-', '')

                document.querySelector(`#${inputDestino}`).value = hexaCor
            })
        })
    }


    // PEGA VALOR INPUT E ALIMENTA NO INPUT  COLOR
    var inputNameColor = document.querySelectorAll('.name-color')

    if (inputNameColor !== null) {

        inputNameColor.forEach((i) => {
            i.addEventListener('change', () => {

                var cor = i.value

                if (cor.indexOf('#') >= 0) {

                    document.querySelector(`#input-${i.id}`).value = i.value
                } else {

                    document.querySelector(`#input-${i.id}`).value = getColor(cor.replace(' ', '-'))
                }
            })
        })
    }


    //  ADICIONA INFORMAÇÃO NO MODAL (NOVO FORMULÁRIO)
    var btnNewForm = document.querySelectorAll('.btn-modal-new-form')
    var tipoProjeto = document.querySelector('#tipo-projeto')

    if (btnNewForm !== null) {

        btnNewForm.forEach((i) => {
            i.addEventListener('click', () => {
                tipoProjeto.value = i.id
            })
        })
    }


    //  SELECIONA SE DEVE OU NÃO APARECER OS CAMPOS DE LOGIN DO DOMINIO
    var selectAgencia = document.querySelector('#seleciona-agencia')
    var inputsLoginDominio = document.querySelector('#login-dominio')

    if (selectAgencia !== null) {

        selectAgencia.addEventListener('change', (e) => {

            if (e.target.value == 0) {

                if (inputsLoginDominio.classList.contains('visibility-hidden')) {

                    inputsLoginDominio.classList.remove('visibility-hidden')
                    inputsLoginDominio.classList.add('visibility-visible')

                    document.querySelector('#usuarioDominio').required = true
                    document.querySelector('#senhaDominio').required = true
                }
            } else {

                inputsLoginDominio.classList.add('visibility-hidden')
                inputsLoginDominio.classList.remove('visibility-visible')

                document.querySelector('#usuarioDominio').required = false
                document.querySelector('#senhaDominio').required = false
            }
        })
    }


    // EXIBE OS CAMPOS DAS OPÇÕES DE PAGAMENTO (PAGAMENTO)
    var sectionPaymentMethod = document.querySelectorAll('.sectionPaymentMethod')
    var selectPayment = document.querySelector('#seleciona-pagamento')

    if (selectPayment !== null) {

        selectPayment.addEventListener('change', (e) => {

            var paymentSelected = e.target.value

            sectionPaymentMethod.forEach((i) => {

                if (i.id == paymentSelected) {

                    if (i.classList.contains('display-none')) {
                        i.classList.remove('display-none')
                    }
                } else {

                    if (!i.classList.contains('display-none')) {
                        i.classList.add('display-none')
                    }
                }
            })
        })
    }


    // EXIBE OS CAMPOS DE OPÇÃO DE FRETE (ENVIO)
    var selectShipping = document.querySelector('#select-gateway-frete')
    var freteFacil = document.querySelector('#dadosFreteFacil')
    var nomeGatewayFrete = document.querySelector('#nomeGatewayFrete')

    if (selectShipping !== null) {

        selectShipping.addEventListener('change', (e) => {

            var gatewayFrete = e.target.value

            if (gatewayFrete == 1) {

                document.querySelector('#gatewayFrete').required = true
                document.querySelector('#loginGatewayFrete').required = true
                document.querySelector('#senhaGatewayFrete').required = true
                document.querySelector('#select-correios').required = false
                document.querySelector('#select-jadlog').required = false

                if (nomeGatewayFrete.classList.contains('display-none')) {

                    nomeGatewayFrete.classList.remove('display-none')
                    nomeGatewayFrete.classList.add('display-block')
                }

                if (freteFacil.classList.contains('display-block')) {

                    freteFacil.classList.remove('display-block')
                    freteFacil.classList.add('display-none')
                }
            } else {

                document.querySelector('#gatewayFrete').required = false
                document.querySelector('#loginGatewayFrete').required = false
                document.querySelector('#senhaGatewayFrete').required = false
                document.querySelector('#select-correios').required = true
                document.querySelector('#select-jadlog').required = true

                if (nomeGatewayFrete.classList.contains('display-block')) {

                    nomeGatewayFrete.classList.remove('display-block')
                    nomeGatewayFrete.classList.add('display-none')
                }

                if (freteFacil.classList.contains('display-none')) {

                    freteFacil.classList.remove('display-none')
                    freteFacil.classList.add('display-block')
                }
            }
        })
    }


    // EXIBE OS CAMPOS DE OPÇÃO DE DESCONTO E FRET GRATIS (DESCONTOS)
    var opDescBoleto = document.querySelector('#op-desc-boleto')
    var descBoleto = document.querySelector('#desconto-boleto')
    var opDescPix = document.querySelector('#op-desc-pix')
    var descPix = document.querySelector('#desconto-pix')
    var opDescProg = document.querySelector('#op-desc-prog')
    var descProg = document.querySelector('#regra-desconto-progessivo')
    var opDescFreteGratis = document.querySelector('#op-fg')
    var descFg = document.querySelector('#regra-frete-gratis')

    // DESCONTO BOLETO
    if (opDescBoleto !== null) {

        opDescBoleto.addEventListener('change', (e) => {

            let valorSelect = e.target.value

            if (valorSelect == 1) {

                document.querySelector('#desc-boleto').required = true

                if (descBoleto.classList.contains('display-none')) {

                    descBoleto.classList.remove('display-none')
                    descBoleto.classList.add('display-block')
                }
            } else {

                document.querySelector('#desc-boleto').required = false

                if (descBoleto.classList.contains('display-block')) {

                    descBoleto.classList.remove('display-block')
                    descBoleto.classList.add('display-none')
                }
            }
        })
    }

    // DESCONTO PIX
    if (opDescPix !== null) {

        opDescPix.addEventListener('change', (e) => {

            let valorSelect = e.target.value

            if (valorSelect == 1) {

                document.querySelector('#desc-pix').required = true

                if (descPix.classList.contains('display-none')) {

                    descPix.classList.remove('display-none')
                    descPix.classList.add('display-block')
                }
            } else {

                document.querySelector('#desc-pix').required = false

                if (descPix.classList.contains('display-block')) {

                    descPix.classList.remove('display-block')
                    descPix.classList.add('display-none')
                }
            }
        })
    }

    // DESCONTO PROGRESSIVO
    if (opDescProg !== null) {

        opDescProg.addEventListener('change', (e) => {

            let valorSelect = e.target.value

            if (valorSelect == 1) {

                document.querySelector('#regra-desc-prog').required = true

                if (descProg.classList.contains('display-none')) {

                    descProg.classList.remove('display-none')
                    descProg.classList.add('display-block')
                }
            } else {

                document.querySelector('#regra-desc-prog').required = false

                if (descProg.classList.contains('display-block')) {

                    descProg.classList.remove('display-block')
                    descProg.classList.add('display-none')
                }
            }
        })
    }

    // DESCONTO FRETE GRATIS
    if (opDescFreteGratis !== null) {

        opDescFreteGratis.addEventListener('change', (e) => {

            let valorSelect = e.target.value

            if (valorSelect == 1) {

                document.querySelector('#regra-fg').required = true

                if (descFg.classList.contains('display-none')) {

                    descFg.classList.remove('display-none')
                    descFg.classList.add('display-block')
                }
            } else {

                document.querySelector('#regra-fg').required = false

                if (descFg.classList.contains('display-block')) {

                    descFg.classList.remove('display-block')
                    descFg.classList.add('display-none')
                }
            }
        })
    }

    // MANIPULAÇÃO CAMPO CEP (PÁGINA DADOS DE ENVIO)
    var cepEnvio = document.querySelector('#cepEnvio')

    // BUSCA DADOS CEP
    if (cepEnvio !== null) {

        cepEnvio.addEventListener('change', () => {

            getCep(cepEnvio.value).then(data => {

                if (data.erro == true) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Não foi possível encontrar dados do CEP informado. Verifique se o CEP digitado está correto e tente novamente'
                    })

                } else {

                    document.querySelector('#ruaEnvio').value = data.logradouro
                    document.querySelector('#bairroEnvio').value = data.bairro
                    document.querySelector('#complementoEnvio').value = data.complemento
                    document.querySelector('#cidadeEnvio').value = data.localidade
                    document.querySelector('#ufEnvio').value = data.uf
                }
            })
        })
    }

    // EXIBE CAMPOS DE LOGIN E SENHA DOS MARKETPLACES (MARKETPLACES)
    var americanas = document.querySelector('#op-mktp-am')
    var magalu = document.querySelector('#op-mktp-mg')
    var mercadoLivre = document.querySelector('#op-mktp-ml')
    var loginAm = document.querySelector('#loginAm')
    var loginMg = document.querySelector('#loginMagalu')
    var loginMl = document.querySelector('#loginMl')

    // EXIBE LOGIN AMERICANAS
    if (americanas !== null) {

        americanas.addEventListener('change', (e) => {

            let valor = e.target.value

            if (valor == 1) {

                document.querySelector('#am-login').required = true
                document.querySelector('#am-senha').required = true

                if (loginAm.classList.contains('display-none')) {

                    loginAm.classList.remove('display-none')
                    loginAm.classList.add('display-block')
                }
            } else {

                document.querySelector('#am-login').required = false
                document.querySelector('#am-senha').required = false

                if (loginAm.classList.contains('display-block')) {

                    loginAm.classList.remove('display-block')
                    loginAm.classList.add('display-none')
                }
            }
        })
    }

    // EXIBE LOGIN MAGALU
    if (magalu !== null) {

        magalu.addEventListener('change', (e) => {

            let valor = e.target.value

            if (valor == 1) {

                document.querySelector('#mg-login').required = true
                document.querySelector('#mg-senha').required = true

                if (loginMg.classList.contains('display-none')) {

                    loginMg.classList.remove('display-none')
                    loginMg.classList.add('display-block')
                }
            } else {

                document.querySelector('#mg-login').required = false
                document.querySelector('#mg-senha').required = false

                if (loginMg.classList.contains('display-block')) {

                    loginMg.classList.remove('display-block')
                    loginMg.classList.add('display-none')
                }
            }
        })
    }

    // EXIBE LOGIN MERCADO LIVRE
    if (mercadoLivre !== null) {

        mercadoLivre.addEventListener('change', (e) => {

            let valor = e.target.value

            if (valor == 1) {

                document.querySelector('#ml-login').required = true
                document.querySelector('#ml-senha').required = true

                if (loginMl.classList.contains('display-none')) {

                    loginMl.classList.remove('display-none')
                    loginMl.classList.add('display-block')
                }
            } else {

                document.querySelector('#ml-login').required = false
                document.querySelector('#ml-senha').required = false

                if (loginMl.classList.contains('display-block')) {

                    loginMl.classList.remove('display-block')
                    loginMl.classList.add('display-none')
                }
            }
        })
    }


    // EDITAR USUÁRIO (USUARIOS)
    var editUser = document.querySelectorAll('.editUser')

    if (editUser !== null) {

        editUser.forEach((i) => {
            i.addEventListener('click', () => {
                let idUser = i.id.replace('edit-', '')

                $.ajax({
                    url: linkBase + '/usuarios/get-user/' + idUser,
                    type: 'GET',
                    dataType: "JSON",
                    success: function (data) {

                        document.querySelector('#nomeUsuarioEdit').value = data.nome
                        document.querySelector('#emailEdit').value = data.email
                        document.querySelector('#tipoUsuarioEdit').value = data.type
                        document.querySelector('#idUserEdit').value = idUser

                    }, error: function (error) {

                        console.log(error.responseJSON)
                    }
                })

            })
        })
    }


    // REMOVER USUÁRIO (USUÁRIOS)
    var removeUser = document.querySelectorAll('.removeUser')

    if (removeUser !== null) {

        removeUser.forEach((i) => {

            i.addEventListener('click', () => {
                let idUser = i.id.replace('remove-', '')

                $.ajax({
                    url: linkBase + '/usuarios/remove/' + idUser,
                    type: 'GET',
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function (result) {

                        sweetAlertSuccess(result)

                        document.getElementById(`${idUser}`).remove()

                    }, error: function (error) {

                        sweetAlertError(error)
                    }
                })
            })
        })
    }


    // ALTERAR IMAGEM USUARIO
    var inputFileImgProfile = document.querySelector('#userImgProfile')

    if (inputFileImgProfile) {

        inputFileImgProfile.addEventListener('change', (e) => {

            if (e.target.files && e.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.querySelector("#img-user").src = e.target.result
                }
                reader.readAsDataURL(e.target.files[0])
            }

            var formEditImgProfile = document.querySelector('#formEditImgProfile')

            var imagem = new FormData(formEditImgProfile)

            $.ajax({
                url: linkBase + '/edit-img-profile',
                data: imagem,
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {

                    sweetAlertSuccess(data)
                }, error: function (error) {

                    sweetAlertError(error.responseJSON)
                }
            })
        })
    }

    // MANIPULA BOTÕES TELA PERFIL
    let editarPerfil = document.querySelector('#editProfile')
    let cancelaEdicaoPerfil = document.querySelector('#cancelaEdicao')
    let saveEdition = document.querySelector('#saveEdition')
    let inputNomePerfil = document.querySelector('#nomePerfil')
    let inputEmailPerfil = document.querySelector('#emailPerfil')
    let btnEditPass = document.querySelector('#alterarPass')

    if (editarPerfil) {

        editarPerfil.addEventListener('click', () => {

            editarPerfil.classList.add('display-none')
            editarPerfil.classList.remove('display-block')
            btnEditPass.classList.add('display-none')
            btnEditPass.classList.remove('display-block')

            inputEmailPerfil.disabled = false
            inputNomePerfil.disabled = false

            cancelaEdicaoPerfil.classList.remove('display-none')
            cancelaEdicaoPerfil.classList.add('display-block')
            saveEdition.classList.remove('display-none')
            saveEdition.classList.add('display-block')
        })
    }

    if (cancelaEdicaoPerfil) {

        cancelaEdicaoPerfil.addEventListener('click', () => {

            inputEmailPerfil.disabled = true
            inputNomePerfil.disabled = true

            cancelaEdicaoPerfil.classList.add('display-none')
            cancelaEdicaoPerfil.classList.remove('display-block')
            saveEdition.classList.add('display-none')
            saveEdition.classList.remove('display-block')

            editarPerfil.classList.remove('display-none')
            editarPerfil.classList.add('display-block')

            btnEditPass.classList.remove('display-none')
            btnEditPass.classList.add('display-block')
        })
    }

    if (btnEditPass) {

        let newPass = document.querySelector('#newPassword')
        let confirmPass = document.querySelector('#confirmNewPassword')
        let btnSaveEdit = document.querySelector('#save-edit-profile')

        newPass.addEventListener('change', () => {

            confirmPass.disabled = false
        })

        confirmPass.addEventListener('change', () => {

            
            if (newPass.value === confirmPass.value) {

                btnSaveEdit.disabled = false
                // enviar alteração de senha
            } else {

                sweetAlertError('Senhas não conferem')
                btnSaveEdit.disabled = true
            }
        })
    }

    /**
     *  ---- MÁSCARAS DE INPUT ----
     */

    // ADICIONA MÁSCARA PARA O CAMPO CEP
    let inputCep = document.querySelectorAll('.inpu-cep')

    if (inputCep) {

        inputCep.forEach((i) => {

            i.addEventListener("input", (e) => {

                formatarCep(e)
            })
        })
    }



    // ADICIONA MÁSCARA DE PREÇO PARA INPUT
    var inputPreco = document.querySelectorAll(".maskPreco");

    if (inputPreco) {

        inputPreco.forEach((i) => {

            i.addEventListener("input", (e) => {

                let value = e.target.value.replace(/\D/g, '')

                let formatValue = (Number(value) / 100).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: "BRL"
                })

                e.target.value = formatValue
            })
        })
    }



    // ADICIONA MÁSCARA TELEFONE

    var inputPhone = document.querySelectorAll('.phone')

    inputPhone.forEach((i) => {

        i.addEventListener('input', (e) => {

            let value = e.target.value

            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")

            i.value = value
        })
    })


    // ADICIONA % NO INPUT
    var inputPorcentagem = document.querySelectorAll('.input-porcentagem')

    if (inputPorcentagem !== null) {

        inputPorcentagem.forEach((i) => {

            i.addEventListener('change', () => {

                i.value = i.value + '%'
            })
        })
    }

})




/**
 * SWEET ALERT
 */

sweetAlertSuccess = (msg) => {

    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: msg,
        showConfirmButton: false,
        timer: 1600
    })
}

sweetAlertError = (msg) => {

    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: msg,
        showConfirmButton: false,
        timer: 1600
    })
}