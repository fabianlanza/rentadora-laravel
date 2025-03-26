

<template>
    <v-hover v-slot="{ isHovering, props }" open-delay="100">
        <v-col cols="12" md="4" sm="6" xs="12">
            <v-card
                :class="{ 'on-hover': isHovering }"
                :elevation="isHovering ? 12 : 2"
                class="transition-fast"
                v-bind="props"
            >
                <!-- Imagen con fallback -->
                <v-img height="180" :src="auto.imagen || '/images/default-car.jpg'"></v-img>

                <v-card-title>{{ auto.marca }} - {{ auto.modelo }}</v-card-title>
                <v-card-subtitle>Motor: {{ auto.motor }}</v-card-subtitle>

                <v-card-text class="text-body-2">
                    Precio Base: ${{ auto.Precio_base }}
                </v-card-text>

                <v-card-actions>
                    <v-btn color="primary">Rentar</v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
    </v-hover>
</template>



<script setup>
defineProps({
    auto: Object
});
</script>



<style scoped>
/* Suaviza la transición al hacer hover */
.transition-fast {
    transition: all 0.2s ease-in-out;
}

/* Efecto cuando el mouse pasa por encima */
.on-hover {
    transform: scale(1.05);
    background-color: rgba(0, 0, 0, 0.05);
}


</style>
