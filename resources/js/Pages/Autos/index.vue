<template>
    <v-app>
        <v-main>
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

// import CarCard from '@/components/CarCard.vue';
//
// defineProps({
//     autos: Array
// });
</script>





<style scoped>

</style>
