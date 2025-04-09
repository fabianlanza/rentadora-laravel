<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    reservaciones: Array, // Changed from reservas to match controller
    totalClientes: Number,
    cochesDisponibles: Number,
    reservacionesActivas: Number
});

// No filtering - show all reservations
</script>

<template>
    <MainLayout>
        <Head title="Panel de Administración" />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">PANEL DE ADMINISTRACIÓN 🚗</h1>
                
                <!-- Dashboard Summary -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                        <h2 class="text-xl font-semibold text-orange-500">Total clientes</h2>
                        <p class="text-3xl font-bold mt-2">{{ totalClientes || 0 }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                        <h2 class="text-xl font-semibold text-orange-500">Coches disponibles</h2>
                        <p class="text-3xl font-bold mt-2">{{ cochesDisponibles || 0 }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                        <h2 class="text-xl font-semibold text-orange-500">Reservaciones activas</h2>
                        <p class="text-3xl font-bold mt-2">{{ reservacionesActivas || 0 }}</p>
                    </div>
                </div>
                
                <!-- Show message if no reservations -->
                <div v-if="!reservaciones || reservaciones.length === 0" class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <p class="text-gray-600">No hay reservaciones registradas en el sistema.</p>
                </div>
                
                <!-- Show table only if there are reservations -->
                <div v-else class="overflow-x-auto bg-white shadow-sm rounded-lg">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">Imagen</th>
                            <th class="px-4 py-2 text-left">Cliente</th>
                            <th class="px-4 py-2 text-left">Vehículo</th>
                            <th class="px-4 py-2 text-left">Especificaciones</th>
                            <th class="px-4 py-2 text-left">Fechas</th>
                            <th class="px-4 py-2 text-left">Placa</th>
                            <!-- <th class="px-4 py-2 text-left">Acciones</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="reserva in reservaciones" :key="reserva.id" class="border-t">
                            <td class="px-4 py-2">
                                <img :src="reserva.imagen" alt="Imagen del auto" class="w-24 h-16 object-cover rounded" />
                            </td>
                            <td class="px-4 py-2">
                                <div class="font-semibold">{{ reserva.nombre_cliente }}</div>
                                <div class="text-sm text-gray-600">Cédula: {{ reserva.cedula }}</div>
                            </td>
                            <td class="px-4 py-2">
                                {{ reserva.marca }} {{ reserva.modelo }}
                            </td>
                            <td class="px-4 py-2">
                                Motor: {{ reserva.motor }}<br />
                                Año: {{ reserva.año }}<br />
                                Asientos: {{ reserva.Numero_asientos }}
                            </td>
                            <td class="px-4 py-2">
                                <div>Inicio: {{ reserva.fecha_inicio }}</div>
                                <div>Fin: {{ reserva.fecha_fin }}</div>
                                <div>Días: {{ reserva.cantidad_dias_reservado }}</div>
                            </td>
                            <td class="px-4 py-2">
                                {{ reserva.placa }}
                            </td>
                            <!-- <td class="px-4 py-2">
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm mb-1 w-full">
                                    Editar
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm w-full">
                                    Eliminar
                                </button>
                            </td> -->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </MainLayout>
</template>