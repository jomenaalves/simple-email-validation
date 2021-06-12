class RegisterController
{
    constructor()
    {
        this.btnSendToBeRegistered = this.qs('#register');
        this.textEmailField = this.qs('#email');
        this.userName = this.qs('#username');
        this.password = this.qs('#password');
        this.error = this.qs('.error');
        this.loading = this.qs('.loading');
        this.divValidateEmail = this.qs('.verifyEmail');
        this.divSuccess = this.qs('.success');
        this.numbers = this.qsA('[data-js="numbersValidate"]');
        this.verifyNumbers = this.qs('#getNumbers');
        this.currentNumbers = 0; 
        this.initEvents();
    }

    initEvents()
    {
        this.btnSendToBeRegistered.addEventListener('click', () => {
            // url to cadaster 
            const url = `http://localhost/validacao-email/api/register/${this.userName.value}/${this.textEmailField.value}/${this.password.value}`;


            if(this.verifyFields() == false) {
                this.error.classList.add('dis-flex')
                this.error.innerHTML = "Preencha todos os campos!"
            }else{
                this.error.classList.remove('dis-flex')
                this.loading.classList.add('dis-flex');

                fetch(url, {
                    method: "POST"
                }).then(response => {
                    this.loading.classList.remove('dis-flex');
                    return response.json();
                }).then(response => {
                    // showModalToVerifyEmail
                    this.divValidateEmail.classList.add('dis-flex');

                    console.log(response);
                })
                
            }
        });

        this.numbers.forEach(element => {
            element.addEventListener('keyup', (e) => {
                if(this.currentNumbers < this.numbers.length - 1){
                    this.currentNumbers ++;
                    this.numbers[this.currentNumbers].focus();
                }
            })
        });


        this.verifyNumbers.addEventListener('click', (e) => {
            e.preventDefault();
            let numbers = '';

            this.numbers.forEach(element => {
                if(element.value !== ""){
                    numbers += element.value;
                }
            });

            const url = `http://localhost/validacao-email/api/verifyRandAndMakeCadaster/${parseInt(numbers)}/${this.userName.value}/${this.textEmailField.value}/${this.password.value}`;

            fetch(url, {
                method : 'POST'
            }).then(response => {
                return response.json();
            }).then(response => {
                if(response == true){

                    this.numbers.forEach(element => {
                       if(element.classList.contains('error')){
                            element.classList.remove('error');
                        }
                     });

                     console.log(numbers);
                     // showModalSucess
                     this.divValidateEmail.classList.remove('dis-flex');
                     this.divSuccess.classList.add('dis-flex');
                }else{
                    this.numbers.forEach(element => {
                       element.classList.add('error');
                    });
                }
            })
        })

    }

    verifyFields()
    {

        const verifyIfFieldsIsNotEmpty = this.textEmailField.value !== "" && this.userName.value !== "" && this.password.value !== "";
        
        if(verifyIfFieldsIsNotEmpty) return true;
        
        return false;
    }

    qs(params)
    {
        return document.querySelector(params);
    }
    qsA(params)
    {
        return document.querySelectorAll(params);
    }
}