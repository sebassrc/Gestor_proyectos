<x-app-layout>
<x-slot name="header">
    {{ __('Home') }}
</x-slot>
    <div class="py-12 bg-blue-600">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img src="https://radcolombia.org/web/sites/default/files/archivos/instituciones/universidad-icesi/logo-icesi.png" alt="icesi.com" class="img-fluid" style="max-width: 400px;">
                            </div>
                        <div class="col-md-6">
                    <h3 class="text-white">Lo Que Ofrecemos</h3>
                  <p class="text-white">En la Universidad Icesi, ofrecemos servicios de desarrollo web de alta calidad y soluciones personalizadas para nuestros clientes.</p>
            </div>
        </div>
    <div class="row align-items-center">
        <div class="col-md-6">
            <h3 class="text-white">Nuestra Misión</h3>
                <p class="text-white">Nuestra misión es ayudar a nuestros clientes a alcanzar sus objetivos digitales proporcionando soluciones innovadoras y centradas en el usuario.</p>
                    <h3 class="mt-4 text-white">Contacto</h3>
                        <p class="text-white">Si deseas más información o tienes alguna pregunta, no dudes en contactarnos:</p>
                        <ul class="list-unstyled text-white">
                    <li><strong>Email:</strong> <a href="mailto:info@proyectosicesi.com" class="text-white">info@proyectosicesi.com</a></li>
                 <li><strong>Teléfono:</strong> +1234567890</li>
            <li><strong>Dirección:</strong> Av. Lara, 1234, Ciudad Cali, País</li>
        <ul>
    </div>
    <!-- Carousel -->
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type = "button" data-bs-target = "#carouselExampleIndicators" data-bs-slide-to = "0" class      = "active" aria-current="true" aria-label="Slide 1"></button>
                    <button type = "button" data-bs-target = "#carouselExampleIndicators" data-bs-slide-to = "1" aria-label = "Slide 2"></button>
                    <button type = "button" data-bs-target = "#carouselExampleIndicators" data-bs-slide-to = "2" aria-label = "Slide 3"></button>
                    <button type = "button" data-bs-target = "#carouselExampleIndicators" data-bs-slide-to = "3" aria-label = "Slide 4"></button>
                    <button type = "button" data-bs-target = "#carouselExampleIndicators" data-bs-slide-to = "4" aria-label = "Slide 5"></button>
                    <button type = "button" data-bs-target = "#carouselExampleIndicators" data-bs-slide-to = "5" aria-label = "Slide 6"></button>
                    <button type = "button" data-bs-target = "#carouselExampleIndicators" data-bs-slide-to = "6" aria-label = "Slide 7"></button>
                </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                             <img src="https://tse3.mm.bing.net/th?id=OIP.QATgELHKYHLuHg3APXWFfgHaHa&pid=Api&P=0&h=180" class="d-block mx-auto w-100" alt="..." style="max-width: 300px; max-height: 300px;">
                         </div>
                         <div class="carousel-item">
                             <img src="https://tse3.mm.bing.net/th?id=OIP.DUeLJLIjF27QOwJFN8aBYQHaHa&pid=Api&P=0&h=180" class="d-block mx-auto w-100" alt="..." style="max-width: 300px; max-height: 300px;">
                         </div>
                         <div class="carousel-item">
                            <img src="https://tse4.mm.bing.net/th?id=OIP.GP2v5qaVNTY8AwFFvWZTRQHaHa&pid=Api&P=0&h=180" class="d-block mx-auto w-100" alt="..." style="max-width: 300px; max-height: 300px;">
                         </div>
                         <div class="carousel-item">
                             <img src="https://tse2.mm.bing.net/th?id=OIP.0IKXdYjt8Qntnqb4oHjyWQHaHa&pid=Api&P=0&h=180" class="d-block mx-auto w-100" alt="..." style="max-width: 300px; max-height: 300px;">
                         </div>
                         <div class="carousel-item">
                             <img src="https://tse4.mm.bing.net/th?id=OIP.KMC07v4H4vtSRNFDJN2eTAHaHa&pid=Api&P=0&h=180" class="d-block mx-auto w-100" alt="..." style="max-width: 300px; max-height: 300px;">
                         </div>
                         <div class="carousel-item">
                             <img src="https://tse1.mm.bing.net/th?id=OIP.MQ8I2VUusn1g_cx4RefPpQHaHa&pid=Api&P=0&h=180" class="d-block mx-auto w-100" alt="..." style="max-width: 300px; max-height: 300px;">
                         </div>
                         <div class="carousel-item">
                             <img src="https://tse2.mm.bing.net/th?id=OIP.-Jz_wrbDQx5pvdeIOBax7AHaHa&pid=Api&P=0&h=180" class="d-block mx-auto w-100" alt="..." style="max-width: 300px; max-height: 300px;">
                         </div>
                         <div class="carousel-item">
                             <img src="https://tse2.mm.bing.net/th?id=OIP.ok-B4XbtjP4z06kz7m9fiwHaHa&pid=Api&P=0&h=180" class="d-block mx-auto w-100" alt="..." style="max-width: 300px; max-height: 300px;">
                         </div>
                         <div class="carousel-item">
                             <img src="https://tse4.mm.bing.net/th?id=OIP.T8R1vjcvYfoPxWforQOFrQHaHa&pid=Api&P=0&h=180" class="d-block mx-auto w-100" alt="..." style="max-width: 300px; max-height: 300px;">
                         </div>
                    </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="margin-left: -1px;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                                     </button>
                                         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="margin-right: -1px;">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                         <span class="visually-hidden">Next</span>
                                     </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('footer')
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>