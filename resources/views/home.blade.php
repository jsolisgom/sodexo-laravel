@extends('layouts.app')

@section('content')
        <div class="col-md-12"> <h3>Bienvenida</h3>
            <!-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div> -->
            <div class="alert alert-success" role="alert">
                Te damos la Bienvenida al Sistema de Postulación Interna "Ruta del Desarrollo".
                Acá podrás encontrar toda(s) la(s) oferta(s) de oportunidades disponibles de movilidad, crecimiento y desarrollo que Sodexo te ofrece. Pueden participar todos los colaboradores/as de Sodexo que cumplan los requisitos de cada una de las oportunidades disponibles.
                Hacemos de tu crecimiento, nuestra prioridad. <hr>
                <ul>
                    <li><b>Mi Perfil:</b> podrás completar y/o modificar tu datos personales y profesionales.</li>
                    <li><b>Ofertas:</b> podrás visualizar las publicaciones disponibles que te ofrece Sodexo internamente.</li>
                    <li><b>Biblioteca:</b> aquí podrás adjuntar cualquier documento que estimes necesario para tu postulación (Certificados de Estudio, Curriculum, entre otros).</li>
                    <li><b>Encuestas:</b> para nosotros es importante tus comentarios sobre la navegabilidad de la plataforma, por eso te invitamos a responder nuestra encuesta en línea. </li>
                </ul>  
            </div>
        </div>

@endsection
