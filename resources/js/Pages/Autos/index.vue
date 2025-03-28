<template>
    <v-app>


        <!-- Nav Bar-->
        <v-app-bar app color="#eeeeee" elevation="0">
            <v-container class="d-flex justify-space-between align-center">

                <!-- Logo y titulo-->
                <v-img src="/images/logo.jpeg" max-height="40" max-width="120" contain></v-img>
                <!--                <v-btn text>ViaCar</v-btn>-->
                <v-spacer></v-spacer>

                <!-- Navegación Nueva usando Inertia para evitar recargar toda la pagina-->
                <!-- Usa v-model para decirle a las tabs cual esta seleccionada -->
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
            <!-- Tarjetas de Autos usando Componente CarCard-->
            <v-container style="max-width: 75vw; margin: 0 auto;">
                <h1 class="text-center my-6">Autos Disponibles</h1>
                <v-row justify="center" class="mt-10">
                    <!-- Se usa el componente CarCard para cada auto -->
                    <CarCard v-for="auto in autos" :key="auto.id" :auto="auto" />
                </v-row>
            </v-container>

        </v-main>
    </v-app>
</template>



<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import CarCard from '@/components/CarCard.vue';

const autos = ref([]);

onMounted(async () => {
    try {
        // Se hace la petición a la API para obtener todos los autos
        const response = await axios.get('/api/autos');
        autos.value = response.data;
    } catch (error) {
        console.error('Error al obtener autos:', error);
    }
});

// Constante para decirle a las tab que Autos esta seleccionado
const TabSeleccionada = ref(1);

// import CarCard from '@/components/CarCard.vue';
//
// defineProps({
//     autos: Array
// });
</script>





<style scoped>

</style>
