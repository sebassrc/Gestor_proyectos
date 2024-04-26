<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 white:text-gray-200 leading-tight">
            {{ __('Universidad Icesi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-center mb-4">Acerca de la Universidad Icesi</h2>
                                <p class="text-center lead">¡Bienvenido a la página de gestión de proyectos de la Universidad Icesi!</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Lo Que Ofrecemos</h3>
                                <p>En la Universidad Icesi, ofrecemos servicios de desarrollo web de alta calidad y soluciones personalizadas para nuestros clientes.</p>
                            </div>
                            <div class="col-md-6">
                                <h3>Nuestra Misión</h3>
                                <p>Nuestra misión es ayudar a nuestros clientes a alcanzar sus objetivos digitales proporcionando soluciones innovadoras y centradas en el usuario.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="mt-4">Contacto</h3>
                                <p>Si deseas más información o tienes alguna pregunta, no dudes en contactarnos:</p>
                                <ul class="list-unstyled">
                                    <li><strong>Email:</strong> <a href="mailto:info@proyectosicesi.com">info@proyectosicesi.com</a></li>
                                    <li><strong>Teléfono:</strong> +1234567890</li>
                                    <li><strong>Dirección:</strong> Av. Lara, 1234, Ciudad Cali, País</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</x-app-layout>
