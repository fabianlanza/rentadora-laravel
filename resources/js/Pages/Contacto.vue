
<template>
    <v-app>
        <!-- NavBar-->
        <v-app-bar app color="#eeeeee" elevation="0">
            <v-container class="d-flex justify-space-between align-center">

                <!-- Logo y titulo-->
                <v-img src="/images/logo.jpeg" max-height="40" max-width="120" contain></v-img>
                <!--                <v-btn text>ViaCar</v-btn>-->
                <v-spacer></v-spacer>

                <!-- Navegación Nueva usando Inertia para evitar recargar toda la pagina-->
                <v-tabs v-model="TabSeleccionada" centered>
                    <v-tab tag="div" @click="$inertia.get('/')">Inicio</v-tab>
                    <v-tab tag="div" @click="$inertia.get('/autos')">Autos</v-tab>
                    <v-tab tag="div" @click="$inertia.get('/contacto')">Contacto</v-tab>
                </v-tabs>
                <v-spacer></v-spacer>

                <!--                 Botones de Login y Register -->
                <div class="d-flex gap-2">
                    <v-btn color="#00a9d4" variant="elevated" to="/login">Login</v-btn>
                    <v-btn color="#00a9d4" variant="outlined" to="/register" class="ml-2">Register</v-btn>
                </div>
            </v-container>
        </v-app-bar>



        <v-main>

<!--            Estructura de pagina aqui-->

        <h1>Hola</h1>





        </v-main>


    </v-app>
</template>



<script setup>
import {ref} from "vue";

const TabSeleccionada = ref(2)


</script>




<style scoped>

</style>
