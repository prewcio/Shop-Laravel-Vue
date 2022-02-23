<template>
    <div>
        <div class="loader" v-if="loading===true"><img src="/img/loader.gif" /></div>
        <div class="content">
            <h1>Moje Konto</h1><br>
            <h1>Imię i Nazwisko</h1>
            <p>{{ account.firstName }} {{ account.lastName }}</p>
            <h1>Adres E-Mail</h1>
            <p>{{ account.email }}</p>
            <a href="/logout">Wyloguj się</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Account",
    data: function () {
        return {
            account: [],
            loading: true,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        this.loadCartItems();
    },

    methods: {
        loadCartItems: function () {
            axios.post('/api/accountInfo', {
                sessionID: this.csrf
            })
                .then((response) => {
                    this.account = response.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500);
                })
                .catch(function (error) {
                    console.log(error);
                    window.location.href = "/login";
                });
        }
    }
}
</script>

<style scoped>

</style>
