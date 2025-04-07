<template>
    <v-app>
        <v-app-bar app color="#eeeeee" elevation="0">
            <v-container class="d-flex justify-space-between align-center">
                <!-- Logo y titulo-->
                <v-img src="/images/logo.png" max-height="40" max-width="120" contain></v-img>
                <v-spacer></v-spacer>

                <!-- Navegación usando Inertia -->
                <v-tabs v-model="TabActiva" centered>
                    <v-tab tag="div" @click="$inertia.get('/')">Inicio</v-tab>
                    <v-tab tag="div" @click="$inertia.get('/autos')">Autos</v-tab>
                    <v-tab tag="div" @click="$inertia.get('/contacto')">Contacto</v-tab>
                </v-tabs>
                <v-spacer></v-spacer>

                <!-- Botones de Login/Register para invitados -->
                <div v-if="!$page.props.auth.user" class="d-flex gap-2">
                    <v-btn color="#00a9d4" variant="elevated" @click="$inertia.get('/login')">Login</v-btn>
                    <v-btn color="#00a9d4" variant="outlined" @click="$inertia.get('/register')" class="ml-2">Register</v-btn>
                </div>

                <!-- Dropdown para usuarios autenticados -->
                <div v-else>
                    <v-menu min-width="200px" rounded>
                        <template v-slot:activator="{ props }">
                            <v-btn
                                color="#00a9d4"
                                v-bind="props"
                                variant="elevated"
                            >
                                {{ $page.props.auth.user.name }}
                                <v-icon right>mdi-chevron-down</v-icon>
                            </v-btn>
                        </template>
                        <v-card>
                            <v-card-text>
                                <div class="mx-auto text-center">
                                    <h3>{{ $page.props.auth.user.name }}</h3>
                                    <p class="text-caption mt-1">
                                        {{ $page.props.auth.user.email }}
                                    </p>
                                    <v-divider class="my-3"></v-divider>
                                    <v-btn
                                        variant="text"
                                        block
                                        @click="$inertia.get('/profile')"
                                    >
                                        <v-icon start>mdi-account</v-icon>
                                        Perfil
                                    </v-btn>
                                    <v-divider class="my-2"></v-divider>
                                    <v-btn
                                        variant="text"
                                        block
                                        @click="logout"
                                        color="red"
                                    >
                                        <v-icon start>mdi-logout</v-icon>
                                        Cerrar Sesión
                                    </v-btn>
                                </div>
                            </v-card-text>
                        </v-card>
                    </v-menu>
                </div>
            </v-container>
        </v-app-bar>

        <v-main>
            <!-- Contenido de la página -->
            <slot></slot>
        </v-main>

        <!-- Footer -->
        <v-footer class="text-center d-flex flex-column ga-2 py-4" color="#00a9d4">
            <div class="d-flex ga-3">
                <v-btn
                    v-for="icon in icons"
                    :key="icon"
                    :icon="icon"
                    density="comfortable"
                    variant="text"
                ></v-btn>
            </div>

            <v-divider class="my-2" thickness="2" width="50"></v-divider>

            <div class="text-caption font-weight-regular opacity-60">
                Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum. Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at orci sed massa consectetur dignissim a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula lacinia malesuada. Nulla placerat augue vel ipsum ultrices, cursus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
            </div>

            <v-divider></v-divider>

            <div>
                {{ new Date().getFullYear() }} — <strong>VíaCar</strong>
            </div>
        </v-footer>
    </v-app>
</template>


<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from "vue";
import { router } from '@inertiajs/vue3';

// Acepta la tab activa como prop y pone defecto 0
const props = defineProps({
    TabSeleccionada: {
        type: Number,
        default: 0,
    },
});
const TabActiva = ref(props.TabSeleccionada);



// iconos del Footer
const icons = [
    'mdi-facebook',
    'mdi-twitter',
    'mdi-linkedin',
    'mdi-instagram',
];

// Función para cerrar sesión
const logout = () => {
    router.post('/logout');
};


</script>




<style scoped>
/* Fondo general con gradiente */
.v-main {
    background: linear-gradient(120deg, #f0f8ff 0%, #ffffff 100%);
}

/* Footer limpio */
.v-footer {
    background-color: #00a9d4 !important;
    color: white !important;
    padding-top: 3rem;
}

.v-footer .v-btn {
    color: white !important;
    transition: transform 0.2s ease;
}

.v-footer .v-btn:hover {
    transform: scale(1.2);
}

.v-footer .text-caption {
    font-size: 0.9rem;
    max-width: 600px;
    margin: 0 auto;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
}
</style>