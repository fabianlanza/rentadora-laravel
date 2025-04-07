<template>
    <MainLayout :TabSeleccionada="1">

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
        </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { defineProps, ref } from 'vue';
import CarCard from '@/components/CarCard.vue';

// Recibimos los autos como propiedad del controlador a través de Inertia
const props = defineProps({
    autos: Array, // Asegúrate de que sea un array de autos
});


// Constante para decirle a las tab que Autos esta seleccionado
// const TabSeleccionada = ref(1);
</script>

<style scoped>

</style>
