<template>
    <!-- Usa un Layout para dibujar NAvBar Y Footer y asi evitar repetir codigo -->
    <MainLayout>
        <v-container style="max-width: 75vw; margin: 0 auto;">
            <!-- Carrusel -->
            <v-row class="d-flex align-center" no-gutters>
                <!-- Columna de texto a la izquierda -->
                <v-col cols="12" md="6" class="text-center text-md-left">
                    <h1 class="display-2 font-weight-bold custom-title">Bienvenidos a VíaCar</h1>
                    <h1 class="font-weight-regular">Tu ruta, nuestro compromiso</h1>
                </v-col>

                <!-- Columna del carrusel a la derecha -->
                <v-col cols="12" md="6">
                    <v-carousel height="400" show-arrows="hover" cycle hide-delimiter-background>
                        <v-carousel-item v-for="(slide, i) in slides" :key="i">
                            <v-img :src="images[i]" height="100%" cover class="position-relative">
                                <div class="overlay">
                                    <!--<h2 class="text-h1 text-white font-weight-bold">{{ slide }}</h2>-->
                                </div>
                            </v-img>
                        </v-carousel-item>
                    </v-carousel>
                </v-col>
            </v-row>

            <!-- 3 tarjetas de Info 100% Seguro, Servicio 24/7 y Mejores Precios -->
            <div class="hero-features">
                <v-container class="text_blue-darken-2">
                    <v-row>
                        <v-col cols="12" md="4">
                            <div class="feature-card">
                                <v-icon size="36" color="blue" class="mb-4">mdi-shield-check</v-icon>
                                <h3 class="text-h6 font-weight-bold mb-2">100% Seguro</h3>
                                <p class="text-body-2 text-grey-darken-1">Vehículos asegurados y mantenimiento regular</p>
                            </div>
                        </v-col>
                        <v-col cols="12" md="4">
                            <div class="feature-card">
                                <v-icon size="36" color="primary" class="mb-4">mdi-clock-fast</v-icon>
                                <h3 class="text-h6 font-weight-bold mb-2">Servicio 24/7</h3>
                                <p class="text-body-2 text-grey-darken-1">Asistencia y soporte en cualquier momento</p>
                            </div>
                        </v-col>
                        <v-col cols="12" md="4">
                            <div class="feature-card">
                                <v-icon size="36" color="primary" class="mb-4">mdi-cash-multiple</v-icon>
                                <h3 class="text-h6 font-weight-bold mb-2">Mejores Precios</h3>
                                <p class="text-body-2 text-grey-darken-1">Tarifas competitivas y transparentes</p>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </div>

            <!-- Separador -->
            <v-container>
                <v-divider :thickness="3" class="my-4 border-opacity-75" color="#00a9d4">
                    <span class="divider-text separador">Autos</span>
                </v-divider>
            </v-container>

            <!-- Tarjetas de carros -->
            <v-row justify="center" class="mt-10">
                <v-col cols="12" md="4" sm="6" xs="12" v-for="n in 6" :key="n">
                    <v-card>
                        <v-img height="180" :src="autos[n-1]"></v-img>
                        <v-card-title>Carro de lujo {{ n }}</v-card-title>
                        <v-card-subtitle>$ {{ n * 10000 }}</v-card-subtitle>
                        <v-card-actions>
                            <!-- <v-btn color="primary">Rentar</v-btn> -->
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>

            <!-- Separador -->
            <v-container>
                <v-divider :thickness="3" class="my-4 border-opacity-75" color="#00a9d4"></v-divider>
            </v-container>

            <!-- Card Porque Elegirnos-->
            <v-card title="¿Por qué elegirnos?" elevation="6" text="Priorizamos su satisfacción y nos esforzamos por hacer que su experiencia de alquiler de coches sea lo más fluida posible. Con nuestra amplia selección de vehículos en perfecto estado, precios competitivos y un proceso de reserva sencillo, puede confiar en nosotros para satisfacer sus necesidades. Nuestro dedicado equipo de atención al cliente está disponible las 24 horas para ayudarle, garantizando que reciba la asistencia que merece. Ya sea que necesite un coche para una escapada de fin de semana o para un largo viaje por carretera, elíjanos para un viaje sin complicaciones y placentero."></v-card>
        </v-container>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref } from "vue";

