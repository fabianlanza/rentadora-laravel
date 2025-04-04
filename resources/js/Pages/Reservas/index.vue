

<template>

    <v-app>
        <v-app-bar app color="#eeeeee" elevation="0">
            <v-container class="d-flex justify-space-between align-center">

                <!-- Logo y titulo-->
                <v-img src="/images/logo.png" max-height="40" max-width="120" contain></v-img>
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

<!--            Estructura Aqui-->
            <!-- Trae informacion del auto desde el controlador -->
            <v-container>
                <h1>Reserva de Auto</h1>
                <v-card v-if="auto">
                    <v-img :src="auto.imagen || '/images/default-car.jpg'" height="180"></v-img>
                    <v-card-title>{{ auto.marca }} - {{ auto.modelo }}</v-card-title>
                    <v-card-text>
                        Motor: {{ auto.motor }} <br>
                        Precio Base: ${{ auto.Precio_base }} <br>
                        Color: {{ auto.color }}<br>
                        Año : {{ auto.año }}<br>
                        Numero de asientos :{{auto.Numero_asientos}}<br>
                        Detalles :{{auto.Detalles_desperfectos}}<br>
                        Aire :{{auto.Aire_acondicionado}}
                    </v-card-text>
                </v-card>
                <v-btn color="primary">Confirmar Reserva</v-btn>
            </v-container>

        </v-main>


    </v-app>
</template>


<script setup>
import { defineProps } from 'vue';

defineProps({
    auto: Object // Recibe los datos del auto desde Laravel
});
</script>


<style scoped>

</style>
