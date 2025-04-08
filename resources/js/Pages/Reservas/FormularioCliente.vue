<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { ref, computed, defineProps} from 'vue'
const props = defineProps({
    auto: Object // Recibe los datos del auto desde Laravel
});

const form = useForm({
    nombre_cliente: '',
    fecha_inicio: '',
    fecha_fin: '',
    acepta_seguro: null

});


const segurosOptions = [
    { text: 'Si lo quiero', value: true },
    { text: 'No lo quiero', value: false }
]


const submit = () => {
    form.post(route('reserva.index'), {  // Asegúrate de usar la ruta correcta
        // onFinish: () => form.reset('nombre', 'descripcion'),
    });
};
const TabSeleccionada = ref(1)




const diasReservados = computed(() => {
    if (!form.fecha_inicio || !form.fecha_fin) return 0
    const start = new Date(form.fecha_inicio)
    const end = new Date(form.fecha_fin)
    const diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24))
    return diff > 0 ? diff : 0
})

const totalAPagar = computed(() => {
    // Precio base por día (asegurarse de que sea un número)
    const precioPorDia = Number(props.auto?.Precio_base || 0)
    // Costo del seguro ($50 si lo quiere, $0 si no)
    const costoSeguro = form.acepta_seguro === true ? 50 : 0
    // Total = (precio base * días) + seguro
    return (precioPorDia * diasReservados.value) + costoSeguro
})



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
<template>
    <v-app>
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
        <v-main class="fondo-principal">
            <v-container class="py-7">
                <v-row justify="center">
                    <v-col cols="5" md="9">
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
                                        Vehiculo Seleccionado
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


                                        </v-row>
                                    </div>

                                    <v-divider class="mb-6"></v-divider>





                                </v-col>
                            </v-row>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
            <v-container class="py-7">
                <v-card max-width="850" class="mx-auto pa-4" elevation="6">
                    <v-card-title class="text-h5">Formulario de Reserva de Carro</v-card-title>

                    <v-form fast-fail @submit.prevent="submit">
                        <!-- Nombre del cliente -->
                        <v-text-field
                            v-model="form.nombre_cliente"

                            label="Nombre de Cliente"
                        ></v-text-field>

                        <!-- Fecha de inicio -->
                        <v-text-field
                            v-model="form.fecha_inicio"
                            label="Fecha de Inicio"
                            type="date"

                        ></v-text-field>

                        <!-- Fecha final -->
                        <v-text-field
                            v-model="form.fecha_fin"
                            label="Fecha Final"
                            type="date"

                        ></v-text-field>

                        <!-- Acepta seguro -->
                        <v-select
                            v-model="form.acepta_seguro"
                            label="¿Acepta el seguro del vehículo?"
                            :items="segurosOptions"
                            item-value="value"
                            item-title="text"
                            variant="outlined"
                            density="comfortable"
                        ></v-select>

                        <!-- Días reservados -->
                        <div class="d-flex align-center justify-space-between my-4 pa-3 bg-grey-lighten-4 rounded">
                            <div class="d-flex align-center">
                                <v-icon color="primary" class="mr-3">mdi-calendar-range</v-icon>
                                <div>
                                    <div class="text-subtitle-2 font-weight-medium">Días Reservados:</div>
                                    <div class="text-h6 font-weight-bold">{{ diasReservados }}</div>
                                </div>
                            </div>
                            
                            <div class="d-flex align-center">
                                <v-icon color="success" class="mr-3">mdi-cash</v-icon>
                                <div>
                                    <div class="text-subtitle-2 font-weight-medium">Total a Pagar:</div>
                                    <div class="text-h6 font-weight-bold text-success">${{ totalAPagar }}</div>
                                </div>
                            </div>
                        </div>


                        

                        <!-- Estado del vehículo -->
                        <v-alert type="info" class="my-3">
                            Estado del vehículo:
                            <strong>{{ disponibilidad || 'Carro Disponible para reserva' }}</strong>
                        </v-alert>

                        <!-- Botón -->
                        <v-btn color="primary" type="submit" :loading="loading" class="mt-2">
                            Reservar
                        </v-btn>

                    </v-form>
                </v-card>


            </v-container>
        </v-main>
    </v-app>
</template>

