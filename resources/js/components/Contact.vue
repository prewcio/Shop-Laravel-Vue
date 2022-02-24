<template>
    <div class="container contact" data-aos="fade-zoom" data-aos-duration="1000">
        <div class="split">
            <div class="contactForm">
                <form @submit.prevent="sendMessage">
                    <input type="text" name="name" id="name" placeholder="Imie i Nazwisko" required>
                    <input type="email" v-model="email" name="email" id="email" placeholder="Email" required>
                    <input type="tel" v-model="phoneNumber" name="phone" id="phone" placeholder="Numer Telefonu" required>
                    <textarea name="msg" v-model="message" id="msg" cols="30" rows="10" placeholder="Wiadomosc" required></textarea><br>
                    <p style="color:green" v-if="sent===1">Wiadomość wysłana!</p>
                    <button type="submit">Wyślij</button>
                </form>
            </div>
            <div class="contact-us">
                <h1>Kontakt do nas</h1>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <p>Lorem ipsum</p>
                <i class="ri-facebook-fill"></i>
                <i class="ri-instagram-fill"></i>
                <i class="ri-twitter-fill"></i>
            </div>
        </div>
        <div class="split">
            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=1215&height=400&hl=en&q=plac%20Defilad%201%20Warszawa+()&t=&z=13&ie=UTF8&iwloc=B&output=embed"></iframe>
        </div>
    </div>
</template>

<script>
export default {
    name: "Contact",
    data: function () {
        return {
            name: '',
            email: '',
            phoneNumber: '',
            message: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    methods: {
        async sendMessage() {
            const res = await fetch('/api/sendMessage', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json'},
                body: JSON.stringify({
                    name: this.name,
                    email: this.email,
                    phoneNumber: this.phoneNumber,
                    message: this.message,
                    token: this.csrf
                })
            })
            const data = await res.json();
            this.error = data.error;
            this.success = data.success;
            if(this.success===1){
                window.location.href = "/account";
            }
        }
    }
}
</script>

<style scoped>

</style>
