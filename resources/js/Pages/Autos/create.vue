<template>
    <!-- <v-app> -->
        <!-- App Bar -->
        <!-- <v-app-bar app color="white" elevation="1">
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
                    <v-btn color="#00a9d4" variant="outlined" to="/register">Register</v-btn>
                </div>
            </v-container>
        </v-app-bar> -->

        <!-- Main Content -->
        <!-- <v-main class="form-background"> -->
            <MainLayout TabSeleccionada="1">
            <v-container>
                <v-card
                    class="pa-6 mx-auto mt-10"
                    max-width="950"
                    elevation="6"
                    rounded="lg"
                    style="background-color: #ffffffdd; backdrop-filter: blur(8px)"
                >
                    <v-card-title class="text-h5 font-weight-bold mb-4 text-primary">
                        🚗 Agregar Nuevo Auto
                    </v-card-title>

                    <v-form @submit.prevent="submit" class="custom-form">
                        <v-row dense>
                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.marca"
                                    label="Marca"
                                    prepend-icon="mdi-car"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.modelo"
                                    label="Modelo"
                                    prepend-icon="mdi-car-sports"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.motor"
                                    label="Motor"
                                    prepend-icon="mdi-engine"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.color"
                                    label="Color"
                                    prepend-icon="mdi-palette"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.año"
                                    label="Año"
                                    type="number"
                                    prepend-icon="mdi-calendar"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.placa"
                                    label="Placa"
                                    prepend-icon="mdi-numeric"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.Numero_asientos"
                                    label="Número de Asientos"
                                    type="number"
                                    prepend-icon="mdi-seat"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-select
                                    v-model="form.Aire_acondicionado"
                                    :items="['Sí', 'No']"
                                    label="Aire Acondicionado"
                                    prepend-icon="mdi-air-conditioner"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>

                            <v-col cols="12">
                                <v-textarea
                                    v-model="form.Detalles_desperfectos"
                                    label="Detalles o desperfectos"
                                    prepend-icon="mdi-file-document-edit"
                                    variant="outlined"
                                    color="primary"
                                    rows="3"
                                    auto-grow
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-switch
                                    v-model="form.Disponibilidad_vehiculo"
                                    label="¿Disponible para renta?"
                                    inset
                                    color="success"
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.Precio_base"
                                    label="Precio Base"
                                    type="number"
                                    prepend-icon="mdi-cash"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>

                            <v-col cols="12">
                                <v-text-field
                                    v-model="form.imagen"
                                    label="Imagen URL"
                                    prepend-icon="mdi-car"
                                    variant="outlined"
                                    color="primary"
                                    required
                                />
                            </v-col>
                        </v-row>

                        <v-btn
                            type="submit"
                            color="primary"
                            size="large"
                            class="mt-6"
                            :loading="form.processing"
                            elevation="2"
                            block
                        >
                            🚀 Guardar Auto
                        </v-btn>
                    </v-form>
                </v-card>
            </v-container>
        </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { useForm } from '@inertiajs/vue3';
import {ref} from "vue";
import Swal from 'sweetalert2';


const form = useForm({
    marca: '',
    modelo: '',
    motor: '',
    color: '',
    año: '',
    placa: '',
    Numero_asientos: '',
    Aire_acondicionado: '',
    Detalles_desperfectos: '',
    Disponibilidad_vehiculo: true,
    Precio_base: '',
    imagen: null,
});

const submit = () => {
    // Verificar que todos los campos están completos
    if (!form.marca || !form.modelo || !form.motor || !form.color ||
        !form.año || !form.placa || !form.Numero_asientos ||
        !form.Aire_acondicionado || !form.Detalles_desperfectos ||
        !form.Precio_base || !form.imagen) {

        Swal.fire({
            title: "Formulario incompleto",
            text: "Por favor, completa todos los campos antes de guardar.",
            icon: "warning",
            confirmButtonText: "OK",
            confirmButtonColor: "#ff9800",
        });
        return; // Detener la ejecución si algún campo está vacío
    }

    // Si todos los campos están completos, proceder con el envío
    form.post('/autos', {
        forceFormData: true,
        onSuccess: () => {
            Swal.fire({
                title: "¡Auto agregado!",
                text: "El auto se ha agregado correctamente.",
                icon: "success",
                confirmButtonText: "OK",
                confirmButtonColor: "#00a9d4",
            });
            form.reset();
        },
    });
};

// const TabSeleccionada = ref(2);
</script>

<style scoped>
.form-background {
    background: linear-gradient(to right, #e0f7fa, #ffffff);
    min-height: 100vh;
}

.custom-form .v-input__control {
    transition: box-shadow 0.3s ease;
}


</style>
