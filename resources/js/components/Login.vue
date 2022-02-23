<template>
    <div class="content">
        <form @submit.prevent="loginForm">
            <input type="email" v-model="email" name="email" id="email" placeholder="Email" required>
            <input type="password" v-model="password" name="password" id="password" placeholder="Hasło" required><br>
            <p v-if="error === 1" style="color:red;text-align: center">Nie istniejesz gościu</p>
            <p v-if="error === 2" style="color:red;text-align: center">Błędne Hasło</p>
            <button type="submit">Zaloguj</button>
        </form>
        <span>Nie masz jeszcze konta? <a href="/register">Zarejestruj sie!</a></span>
    </div>
</template>

<script>
export default {
    name: "Login",
    data: function () {
        return {
            error: 0,
            success: 0,
            email: '',
            password: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        this.checkIfLogged();
    },
    methods: {
        async loginForm() {
            const res = await fetch('/api/loginCheck', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json'},
                body: JSON.stringify({
                    email: this.email,
                    password: this.password,
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