const slides = ['VíaCar', 'VíaCar', 'VíaCar', 'VíaCar', 'VíaCar'];

// Imagenes del Carrusel
const images = [
    'https://www.tuningblog.eu/wp-content/uploads/2023/03/Toyota-Supra-MK4-1.000-HP-Tuning-JDM-5-696x405.jpg',
    'https://www.mazdahonduras.com/images/noticias/2021/bt-50-1.jpg',
    'https://www.lanacion.com.ar/resizer/v2/cuanto-cuesta-la-toyota-hilux-en-noviembre-VNQT7XRAWFCYHDPCCBXTXDIWCA.jpg?auth=b9c87d7940efd43d307ea445cabf6ff46390e3169b9c6b206b25d374c6304e1f&width=420&height=280&quality=70&smart=true',
    'https://d17f75hnd3uun3.cloudfront.net/models/undefined/slider/desktop/jimnyslider_1717205440519.png',
    'https://www.kia.com/content/dam/kwcms/mx/es/images/showroom/2024/sorento/new-home/kia-sorento-key-visual-w.jpg',
];

// Temporal, imagenes de autos. Se cambiara por autos de la Base de Datos
const autos = [
    'https://static.vecteezy.com/system/resources/thumbnails/029/946/422/small_2x/white-modern-car-isolated-on-transparent-background-3d-rendering-illustration-free-png.png',
    'https://toyotahonduras.com/asset/images/general/nuevo-hilux/rojo_metalizado.png',
    'https://purepng.com/public/uploads/large/purepng.com-orange-audi-r8-caraudicarvehicletransport-961524656080cbae9.png',
    'https://www.jimshorkeymazda.com/static/brand-mazda/vehicle/2022/Mazda/MX-5-Miata-RF/MRP/Selector/2021-mx5-rf-club-soul-red-crystal.png',
    'https://www.vdm.ford.com/content/dam/na/ford/en_us/images/escape/2025/jellybeans/2025_Escape_Active_Left.png',
    'https://i.pinimg.com/736x/30/6a/02/306a026255ba17367d9495cf923d55c2.jpg'
];
</script>

<style scoped>
/* Texto del título principal */
.custom-title {
    font-size: 3.8rem;
    font-weight: bold;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(45deg, #00a9d4, #007bff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Títulos secundarios */
h1.font-weight-regular {
    font-size: 1.6rem;
    margin-top: 10px;
    color: #333;
}

/* Cards de características */
.feature-card {
    background: white;
    padding: 2rem;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    height: 100%;
    transition: all 0.3s ease;
    border-top: 4px solid #00a9d4;
}

.feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

/* Cards de Autos */
.v-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}

.v-card:hover {
    transform: scale(1.02);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
}

.v-card-title {
    font-weight: 700;
    font-size: 1.2rem;
    color: #2c3e50;
}

.v-card-subtitle {
    font-size: 1rem;
    color: #00a9d4;
}

/* Divider texto */
.separador {
    font-size: 2rem;
    font-family: 'Segoe UI';
    font-weight: 600;
    color: #00a9d4;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Carrusel con efecto fade */
.v-carousel-item {
    transition: all 0.6s ease;
    border-radius: 12px;
    overflow: hidden;
}

/* Card "¿Por qué elegirnos?" */
.v-card[title] {
    margin-top: 60px;
    padding: 2rem;
    border-radius: 12px;
    background: linear-gradient(to right, #e3f2fd, #ffffff);
    border-left: 5px solid #00a9d4;
    font-size: 1rem;
    color: #333;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
}
</style>
