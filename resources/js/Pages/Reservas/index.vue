

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


        <v-main class="bg-grey-lighten-4 py-10">
            <v-container>
                <v-row justify="center">
                    <v-col cols="12" md="10">
                        <v-sheet elevation="3" rounded="xl" class="pa-8 bg-white">
                            <v-row class="align-center" no-gutters>
                                <!-- Columna de información -->
                                <v-col cols="12" md="6" class="text-center px-6">
                                    <h1 class="text-h4 text-primary font-weight-bold mb-4">
                                        Reserva de Auto
                                    </h1>

                                    <h2 class="text-h5 font-weight-medium mb-6">
                                        {{ auto?.marca }} - {{ auto?.modelo }}
                                    </h2>

                                    <v-card-text class="text-subtitle-1">
                                        <div class="mb-2"><strong>Motor:</strong> {{ auto?.motor }}</div>
                                        <div class="mb-2"><strong>Precio Base:</strong> ${{ auto?.Precio_base }}</div>
                                        <div class="mb-2"><strong>Color:</strong> {{ auto?.color }}</div>
                                        <div class="mb-2"><strong>Año:</strong> {{ auto?.año }}</div>
                                        <div class="mb-2"><strong>Asientos:</strong> {{ auto?.Numero_asientos }}</div>
                                        <div class="mb-2"><strong>Detalles:</strong> {{ auto?.Detalles_desperfectos }}</div>
                                        <div class="mb-6"><strong>Aire Acondicionado:</strong> {{ auto?.Aire_acondicionado }}</div>
                                    </v-card-text>

                                    <!-- Botón centrado -->
                                    <div class="d-flex justify-center mt-6">
                                        <v-btn
                                            color="primary"
                                            class="text-h6 font-weight-bold rounded-xl px-8 py-4 elevation-2 text-center"
                                            size="large"
                                        >
                                            Confirmar Reserva
                                        </v-btn>
                                    </div>
                                </v-col>

                                <!-- Columna de imagen -->
                                <v-col cols="12" md="6" class="px-4 d-flex justify-center align-center">
                                    <v-img
                                        :src="auto?.imagen || '/images/default-car.jpg'"
                                        class="rounded-xl elevation-5"
                                        cover
                                        max-height="420"
                                        max-width="100%"
                                        aspect-ratio="16/9"
                                        style="object-fit: cover;"
                                    ></v-img>
                                </v-col>
                            </v-row>
                        </v-sheet>
                    </v-col>
                </v-row>
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
