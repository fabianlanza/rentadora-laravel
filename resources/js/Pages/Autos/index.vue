<template>
    <v-app>
        <!-- Nav Bar-->
        <v-app-bar app color="#eeeeee" elevation="0">
            <v-container class="d-flex justify-space-between align-center">
                <v-img src="/images/logo.png" max-height="40" max-width="120" contain></v-img>
                <v-spacer></v-spacer>

                <v-tabs v-model="TabSeleccionada" centered>
                    <v-tab tag="div" @click="$inertia.get('/')">Inicio</v-tab>
                    <v-tab tag="div" @click="$inertia.get('/autos')">Autos</v-tab>
                    <v-tab tag="div" @click="$inertia.get('/contacto')">Contacto</v-tab>
                </v-tabs>
                <v-spacer></v-spacer>

                <div class="d-flex gap-2">
                    <v-btn color="#00a9d4" variant="elevated" to="/login">Login</v-btn>
                    <v-btn color="#00a9d4" variant="outlined" to="/register" class="ml-2">Register</v-btn>
                </div>
            </v-container>
        </v-app-bar>

        <v-main>
            <v-container style="max-width: 75vw; margin: 0 auto;">
                <h1 class="text-center my-6">Autos Disponibles</h1>

                <!-- Verifica si hay autos -->
                <v-row justify="center" class="mt-10">
                    <template v-if="autos.length > 0">
                        <CarCard v-for="auto in autos" :key="auto.id" :auto="auto" />
                    </template>
                    <template v-else>
                        <p class="text-center">No hay autos disponibles.</p>
                    </template>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<script setup>
import { defineProps, ref } from 'vue';
import CarCard from '@/components/CarCard.vue';

// Recibimos los autos como propiedad del controlador a través de Inertia
const props = defineProps({
    autos: Array, // Asegúrate de que sea un array de autos
});

// Constante para decirle a las tab que Autos esta seleccionado
const TabSeleccionada = ref(1);
</script>

<style scoped>

</style>
