
<template>
    <MainLayout :TabSeleccionada="2">
<!--            Estructura de pagina aqui-->
            
            <v-container class="fill-height">
                <v-row align="center" justify="center">
                    <v-col cols="12" md="10">
                        <v-card class="mx-auto" elevation="8">
                            <v-card-title class="text-h4 text-center pt-6 pb-2">
                                <v-icon icon="mdi-car" color="primary" class="mr-2"></v-icon>
                                ViaCar Contacto
                            </v-card-title>

                            <v-card-text>
                                <v-row>
                                    <v-col cols="12" md="6">
                                        <v-list>
                                            <v-list-item>
                                                <template v-slot:prepend>
                                                    <v-icon color="primary" size="large">mdi-map-marker</v-icon>
                                                </template>
                                                <v-list-item-title class="text-h6">Dirección</v-list-item-title>
                                                <v-list-item-subtitle class="text-subtitle-1">{{ location.address }}</v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <template v-slot:prepend>
                                                    <v-icon color="primary" size="large">mdi-phone</v-icon>
                                                </template>
                                                <v-list-item-title class="text-h6">Teléfono</v-list-item-title>
                                                <v-list-item-subtitle class="text-subtitle-1">{{ location.phone }}</v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <template v-slot:prepend>
                                                    <v-icon color="primary" size="large">mdi-email</v-icon>
                                                </template>
                                                <v-list-item-title class="text-h6">Email</v-list-item-title>
                                                <v-list-item-subtitle class="text-subtitle-1">{{ location.email }}</v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <template v-slot:prepend>
                                                    <v-icon color="primary" size="large">mdi-clock</v-icon>
                                                </template>
                                                <v-list-item-title class="text-h6">Horario</v-list-item-title>
                                                <v-list-item-subtitle class="text-subtitle-1">{{ location.hours }}</v-list-item-subtitle>
                                            </v-list-item>
                                        </v-list>

<!--                                        <v-card-actions class="justify-center mt-6">-->
<!--                                            <v-btn color="primary" size="x-large">-->
<!--                                                <v-icon left class="mr-2">mdi-car</v-icon>-->
<!--                                                Reservar Ahora-->
<!--                                            </v-btn>-->
<!--                                        </v-card-actions>-->

                                        <p class="titulo-custom text-center mt-10">Puedes contactarnos en ViaCar, tu empresa de renta de autos confiable. Ofrecemos vehículos en excelente
                                            estado, con un servicio rápido y seguro para que disfrutes tu viaje sin preocupaciones. ¡Estamos aquí para
                                            ayudarte!</p>
                                    </v-col>

                                    <v-col cols="12" md="6">
                                        <v-row>
                                            <v-col cols="12">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7679.386145148601!2d-86.80493856745218!3d15.767367895785167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f69a9dd970b9c43%3A0xd59eb5c763a6cdb7!2sUniversidad%20Cat%C3%B3lica%20de%20Honduras!5e0!3m2!1ses!2shn!4v1743612668860!5m2!1ses!2shn"
                                                    width="100%"
                                                    height="250"
                                                    style="border:0;"
                                                    allowfullscreen=""
                                                    loading="lazy"
                                                    class="rounded-lg"
                                                ></iframe>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-img
                                                    src="/images/viacar.jpeg"
                                                    height="250"
                                                    cover
                                                    class="rounded-lg"
                                                >
                                                    <template v-slot:placeholder>
                                                        <v-row
                                                            class="fill-height ma-0"
                                                            align="center"
                                                            justify="center"
                                                        >
                                                            <v-progress-circular
                                                                indeterminate
                                                                color="primary"
                                                            ></v-progress-circular>
                                                        </v-row>
                                                    </template>
                                                </v-img>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>


        </MainLayout>


</template>



<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {ref} from "vue";

// Ahora la tab seleccionada se pasa directamente desde el MainLayout
// const TabSeleccionada = ref(2)

const location = {
    address: 'Universidad Catolica',
    phone: '+504 1234-5678',
    email: 'contacto@viacar.com',
    hours: 'Lun - Sáb: 9:00 AM - 7:00 PM'
}







</script>




<style scoped>
.titulo-custom{
    font-size: 20px;

}
</style>
