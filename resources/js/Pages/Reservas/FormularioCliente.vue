<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { ref, computed, defineProps} from 'vue'
import Swal from 'sweetalert2';
import axios from 'axios';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
    auto: Object, // Recibe los datos del auto desde Laravel
    auth: Object  // Añadir para recibir la información del usuario autenticado
});

const form = useForm({
    nombre_cliente: '',
    fecha_inicio: '',
    fecha_fin: '',
    acepta_seguro: null,
    cedula: '',  // Add this field for the cedula
    auto_id: props.auto?.id,
    dias_reservados: 0,
    precio_total: 0
});


const segurosOptions = [
    { text: 'si', value: true },
    { text: 'no', value: false }
]


const submit = () => {
    // Verificar que todos los campos están completos
    if (!form.nombre_cliente || !form.cedula || !form.fecha_inicio || 
        !form.fecha_fin || form.acepta_seguro === null) {

        Swal.fire({
            title: "Formulario incompleto",
            text: "Por favor, completa todos los campos antes de guardar.",
            icon: "warning",
            confirmButtonText: "OK",
            confirmButtonColor: "#ff9800",
        });
        return; // Detener la ejecución si algún campo está vacío
    }

    // Asignar directamente al objeto form los valores calculados
    form.seguro = form.acepta_seguro ? 'si' : 'no';
    form.fk_auto = props.auto?.id;
    form.fk_user = props.auth?.user?.id; // Añadir el ID del usuario autenticado
    form.cantidad_dias_reservado = diasReservados.value;
    
    // Enviar directamente el formulario
    axios.post(route('reservas.store'), {
        nombre_cliente: form.nombre_cliente,
        cedula: form.cedula,
        fecha_inicio: form.fecha_inicio,
        fecha_fin: form.fecha_fin,
        seguro: form.seguro,
        fk_auto: form.fk_auto,
        fk_user: form.fk_user, // Añadir el ID del usuario
        cantidad_dias_reservado: form.cantidad_dias_reservado
    })
    .then(response => {
        Swal.fire({
            title: "¡Reserva creada!",
            text: "La reserva se ha creado correctamente.",
            icon: "success",
            confirmButtonText: "OK",
            confirmButtonColor: "#00a9d4",
        });
        router.visit('/autos');
    })
    .catch(error => {
        console.error('Error al crear la reserva:', error);
        Swal.fire({
            title: "Error",
            text: "Hubo un problema al crear la reserva. Por favor, verifica los datos.",
            icon: "error",
            confirmButtonText: "OK",
            confirmButtonColor: "#f44336",
        });
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


        <MainLayout TabSeleccionada="1">

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

                        <!-- Cédula del cliente -->
                        <v-text-field
                            v-model="form.cedula"
                            label="Número de Cédula"
                            required
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
        
        </MainLayout>
</template>

