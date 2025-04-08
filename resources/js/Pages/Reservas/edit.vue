<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    reservas: Array
});
</script>

<template>
    <!-- <AuthenticatedLayout> -->
        <MainLayout>
        <Head title="Reservas Activas" />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">RESERVAS ACTIVAS</h1>
                <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">Imagen</th>
                            <th class="px-4 py-2 text-left">Nombre</th>
                            <th class="px-4 py-2 text-left">Especificaciones</th>
                            <th class="px-4 py-2 text-left">Asientos</th>
                            <th class="px-4 py-2 text-left">Placa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="reserva in reservas" :key="reserva.id" class="border-t">
                            <td class="px-4 py-2">
                                <img :src="reserva.imagen" alt="Imagen del auto" class="w-24 h-16 object-cover rounded" />
                            </td>
                            <td class="px-4 py-2">
                                {{ reserva.marca }} {{ reserva.modelo }}
                            </td>
                            <td class="px-4 py-2">
                                Motor: {{ reserva.motor }}<br />
                                Año: {{ reserva.año }}
                            </td>
                            <td class="px-4 py-2">
                                {{ reserva.Numero_asientos }}
                            </td>
                            <td class="px-4 py-2">
                                {{ reserva.placa }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </MainLayout>
    <!-- </AuthenticatedLayout> -->
</template>