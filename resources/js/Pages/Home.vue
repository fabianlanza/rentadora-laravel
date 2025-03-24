<template>
    <v-app>
        <v-app-bar app color="white" elevation="2">
            <v-container class="d-flex justify-space-between align-center">

                <!-- Logo y titulo-->
                <v-img src="logo.png" max-height="40" max-width="120" contain></v-img>
                <v-btn text>ViaCar</v-btn>
                <v-spacer></v-spacer>

                <!-- Navegación -->
                <v-tabs centered>
                    <v-tab to="/">Inicio</v-tab>
                    <v-tab to="/autos">Autos</v-tab>
                    <v-tab to="/contacto">Contacto</v-tab>
                </v-tabs>

                <!-- Botones de Login y Register -->
                <div class="d-flex gap-2">
                    <v-btn color="#00a9d4" variant="outlined" to="/login">Login</v-btn>
                    <v-btn color="#00a9d4" variant="elevated" to="/register">Register</v-btn>
                </div>
            </v-container>
        </v-app-bar>



        <v-main>
            <v-container style="max-width: 60vw; margin: 0 auto;">
                <!-- Carrusel -->
                <v-carousel
                    height="400"
                    show-arrows="hover"
                    cycle
                    hide-delimiter-background
                >
                    <v-carousel-item v-for="(slide, i) in slides" :key="i">
                        <v-img :src="images[i]" height="100%" cover class="position-relative">
                            <div class="overlay">
                                <h2 class="text-h1 text-white font-weight-bold">
                                    {{ slide }}
                                </h2>
                                <h4 class="text-white">Tu ruta, nuestro compromiso</h4>
                            </div>
                        </v-img>
                    </v-carousel-item>
                </v-carousel>

                <!-- Tarjetas de carros -->
                <v-row justify="center" class="mt-10">
                    <v-col cols="12" md="4" sm="6" xs="12" v-for="n in 3" :key="n">
                        <v-card>
                            <v-img height="180" :src="`https://source.unsplash.com/400x300/?car${n}`"></v-img>
                            <v-card-title>Carro de lujo {{ n }}</v-card-title>
                            <v-card-subtitle>$ {{ n * 10000 }}</v-card-subtitle>
                            <v-card-actions>
                                <v-btn color="primary">Rentar</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>





    </v-app>
</template>


<script setup>
const slides = ['VíaCar', 'VíaCar', 'VíaCar', 'VíaCar', 'VíaCar'];

const images = [
    'https://www.tuningblog.eu/wp-content/uploads/2023/03/Toyota-Supra-MK4-1.000-HP-Tuning-JDM-5-696x405.jpg',
    'https://www.mazdahonduras.com/images/noticias/2021/bt-50-1.jpg',
    'https://www.lanacion.com.ar/resizer/v2/cuanto-cuesta-la-toyota-hilux-en-noviembre-VNQT7XRAWFCYHDPCCBXTXDIWCA.jpg?auth=b9c87d7940efd43d307ea445cabf6ff46390e3169b9c6b206b25d374c6304e1f&width=420&height=280&quality=70&smart=true',
    'https://d17f75hnd3uun3.cloudfront.net/models/undefined/slider/desktop/jimnyslider_1717205440519.png',
    'https://www.kia.com/content/dam/kwcms/mx/es/images/showroom/2024/sorento/new-home/kia-sorento-key-visual-w.jpg',
];
</script>




<style scoped>
.overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    font-weight: bold;
    font-size: large;
    padding: 20px;
    border-radius: 10px;

}
</style>
