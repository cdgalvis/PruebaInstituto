<!DOCTYPE html>
<html lang="es">  
    <head>    
        <title></title>    
        <meta charset="UTF-8">
        <meta name="title" content="Suscripcion">  
    </head>  
    <body>    
        <header>
            <h1>Informe de Suscripción</h1>      
        </header>    

        <section>      
            <article>
                <h2>Curso de  {{ $cursoinscrito }}</h2>
                <p>Informacion del Curso</p>
                <strong> Curso: </strong>    {{ $informacion[0]['nombre'] }} <br>
                <strong> Duracion: </strong>    {{ $informacion[0]['duracion'] }}  Horas<br>
                <strong> Fecha inicio: </strong>    {{ $informacion[0]['fechainicio'] }} <br>
                <strong> Fecha Fin: </strong>    {{ $informacion[0]['fechafin'] }} <br>
                <strong> Sede: </strong>    {{ $informacion[0]['sede'] }} <br>
                <strong> Jornada: </strong>    {{ $informacion[0]['jornada'] }} <br>
                <strong> Descripcion: </strong>    {{ $informacion[0]['descripcion'] }} <br>
            </article>      
        </section>
    </body>  
</html>
