<template>
    <div class="content">
        <form @submit.prevent="registerForm">
            <input type="text" v-model="firstName" name="firstName" id="firstName" placeholder="Imie" required>
            <input type="text" v-model="lastName" name="lastName" id="lastName" placeholder="Nazwisko" required>
            <input type="email" v-model="email" name="email" id="email" placeholder="Email" required>
            <input type="password" v-model="password" name="password" id="password" placeholder="Hasło" required>
            <input type="password" v-model="passwordVerify" name="passwordVerify" id="passwordVerify" placeholder="Potwierdź Hasło" required>
            <p v-if="error === 1" style="color:red;text-align: center">Konto na ten adres już istnieje.</p>
            <p v-if="error === 2" style="color:red;text-align: center">Hasła nie są takie same.</p>
            <button type="submit">Zarejestruj</button>
        </form>
        <span>Masz już konto? <a href="/login">Zaloguj sie!</a></span>
    </div>
</template>

<script>
export default {
    name: "Register",
    data: function () {
        return {
            firstName: '',
            lastName: '',
            email: '',
            password: '',
            passwordVerify: '',
            error: 0,
            success: 0,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        this.checkIfLogged();
    },
    methods: {
        async registerForm() {
            const res = await fetch('/api/registerCheck', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json'},
                body: JSON.stringify({
                    firstName: this.firstName,
                    lastName: this.lastName,
                    email: this.email,
                    password: this.password,
                    passwordVerify: this.passwordVerify,
                    token: this.csrf
                })
            })
            const data = await res.json();
            this.error = data.error;
            this.success = data.success;
            if(this.success===1){
                window.location.href = "/account";
            }
        },
        checkIfLogged: function (){
            axios.post('/api/checkLogged', {
                'token': this.csrf
            })
                .then((response) => {
                    if(response.data.success==1){
                        window.location.href = "/account";
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
