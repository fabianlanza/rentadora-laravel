

<template>

            <MainLayout TabSeleccionada="1">
            <v-container class="py-12">
                <v-row justify="center">
                    <v-col cols="12" md="10">
                        <!-- Diseño de tarjeta premium -->
                        <v-card elevation="10" rounded="xl" class="tarjeta-reserva">
                            <v-row class="align-center" no-gutters>
                                <!-- Columna de imagen con overlay de marca -->
                                <v-col cols="12" md="6" class="contenedor-imagen-auto">
                                    <v-img
                                        :src="auto?.imagen || '/images/default-car.jpg'"
                                        class="imagen-auto"
                                        cover
                                        height="100%"
                                        gradient="to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.6)"
                                    >
                                        <div class="informacion-marca-modelo">
                                            <div class="text-h4 font-weight-bold text-white">
                                                {{ auto?.marca }}
                                            </div>
                                            <div class="text-h6 text-white">
                                                {{ auto?.modelo }}
                                            </div>
                                        </div>
                                    </v-img>
                                </v-col>

                                <!-- Columna de información con diseño premium -->
                                <v-col cols="12" md="6" class="detalles-auto pa-8">
                                    <h1 class="text-h4 font-weight-bold mb-6 text-primary">
                                        Reserva de Auto
                                    </h1>

                                    <v-divider class="mb-6"></v-divider>

                                    <!-- Especificaciones con iconos -->
                                    <div class="especificaciones-auto mb-6">
                                        <v-row>
                                            <v-col cols="6" class="py-2">
                                                <div class="d-flex align-center">
                                                    <v-icon color="primary" class="mr-2">mdi-engine</v-icon>
                                                    <div>
                                                        <div class="text-caption text-medium-emphasis">Motor</div>
                                                        <div class="text-subtitle-1 font-weight-medium">{{ auto?.motor || 'N/A' }}</div>
                                                    </div>
                                                </div>
                                            </v-col>
                                            <v-col cols="6" class="py-2">
                                                <div class="d-flex align-center">
                                                    <v-icon color="primary" class="mr-2">mdi-currency-usd</v-icon>
                                                    <div>
                                                        <div class="text-caption text-medium-emphasis">Precio Base</div>
                                                        <div class="text-subtitle-1 font-weight-medium">${{ auto?.Precio_base || '0' }}</div>
                                                    </div>
                                                </div>
                                            </v-col>
                                            <v-col cols="6" class="py-2">
                                                <div class="d-flex align-center">
                                                    <v-icon color="primary" class="mr-2">mdi-palette</v-icon>
                                                    <div>
                                                        <div class="text-caption text-medium-emphasis">Color</div>
                                                        <div class="text-subtitle-1 font-weight-medium">{{ auto?.color || 'N/A' }}</div>
                                                    </div>
                                                </div>
                                            </v-col>
                                            <v-col cols="6" class="py-2">
                                                <div class="d-flex align-center">
                                                    <v-icon color="primary" class="mr-2">mdi-calendar</v-icon>
                                                    <div>
                                                        <div class="text-caption text-medium-emphasis">Año</div>
                                                        <div class="text-subtitle-1 font-weight-medium">{{ auto?.año || 'N/A' }}</div>
                                                    </div>
                                                </div>
                                            </v-col>
                                            <v-col cols="6" class="py-2">
                                                <div class="d-flex align-center">
                                                    <v-icon color="primary" class="mr-2">mdi-car-seat</v-icon>
                                                    <div>
                                                        <div class="text-caption text-medium-emphasis">Asientos</div>
                                                        <div class="text-subtitle-1 font-weight-medium">{{ auto?.Numero_asientos || 'N/A' }}</div>
                                                    </div>
                                                </div>
                                            </v-col>
                                            <v-col cols="6" class="py-2">
                                                <div class="d-flex align-center">
                                                    <v-icon color="primary" class="mr-2">mdi-snowflake</v-icon>
                                                    <div>
                                                        <div class="text-caption text-medium-emphasis">A/C</div>
                                                        <div class="text-subtitle-1 font-weight-medium">{{ auto?.Aire_acondicionado || 'N/A' }}</div>
                                                    </div>
                                                </div>
                                            </v-col>
                                        </v-row>
                                    </div>

                                    <v-divider class="mb-6"></v-divider>

                                    <!-- Detalles adicionales -->
                                    <div class="mb-6">
                                        <div class="text-caption text-medium-emphasis mb-1">Detalles</div>
                                        <div class="text-body-1">{{ auto?.Detalles_desperfectos || 'Sin detalles adicionales' }}</div>
                                    </div>

                                    <!-- Botón premium -->
                                    <div class="d-flex justify-center mt-8">
                                        <v-btn
                                            color="primary"
                                            class="text-none font-weight-bold px-8 py-6 boton-confirmar"
                                            size="x-large"
                                            rounded="pill"
                                            elevation="3"
                                            @click="$inertia.get(`/reservaciones-formulario/${auto.id}`)"
                                        >
                                            <v-icon start class="mr-2">mdi-check-circle</v-icon>
                                            Confirmar Reserva
                                        </v-btn>
                                    </div>
                                </v-col>
                            </v-row>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </MainLayout>

</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import {defineProps, ref} from 'vue';

defineProps({
    auto: Object // Recibe los datos del auto desde Laravel
});

const TabSeleccionada = ref(1)
</script>

<style scoped>

.fondo-principal {
    background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
}

.tarjeta-reserva {
    overflow: hidden;
    border: none;
}

.contenedor-imagen-auto {
    height: 550px;
    position: relative;
}

.imagen-auto {
    border-radius: 16px 0 0 16px;
}

.informacion-marca-modelo {
    position: absolute;
    bottom: 30px;
    left: 30px;
    z-index: 2;
}

.detalles-auto {
    background: white;
    border-radius: 0 16px 16px 0;
}

.especificaciones-auto {
    background-color: rgba(0, 0, 0, 0.02);
    border-radius: 12px;
    padding: 16px;
}

.boton-confirmar {
    transition: all 0.3s ease;
}

.boton-confirmar:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0, 169, 212, 0.2);
}

@media (max-width: 960px) {
    .imagen-auto {
        border-radius: 16px 16px 0 0;
    }

    .detalles-auto {
        border-radius: 0 0 16px 16px;
    }

    .contenedor-imagen-auto {
        height: 300px;
    }
}
</style>
