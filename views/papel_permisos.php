<?php 
date_default_timezone_set("America/Bogota");
?>
<div class="cont_generador flex flex-wrap">
<div class="hoja p-6 max-w-md mx-auto rounded-md ">
    <div class="mb-4">
    <div class="div-fecha">
            <div class="fecha"><?php  ?></div>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-2" for="instructor-lista">Instructor:</label>
            <select class="block w-full border border-gray-300 rounded-md p-2" id="instructor-lista">
                <option value="opcion1">Opción 1</option>
                <option value="opcion2">Opción 2</option>
                <option value="opcion3">Opción 3</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-2" for="aprendiz-lista">Aprendiz:</label>
            <select class="block w-full border border-gray-300 rounded-md p-2" id="aprendiz-lista">
                <option value="opcion1">Opción 1</option>
                <option value="opcion2">Opción 2</option>
                <option value="opcion3">Opción 3</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-2" for="titulada">Titulada:</label>
            <input class="block w-full border border-gray-300 rounded-md p-2" type="text" id="titulada" name="name_titulada" />
        </div>
        <div class="mb-4">
            <div class="flex justify-between">
                <div class="w-1/2 pr-2">
                    <label class="block text-sm font-semibold mb-2" for="ficha">Ficha:</label>
                    <input class="block w-full border border-gray-300 rounded-md p-2" type="text" id="ficha" name="icha"/>
                </div>
                <div class="w-1/2 pl-2">
                    <label class="block text-sm font-semibold mb-2" for="ambiente">Ambiente:</label>
                    <input class="block w-full border border-gray-300 rounded-md p-2" type="text" id="ambiente" name="name_ambiente" />
                </div>
            </div>
        </div>
        
    <div class="div-hora flex justify-between">
            <label for="hora" class='block text-sm font-semibold mb-2'>Hora de salida:</label>
            <div id="hora" class="hora"></div>
            <div class="periodo" onclick="cambiaAMPM()">a.m</div>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-2" for="motivo">Motivo de la salida:</label>
            <textarea class="block w-full border border-gray-300 rounded-md p-2" id="motivo" rows="4" cols="50"></textarea>
        </div>
    </div>
</div>

  
    <div class="resultado">
        <h1>Aqui se generara su permiso</h1>
    </div>

</div>
    
    <div class="box-button">    
            <a href="index.php?vista=datos_permisos" class="my-button button-clr-morado">
                <input type="image" src="../imagenes/registro-icon.svg" id="registro-aprendiz" alt="">
                <label for="registro-aprendiz">Ver datos</label>
            </a>
                <button class="btn-generar-permiso my-button button-clr-morado" onclick="generarPermiso()">Generar</button>
                <button class="btn-cancelar-permiso my-button button-clr-morado" onclick="cancelarPermiso()">Cancelar</button>
    </div>
   
